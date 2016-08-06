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

class adminControllerSettingIndex extends adminController
{
    public function index()
    {
        global $client, $sysDoc, $sysConfig;

        $button[] = ['id' => 'btn-cancel', 'color' => 'default', 'icon' => 'fa fa-reply', 'text' => '{{t:general.cancel}}'];
        $button[] = ['id' => 'btn-save', 'color' => 'success', 'icon' => 'fa fa-save', 'text' => '{{t:general.save}}'];

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminSetting.heading_title}}', $client, 'fa fa-cogs', $button);

        $data['site_url'] = $sysConfig->get('url');

        $sysDoc->setDefaultDocument();
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins/form/jquery.form.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins/bootstrap/bootstrap-select.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins/icheck/icheck.min.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/route/setting/index.js');

        $sysDoc->metaManager()->set([
            'name' => 'description',
            'content' => $sysConfig->get('metaDescription')
        ]);

        $geographyObject = loaderModule('local'.DS.'geography', $client);

        $data['countries'] = $geographyObject->getAllCountryPublish();
        
        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);

        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting}}', 'url' => 'setting'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting_base}}'];

        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);
        
        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);

        $sysDoc->setBody(loaderTemplate('setting/index', $data, $client));

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