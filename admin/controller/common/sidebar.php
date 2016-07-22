<?php
/**
 * @package    system cart
 *             admin/controller/common/sidebar.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonSidebar extends adminController
{
    public function index()
    {
        global $client, $sysConfig;

        $data['site_url'] = $sysConfig->get('url');
        
        return loaderTemplate('common/sidebar', $data, $client);
    }
}