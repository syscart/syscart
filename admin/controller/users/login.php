<?php
/**
 * @package    system cart
 *             admin/controller/users/login.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerUsersLogin extends adminController
{
    public function index()
    {
        global $client, $sysUser, $sysSession, $sysConfig;

        if(($_SERVER['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $username = platformRequest::getVar('username');
            $password = platformRequest::getVar('password');

            $sysUser->login($username, $password, $client);
        }

        if($sysUser->isLogin($client)) {
            $header = new platformHeader();
            if($sysSession->requestDataLogin) {
                $dataLogin = $sysSession->requestDataLogin;
                $url = $sysConfig->get('url').$dataLogin['route'];
                unset($dataLogin['route']);
                foreach($dataLogin as $key => $value) {
                    $url .= '&'.$key.'='.$value;
                }
                unset($sysSession->requestDataLogin);
                $header->redirect($url);
            } else
                $header->redirect($sysConfig->get('url').'admin');
        } else
            $this->form();
    }

    public function form()
    {
        global $client, $sysDoc, $sysConfig;
        
        $sysDoc->setTitle('{{t:adminLogin.heading_title}}');
        
        $sysDoc->addScript();
        
        $sysDoc->metaManager()->set([
            'name' => 'description',
            'content' => $sysConfig->get('metaDescription')
        ]);
        
        $sysDoc->setClassTag([
            'html' => 'body-full-height'
        ]);
        
        $data['site_url'] = $sysConfig->get('url');
        
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