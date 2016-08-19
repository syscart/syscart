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
        global $client, $sysDoc;

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminDashboard.heading_title}}', $client);

        $sysDoc->addScript();

        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);

        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'admin/dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.dashboard}}'];

        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);
        
        $data['classContainer'] = $sysDoc->getClassContainer();
        
        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);

        $sysDoc->setBody(loaderTemplate('dashboard/index', $data, $client));

        $sysDoc->renderHtml();
    }
}