<?php
/**
 * @package    system cart
 *             admin/controller/common/navHorizontal.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonNavHorizontal extends adminController
{
    public function index()
    {
        global $client, $sysConfig;

        $data['site_url'] = $sysConfig->get('url');
    
        $data['tasks'] = loaderController('common'.DS.'tasks', 'index', $client);
        $data['messages'] = loaderController('common'.DS.'messages', 'index', $client);
        $data['audio'] = loaderController('common'.DS.'audio', 'index', $client);
        
        return loaderTemplate('common/navHorizontal', $data, $client);
    }
}