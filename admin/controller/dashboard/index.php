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

        $language = loaderLanguage('dashboard/index', $client);

        $sysDoc->setTitle($language['heading_title']);

        $sysDoc->setDefaultDocument();

        $sysDoc->metaManager()->set([
            'name' => 'description',
            'content' => $sysConfig->get('metaDescription')
        ]);

        foreach($language as $item => $value) {
            $data[$item] = $value;
        }

        $data['site_url'] = $sysConfig->get('url');
        
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);

        $sysDoc->setBody(loaderTemplate('dashboard/index', $data, $client));

        $sysDoc->renderHtml();
    }
}