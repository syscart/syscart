<?php
/**
 * @package    syscart
 *             admin/controller/common/tasks.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonTasks extends adminController
{
    public function index()
    {
        global $client;
        
        return loaderTemplate('common/tasks', [], $client);
    }
}