<?php
/**
 * @package    shopiros
 *             admin/controller/catalog/category.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerCatalogCategory extends adminController
{
    public function index()
    {
        global $client, $sysDoc, $sysDocScript;

        $button[] = ['id' => 'btn-add', 'color' => 'success', 'icon' => 'glyphicon glyphicon-plus', 'tips' => '{{t:general.button_add}}'];
        $button[] = ['id' => 'btn-delete', 'color' => 'danger', 'icon' => 'glyphicon glyphicon-trash', 'tips' => '{{t:general.button_delete}}'];

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminCatalogCategory.heading_title}}', $client, 'fa fa-folder-open', $button);

        $sysDoc->addScript('check', 'select', 'fooTable');

        $sysDocScript->setFooter('media/js/route/admin/catalog/category_list.js');

        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);

        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'admin/dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.catalog}}', 'url' => 'admin/catalog'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.catalog_category}}'];

        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);

        $data['classContainer'] = $sysDoc->getClassContainer();

        $categoryObject = loaderModule('catalog'.DS.'category', $client);
        $sortListObject = loaderLibrary('tools'.DS.'sortList', $client);

        $results = $categoryObject->getCategories();
        $categories = $sortListObject->render($results);

        foreach( $categories as $key => $category ) {
            $data['categories'][$key]['id'] = (int)$category['id'];
            $data['categories'][$key]['parent'] = (int)$category['parent'];
            $data['categories'][$key]['name'] = $category['name'];
            $data['categories'][$key]['alias'] = $category['alias'];
            $data['categories'][$key]['state'] = $category['state'];
        }

        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);

        $sysDoc->setBody(loaderTemplate('catalog/category_list', $data, $client));

        $sysDoc->renderHtml();
    }
    
    public function changeState()
    {
        global $client, $sysDoc;
    
        $categoryObject = loaderModule('catalog'.DS.'category', $client);

        $data['success'] = false;
        if((platformRequest::getVar('REQUEST_METHOD', 'SERVER') == 'POST') && $this->validate()) {
            $categoryId = platformRequest::getVar('categoryId');
            $state = platformRequest::getVar('state');
            $categoryObject->changeState($categoryId, $state);

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