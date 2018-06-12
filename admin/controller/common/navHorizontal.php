<?php
/**
 * @package    syscart
 *             admin/controller/common/navHorizontal.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonNavHorizontal extends adminController
{
    public function index()
    {
        global $client;
    
        $data['tasks'] = loaderController('common'.DS.'tasks', 'index', $client);
        $data['messages'] = loaderController('common'.DS.'messages', 'index', $client);
        $data['audio'] = loaderController('common'.DS.'audio', 'index', $client);
        
        return loaderTemplate('common/navHorizontal', $data, $client);
    }
}