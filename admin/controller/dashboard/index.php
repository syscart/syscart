<?php
/**
 * @package    system cart
 *             admin/controller/home/dashboard.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerDashboardIndex extends adminController
{
    public function index()
    {
        global $client, $sysDoc, $sysConfig;

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminDashboard.heading_title}}', $client);

        $data['site_url'] = $sysConfig->get('url');

        $sysDoc->addScript();
        
        $sysDoc->metaManager()->set([
            'name' => 'description',
            'content' => $sysConfig->get('metaDescription')
        ]);

        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);

        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.dashboard}}'];

        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);
        
        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);

        $sysDoc->setBody(loaderTemplate('dashboard/index', $data, $client));

        $sysDoc->renderHtml();
    }
}