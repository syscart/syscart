<?php
/**
 * @package    syscart
 *             admin/controller/users/access.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerUsersAccess extends adminController
{
    public function index()
    {
        global $client, $sysDoc, $sysDocScript;

        $button[] = ['tag' => 'a', 'href' => 'admin/users/access', 'id' => 'btn-delete', 'color' => 'warning    ', 'icon' => 'fa fa-sitemap', 'tips' => '{{t:adminMenu.setting_userAccessTree}}'];
        $button[] = ['id' => 'btn-add', 'color' => 'success', 'icon' => 'glyphicon glyphicon-plus', 'tips' => '{{t:general.button_add}}'];
        $button[] = ['id' => 'btn-delete', 'color' => 'danger', 'icon' => 'glyphicon glyphicon-trash', 'tips' => '{{t:general.button_delete}}'];

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminUserAccess.heading_title}}', $client, 'fa fa-key', $button);

        $sysDoc->addScript('check', 'select', 'fooTable');

        $sysDocScript->setFooter('media/js/route/users/access.js');

        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);

        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'admin/dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting}}', 'url' => 'admin/setting'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting_users}}', 'url' => 'admin/users'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting_users_access}}'];

        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);

        $data['classContainer'] = $sysDoc->getClassContainer();

        $accessObject = loaderModule('users'.DS.'access', $client);

        $results = $accessObject->getAllAccess();
        foreach( $results as $key => $item ) {
            $data['access'][$key]['id'] = $item['id'];
            $data['access'][$key]['name'] = $item['name'];
            $data['access'][$key]['image'] = $item['image'];
            switch($item['type'])
            {
                case 'organization':
                    $data['access'][$key]['typeName'] = '{{t:adminUserAccess.type_organization}}';
                    break;
                case 'department':
                    $data['access'][$key]['typeName'] = '{{t:adminUserAccess.type_department}}';
                    break;
                case 'role':
                    $data['access'][$key]['typeName'] = '{{t:adminUserAccess.type_role}}';
                    break;
                case 'link':
                    $data['access'][$key]['typeName'] = '{{t:adminUserAccess.type_link}}';
                    break;
                case 'action':
                    $data['access'][$key]['typeName'] = '{{t:adminUserAccess.type_action}}';
                    break;
            }
        }

        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);

        $sysDoc->setBody(loaderTemplate('users/access', $data, $client));

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