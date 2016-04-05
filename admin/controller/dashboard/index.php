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
        global $client;
        $language = loaderLanguage('dashboard/index', $client);

        factory::getDocument()->setTitle($language['heading_title']);

        factory::getDocument()->setDefaultDocument();

        factory::getDocument()->metaManager()->set([
            'name' => 'description',
            'content' => factory::getConfig()->get('metaDescription')
        ]);

        foreach($language as $item => $value) {
            $data[$item] = $value;
        }

        $data['site_url'] = factory::getConfig()->get('url');
        
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);
//        var_dump($data['logout']);
//        exit;

        factory::getDocument()->setBody(loaderTemplate('dashboard/index', $data, $client));

        factory::getDocument()->renderHtml();
    }
}
?>