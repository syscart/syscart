<?php
/**
 * @package    shopiros
 *             admin/controller/common/logout.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerCommonLogout extends adminController
{
    public function index()
    {
        global $client;
        
        return loaderTemplate('common/logout', [], $client);
    }
    
    public function exitApp()
    {
        global $client, $sysDoc, $sysUser;

        $data['success'] = false;

        $status = $sysUser->logout($client);
        if($status){
            $data['success'] = true;
            $data['data'] = '{{t:general.event_exit_success}}';
        } else
            $data['error'] = '{{t:general.event_exit_error}}';
        
        $sysDoc->setBody($data);

        $sysDoc->renderJson();
    }
}