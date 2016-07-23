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

        $button[] = [
            'id' => 'btn-save',
            'color' => 'success',
            'icon' => 'fa fa-save',
            'text' => '{{t:general.save}}'
        ];

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminSetting.heading_title}}', $client, 'fa fa-cogs', $button);

        $data['site_url'] = $sysConfig->get('url');

        $sysDoc->setDefaultDocument();
        $sysDoc->metaManager()->set([
            'name' => 'description',
            'content' => $sysConfig->get('metaDescription')
        ]);

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
}