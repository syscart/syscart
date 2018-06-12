<?php
/**
 * @package    syscart
 *             admin/controller/common/messages.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonMessages extends adminController
{
    public function index()
    {
        global $client;
        
        return loaderTemplate('common/messages', [], $client);
    }
}