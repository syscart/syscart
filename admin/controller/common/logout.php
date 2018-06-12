<?php
/**
 * @package    syscart
 *             admin/controller/common/logout.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

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