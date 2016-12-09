<?php
/**
 * @package    shopiros
 *             admin/controller/common/navHorizontal.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

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