<?php
/**
 * @package    shopiros
 *             admin/controller/users/login.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerUsersLogin extends adminController
{
    public function index()
    {
        global $client, $sysUser, $sysSession, $sysUrl;

        if(($_SERVER['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $username = platformRequest::getVar('username');
            $password = platformRequest::getVar('password');

            $sysUser->login($username, $password, $client);
        }

        if($sysUser->isLogin($client)) {
            $header = new platformHeader();
            if($sysSession->requestDataLogin) {
                $dataLogin = $sysSession->requestDataLogin;
                $url = $sysUrl.$dataLogin['route'];
                unset($dataLogin['route']);
                foreach($dataLogin as $key => $value) {
                    $url .= '&'.$key.'='.$value;
                }
                unset($sysSession->requestDataLogin);
                $header->redirect($url);
            } else
                $header->redirect($sysUrl.'admin');
        } else
            $this->form();
    }

    public function form()
    {
        global $client, $sysDoc, $sysConfig;
        
        $sysDoc->setTitle('{{t:adminLogin.heading_title}}');
        
        $sysDoc->addScript();
        
        $sysDoc->setClassTag([
            'html' => 'body-full-height'
        ]);

        $data['backgroundLoginPage'] = $sysConfig->get('setting_backgroundLoginPage');
        
        $sysDoc->setBody(loaderTemplate('users/login', $data, $client));
        
        $sysDoc->renderHtml();
    }

    private function validate()
    {
        $username = platformRequest::getVar('username', 'POST', '');
        $password = platformRequest::getVar('password', 'POST', '');

        if($username)
            if($password)
                return true;
            else
                return false;
        else
            return false;
    }
}