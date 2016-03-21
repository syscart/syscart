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

        if(factory::getUser()->isLogin($client)) {
            $session = factory::getSession();
            if($session->requestDataLogin) {
                $url = factory::getConfig()->get('url').$session->requestDataLogin['route'];
                unset($session->requestDataLogin['route']);
                foreach($session->requestDataLogin as $key => $value) {
                    $url .= '&'.$key.'='.$value;
                }
                $header = new platformHeader();
                $header->redirect($url);
            } else
                $this->form();
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

        $data = [];

        foreach($language as $item => $value) {
            $data[$item] = $value;
        }

        $data['site_url'] = factory::getConfig()->get('url');

        factory::getDocument()->setBody(loaderTemplate('users/login', $data, $client));

        factory::getDocument()->renderHtml();
    }

    public function login()
    {

    }
}
?>