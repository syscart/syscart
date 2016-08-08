<?php
/**
 * @package    system cart
 *             libraries/platform/session.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformSession
{
	const SESSION_STARTED = true;
	const SESSION_NOT_STARTED = false;

	// The state of the session
	private $state = self::SESSION_NOT_STARTED;
	private $client = [];

	// THE only instance of the class
	private static $instance;

	/*
	 * Returns THE instance of 'Session'.
	 * The session is automatically initialized if it wasn't.
	 *
	 * @return    object
	 */
	public static function getInstance($options = array())
	{
		global $sysDbo;
		if( !isset(self::$instance))
			self::$instance = new self;

		self::$instance->startSession();
		self::$instance->removeExpire();

		$user = factory::getUser();

		$sql = "SELECT id, name, username, email, block
				  FROM #__users
				 WHERE id = (SELECT userId FROM #__session WHERE sessionId = :session)";
		$sql = platformQuery::refactor($sql);

		$query = $sysDbo->prepare($sql);
		$query->bindParam(':session', session_id(), PDO::PARAM_STR);

		$query->execute();
		$result = $query->fetch(\PDO::FETCH_ASSOC);

		if($result) {
			$user->id = $result['id'];
			$user->name = $result['name'];
			$user->username = $result['username'];
			$user->email = $result['email'];
			$user->block = $result['block'];
		} else {
			$user->id = 0;
			$user->name = '';
			$user->username = 'guest';
			$user->email = '';
			$user->block = 0;
		}

		return self::$instance;
	}

	/*
	 * (Re)starts the session.
	 *
	 * @return    bool    TRUE if the session has been initialized, else FALSE.
	 */
	public function startSession()
	{
		if($this->state == self::SESSION_NOT_STARTED) {
			$this->state = session_start();

			$header = getallheaders();
			if(isset($header['sys-webservice-key'])) {
				$data = explode(':', $header['sys-webservice-key']);
				$key = factory::getConfig()->get('webservice_key');
				if(strcmp($data[0], md5($key.$data[1])) == 0) {
					if(isset( $header['sys-session-id'] )) {
						session_write_close();
						session_id( $header['sys-session-id'] );
						session_start();
					}
				}
			}
		}
		self::storeInDatabase();

		return $this->state;
	}

	/*
	 * remove expire session
	 *
	 * @return	void
	 * */
	private function removeExpire()
	{
		$db = factory::getDbo();
		$config = factory::getConfig();

		$sql = "DELETE FROM #__session WHERE time<:time";
		$sql = platformQuery::refactor($sql);

		$query = $db->prepare($sql);
		$query->bindParam(':time', $time = (time()-($config->get('lifetime')*60)), PDO::PARAM_STR);

		$query->execute();
	}

	/*
	 * Stores datas in the database.
	 *
	 * @return    void
	 */
	private function storeInDatabase()
	{
		$db = factory::getDbo();

		$sql = "SELECT sessionId FROM #__session WHERE sessionId = :session";
		$sql = platformQuery::refactor($sql);

		$query = $db->prepare($sql);
		$query->bindParam(':session', session_id(), PDO::PARAM_STR);

		$query->execute();
		$result = $query->fetch(\PDO::FETCH_ASSOC);

		if($result['sessionId']) {
			$sql = "UPDATE #__session
					   SET time = :time,
						   data = :data
					 WHERE sessionId = :session;";
			$sql = platformQuery::refactor($sql);

			$query = $db->prepare($sql);
			$query->bindParam(':time', time(), PDO::PARAM_STR);
			$query->bindParam(':data', json_encode($_SESSION, JSON_UNESCAPED_UNICODE), PDO::PARAM_STR);
			$query->bindParam(':session', session_id(), PDO::PARAM_STR);

			$query->execute();
		} else {
			$sql = "INSERT INTO #__session (sessionId, time, data, ip)
					   	 VALUES (:session, :time, :data, :ip);";
			$sql = platformQuery::refactor($sql);

			$query = $db->prepare($sql);
			$query->bindParam(':session', session_id(), PDO::PARAM_STR);
			$query->bindParam(':time', time(), PDO::PARAM_STR);
			$query->bindParam(':data', json_encode($_SESSION, JSON_UNESCAPED_UNICODE), PDO::PARAM_STR);
			$query->bindParam(':ip', utilityHttp::getIpAddress(), PDO::PARAM_STR);

			$query->execute();
		}
	}

	/*
	 * set user id value
	 *
	 * $param	int		$index		set index user id in database
	 * */
	public function setUser($index = 0)
	{
		if($index == 0)
			return false;

		$db = factory::getDbo();

		$sql = "UPDATE #__session
					   SET userId = :user
					 WHERE sessionId = :session;";
		$sql = platformQuery::refactor($sql);

		$query = $db->prepare($sql);
		$query->bindParam(':user', $index, PDO::PARAM_INT);
		$query->bindParam(':session', session_id(), PDO::PARAM_STR);

		$query->execute();
	}

	/*
	 * set client id value
	 *
	 * $param	int		$client		set client id in database
	 *
	 * @reutrn	int
	 * */
	public function setClient($client = 'site')
	{
		$db = factory::getDbo();

		$data = ['site', 'admin', 'exchange', 'webservice', 'other'];
		if(in_array($client, $data)) {
			$sql = "UPDATE #__session
					   SET ".$client." = :client
					 WHERE sessionId = :session;";
			$sql = platformQuery::refactor($sql);

			$query = $db->prepare($sql);
			$query->bindParam(':client', $c = true, PDO::PARAM_BOOL);
			$query->bindParam(':session', session_id(), PDO::PARAM_STR);

			$query->execute();

			return $client;
		} else
			return false;
	}

	/*
	 * get client id value
	 *
	 * @return	int
	 * */
	public function getClient()
	{
		$db = factory::getDbo();

		$sql = "SELECT site, admin, exchange, webservice, other
		 		  FROM #__session
		 		 WHERE sessionId = :session;";
		$sql = platformQuery::refactor($sql);

		$query = $db->prepare($sql);
		$query->bindParam(':session', session_id(), PDO::PARAM_STR);

		$query->execute();
		$result = $query->fetch(\PDO::FETCH_ASSOC);

		$this->client['site'] = $result['site'];
		$this->client['admin'] = $result['admin'];
		$this->client['exchange'] = $result['exchange'];
		$this->client['webservice'] = $result['webservice'];
		$this->client['other'] = $result['other'];

		return $this->client;
	}

	/*
	 * Stores datas in the session.
	 * Example: $instance->foo = 'bar';
	 *
	 * @param    name    Name of the datas.
	 * @param    value    Your datas.
	 *
	 * @return    void
	 */
	public function __set($name, $value)
	{
		$_SESSION[$name] = $value;
		self::storeInDatabase();
	}

	/*
	 * Gets datas from the session.
	 * Example: echo $instance->foo;
	 *
	 * @param	name	Name of the datas to get.
	 *
	 * @return	mixed	Datas stored in session.
	 */
	public function __get($name)
	{
		if(isset($_SESSION[$name]))
			return $_SESSION[$name];
	}

	public function __isset($name)
	{
		return isset($_SESSION[$name]);
	}

	public function __unset($name)
	{
		unset($_SESSION[$name]);
		self::storeInDatabase();
	}

	/*
	 * Destroys the current session.
	 *
	 * @return    bool    TRUE is session has been deleted, else FALSE.
	 */
	public function destroy()
	{
		if($this->state == self::SESSION_STARTED) {
			$this->state = !session_destroy();
			unset($_SESSION);

			return !$this->state;
		}
		self::storeInDatabase();

		return false;
	}
}