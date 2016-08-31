<?php
/**
 * @package    system cart
 *             admin/controller/setting/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerUsersGroup extends adminController
{
    public function index()
    {
        global $client, $sysDoc, $sysDocScript;

        $button[] = ['id' => 'btn-add', 'color' => 'success', 'icon' => 'glyphicon glyphicon-plus', 'tips' => '{{t:general.button_add}}'];
        $button[] = ['id' => 'btn-delete', 'color' => 'danger', 'icon' => 'glyphicon glyphicon-trash', 'tips' => '{{t:general.button_delete}}'];

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminUserGroup.heading_title}}', $client, 'fa fa-group', $button);

        $sysDoc->addScript('check', 'select', 'fooTable');

        $sysDocScript->setFooter('media/js/route/users/group.js');

        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);

        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'admin/dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting}}', 'url' => 'admin/setting'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting_users}}', 'url' => 'admin/users'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting_users_group}}'];

        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);
    
        $data['classContainer'] = $sysDoc->getClassContainer();
        
        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);

        $sysDoc->setBody(loaderTemplate('users/group', $data, $client));

        $sysDoc->renderHtml();
    }
    
    public function save()
    {
        global $client, $sysDoc;
        
        $settingObject = loaderModule('setting'.DS.'setting', $client);

        $data['success'] = false;
        if((platformRequest::getVar('REQUEST_METHOD', 'SERVER') == 'POST') && $this->validate()) {
            $settingObject->editSetting('setting', platformRequest::post());

            $data['success'] = true;
            $data['data'] = '{{t:adminSetting.message_save_success}}';
        } else {
            $data['error'] = '{{t:adminSetting.error_not_validate}}';
        }

        $sysDoc->setBody($data);
        $sysDoc->renderJson();
    }
    
    private function validate()
    {
        return true;
    }
}