<?php
/**
 * @package    syscart
 *             admin/controller/error/404.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerError404 extends adminController
{
    public function index()
    {
        loadFile(ADMIN_DIR.DS.'templates'.DS.'error'.DS.'index.php');
    }
}