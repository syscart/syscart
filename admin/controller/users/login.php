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
        global $client;

        if(($_SERVER['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $username = platformRequest::getVar('username');
            $password = platformRequest::getVar('password');

            factory::getUser()->login($username, $password, $client);
        }

        if(factory::getUser()->isLogin($client)) {
            $session = factory::getSession();
            $header = new platformHeader();
            if($session->requestDataLogin) {
                $dataLogin = $session->requestDataLogin;
                $url = factory::getConfig()->get('url').$dataLogin['route'];
                unset($dataLogin['route']);
                foreach($dataLogin as $key => $value) {
                    $url .= '&'.$key.'='.$value;
                }
                unset($session->requestDataLogin);
                $header->redirect($url);
            } else
                $header->redirect(factory::getConfig()->get('url').'admin');
        } else
            $this->form();
    }

    public function form()
    {
        global $client;
        $language = loaderLanguage('users/login', $client);

        factory::getDocument()->setTitle($language['heading_title']);

        factory::getDocument()->setDefaultDocument();

        factory::getDocument()->metaManager()->set([
            'name' => 'description',
            'content' => factory::getConfig()->get('metaDescription')
        ]);

        factory::getDocument()->setClassTag([
            'html' => 'body-full-height'
        ]);

        foreach($language as $item => $value) {
            $data[$item] = $value;
        }

        $data['site_url'] = factory::getConfig()->get('url');

        factory::getDocument()->setBody(loaderTemplate('users/login', $data, $client));

        factory::getDocument()->renderHtml();
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
?>