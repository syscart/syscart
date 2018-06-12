<?php
/**
 * @package    syscart
 *             admin/controller/common/sidebar.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonSidebar extends adminController
{
    public function index()
    {
        global $client;
        
        return loaderTemplate('common/sidebar', [], $client);
    }
}