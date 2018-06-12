<?php
/**
 * @package    syscart
 *             admin/model/login/index.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModelUsersLogin
{
    public function actionIndex()
    {
        echo utilityString::ss('login form');
    }
}