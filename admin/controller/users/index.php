<?php
/**
 * @package    syscart
 *             admin/controller/users/index.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerUsersIndex extends adminController
{
    public function index()
    {
        global $sysUser;
        echo utilityString::ss('user page index');
        global $client;
        if($sysUser->isLogin($client)) {

        } else {

        }
    }
}