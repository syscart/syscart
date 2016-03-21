<?php
/**
 * @package    system cart
 *             libraries/platform/user.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformUser
{
	/**
	 * user id
	 *
	 * @var    int
	 */
	private $id = 0;

	/**
	 * user name
	 *
	 * @var    string
	 */
	private $name;

	/**
	 * username
	 *
	 * @var    string
	 */
	private $username;

	/**
	 * user email
	 *
	 * @var    string
	 */
	private $email;

	/**
	 * user block flag
	 *
	 * @var    bool
	 */
	private $block;

	/**
	 * login user in platform
	 *
	 * @param   string   $username	username for login
	 * @param   string   $password	password for login
	 * @param   int      $client	client id for register in client
	 *
	 * @return  bool
	 * 	        true  -> login
	 * 	        false -> not login
	 */
	public function login($username = NULL, $password = NULL, $client = 'site')
	{
		if($username == NULL || $password == NULL)
			return false;

		$db = factory::getDbo();

		$sql = "SELECT * FROM #__users WHERE username = :username";
		$sql = platformQuery::refactor($sql);

		$query = $db->prepare($sql);
		$query->execute(array(':username' => $username));
		$result = $query->fetch(\PDO::FETCH_ASSOC);

		if($result['password']) {
			$data = explode(':', $result['password']);

			if(md5($password.$data[1]) === $data[0]) {
				factory::getSession()->setUser($result['id']);
				factory::getSession()->setClient($client);
				$this->id = $result['id'];
				$this->name = $result['name'];
				$this->username = $username;
				$this->email = $result['email'];
				$this->block = $result['block'];
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}

	}

	/**
	 * get param to user class
	 *
	 * @param	mixed	$field	filed in class user
	 *
	 * @return  mixed field
	 */
	public function get($field = 'id')
	{
		return ($this->$field) ? $this->$field : NULL;
	}

	/**
	 * set param to user class
	 *
	 * @param	mixed	$field	filed in class user
	 * @param	mixed	$value	field value
	 *
	 * @return  mixed field
	 */
	public function __set($field = 'id' , $value)
	{
		$this->$field = $value;
	}

	public function isLogin($client = 'site')
	{
		$db = factory::getDbo();

		$sql = "SELECT userId, site, admin, exchange, other
		 		  FROM #__session
		 		 WHERE sessionId = :session;";
		$sql = platformQuery::refactor($sql);

		$query = $db->prepare($sql);
		$query->execute(array(':session' => session_id()));
		$result = $query->fetch(\PDO::FETCH_ASSOC);

		if($result['userId'] == 0)
			return false;
		else {
			$data = ['site', 'admin', 'exchange', 'other'];
			if(in_array($client, $data)) {

			}
			switch($client)
			{
				case 'site':
					return ($result['site'] == true) ? true : false;
				case 'admin':
					return ($result['admin'] == true) ? true : false;
				case 'exchange':
					return ($result['exchange'] == true) ? true : false;
				case 'other':
					return ($result['other'] == true) ? true : false;
			}
		}
	}
}
?>