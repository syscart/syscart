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
	private $id = 0;
	private $name;
	private $username;
	private $email;
	private $block;

	public function get($field = 'id')
	{
		return ($this->$field) ? $this->$field : NULL;
	}

	public function __set($field = 'id' , $value)
	{
		$this->$field = $value;
	}

	public function login($username = NULL, $password = NULL, $client = 'site')
	{
		global $sysDbo, $sysSession;

		if($username == NULL || $password == NULL)
			return false;

		$sql = "SELECT * FROM #__users WHERE username = :username";
		$sql = platformQuery::refactor($sql);

		$query = $sysDbo->prepare($sql);
		$query->bindParam(':username', $username, PDO::PARAM_STR);

		$query->execute();
		$result = $query->fetch(\PDO::FETCH_ASSOC);

		if($result['password']) {
			$data = explode(':', $result['password']);

			if(md5($password.$data[1]) === $data[0]) {
				$sysSession->setUser($result['id']);
				$sysSession->setClient($client);
				$this->id = $result['id'];
				$this->name = $result['name'];
				$this->username = $username;
				$this->email = $result['email'];
				$this->block = $result['block'];
				return true;
			} else
				return false;
		} else
			return false;
	}

	public function isLogin($client = 'site')
	{
		global $sysDbo;

		$sql = "SELECT userId, site, admin, exchange, other
		 		  FROM #__session
		 		 WHERE sessionId = :session;";
		$sql = platformQuery::refactor($sql);

		$query = $sysDbo->prepare($sql);
		$query->bindParam(':session', session_id(), PDO::PARAM_STR);

		$query->execute();
		$result = $query->fetch(\PDO::FETCH_ASSOC);

		if($result['userId'] == 0)
			return false;
		else {
			$data = ['site', 'admin', 'exchange', 'other'];
			if(in_array($client, $data)) {
				switch( $client ) {
					case 'site':
						return ( $result[ 'site' ] == true ) ? true : false;
					case 'admin':
						return ( $result[ 'admin' ] == true ) ? true : false;
					case 'exchange':
						return ( $result[ 'exchange' ] == true ) ? true : false;
					case 'other':
						return ( $result[ 'other' ] == true ) ? true : false;
				}
			}
		}
	}

	public function logout($client = 'site')
	{
		global $sysDbo;
		
		$data = ['site', 'admin', 'exchange', 'other'];
		if(in_array($client, $data)) {
			$sql = "UPDATE #__session SET ".$client." = '0' WHERE sessionId = :session;";
			$sql = platformQuery::refactor($sql);
			
			$query = $sysDbo->prepare($sql);
			$query->bindParam(':session', session_id(), PDO::PARAM_STR);
			
			$query->execute();
			if($query->rowCount())
				return true;
			else
				return false;
		} else
			return false;
	}
}