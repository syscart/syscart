<?php
/**
 * @package    shopiros
 *             admin/controller/catalog/manufacturer.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerCatalogManufacturer extends adminController
{
    public function index()
    {
        global $client, $sysDoc, $sysConfig, $sysDocScript;

        $button[] = ['tag' => 'a', 'href' => 'admin/catalog/manufacturer/add', 'id' => 'btn-add', 'color' => 'success', 'icon' => 'glyphicon glyphicon-plus', 'tips' => '{{t:general.button_add}}'];
        $button[] = ['id' => 'btn-delete', 'color' => 'danger', 'icon' => 'glyphicon glyphicon-trash', 'tips' => '{{t:general.button_delete}}'];

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminCatalogManufacturer.heading_title}}', $client, 'fa fa-industry fa-lg', $button);

        $sysDoc->addScript('check', 'select', 'notification', 'pJax');

        $sysDocScript->setFooter('media/js/route/admin/catalog/manufacturer_list.js');

        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'admin/dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.catalog}}', 'url' => 'admin/catalog'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.catalog_category}}'];
        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);

        $data['classContainer'] = $sysDoc->getClassContainer();

        $data = array_merge($data, $this->getList());

        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);
        $data['footer'] = loaderController('common'.DS.'footer', 'index', $client);

        $sysDoc->setBody(loaderTemplate('catalog/manufacturer_list', $data, $client));

        $sysDoc->renderHtml();
    }

    public function _index()
    {
        global $sysDoc;

        $data['success'] = true;
        $data = array_merge($data, $this->getList());
        if(isset($data['empty'])) {
            $data['success'] = false;
            $data['error'] = '{{t:general.no_data}}';
        }
        $data['language']['edit'] = '{{t:general.edit}}';
        $data['language']['remove'] = '{{t:general.remove}}';

        $sysDoc->setBody($data);
        $sysDoc->renderJson();
    }

    private function getList()
    {
        global $client, $sysConfig;

        if(platformRequest::getVar('filter_id', 'GET'))
            $data['filter_id'] = platformRequest::getVar('filter_id', 'GET');
        else
            $data['filter_id'] = null;

        if(platformRequest::getVar('filter_name', 'GET'))
            $data['filter_name'] = platformRequest::getVar('filter_name', 'GET');
        else
            $data['filter_name'] = null;

        if(platformRequest::getVar('filter_country_id', 'GET'))
            $data['filter_country_id'] = platformRequest::getVar('filter_country_id', 'GET');
        else
            $data['filter_country_id'] = null;

        if(platformRequest::getVar('filter_alias', 'GET'))
            $data['filter_alias'] = platformRequest::getVar('filter_alias', 'GET');
        else
            $data['filter_alias'] = null;

        if(platformRequest::getVar('sort', 'GET'))
            $data['sort'] = platformRequest::getVar('sort', 'GET');
        else
            $data['sort'] = 'name';

        if(platformRequest::getVar('order', 'GET'))
            $data['order'] = platformRequest::getVar('order', 'GET');
        else
            $data['order'] = 'ASC';

        if(platformRequest::getVar('page', 'GET'))
            $data['page'] = (int)platformRequest::getVar('page', 'GET');
        else
            $data['page'] = 1;

        if(platformRequest::getVar('limit', 'GET'))
            $data['limit'] = (int)platformRequest::getVar('limit', 'GET');
        else
            $data['limit'] = (int)$sysConfig->get('setting_tableLimitAdmin');

        $filterData = [
            'filter_id' => $data['filter_id'],
            'filter_name' => $data['filter_name'],
            'filter_country_id' => $data['filter_country_id'],
            'filter_alias' => $data['filter_alias'],
            'sort' => $data['sort'],
            'order' => $data['order'],
            'start' => ($data['page']-1)*$data['limit'],
            'limit' => $data['limit']
        ];

        $manufacturerObject = loaderModule('catalog'.DS.'manufacturer', $client);

        $results = $manufacturerObject->getManufacturer($filterData);

        if($results) {
            foreach( $results as $key => $item ) {
                $data['dataTable'][$key]['id'] = (int)$item['id'];
                $data['dataTable'][$key]['name'] = $item['name'];
                $data['dataTable'][$key]['countryName'] = $item['countryName'];
                $data['dataTable'][$key]['image'] = $item['image'];
                $data['dataTable'][$key]['ordering'] = $item['ordering'];
            }
        } else {
            $data['empty'] = true;
        }

        return $data;
    }

    public function add()
    {
        if(platformRequest::getVar('REQUEST_METHOD', 'SERVER') == 'POST') {

        }

        $this->getForm('add');
    }
    
    public function edit()
    {
        if(platformRequest::getVar('REQUEST_METHOD', 'SERVER') == 'POST') {

        }

        $this->getForm('edit');
    }

    private function getForm($mode)
    {
        global $client, $sysDoc, $sysDocScript;

        $button[] = ['id' => 'btn-save', 'color' => 'success', 'icon' => 'glyphicon glyphicon-floppy-disk', 'tips' => '{{t:general.button_save}}'];
        $button[] = ['tag' => 'a', 'href' => 'admin/catalog/manufacturer', 'id' => 'btn-cancel', 'color' => 'default', 'icon' => 'glyphicon glyphicon-ban-circle', 'tips' => '{{t:general.button_cancel}}'];

        $data['heading_title'] = $sysDoc->setTitle('{{t:adminCatalogManufacturer.heading_title_'.$mode.'}}', $client, 'fa fa-industry fa-lg', $button);

        $sysDoc->addScript('ajaxForm', 'select', 'check', 'notification');

        $sysDocScript->setFooter('media/js/route/admin/catalog/manufacturer_form.js');

        $geographyObject = loaderModule('local'.DS.'geography', $client);

        $data['countries'] = $geographyObject->getAllCountryPublish();
        if($mode == 'edit')
            $data['countryValue'] = 0;
        else
            $data['countryValue'] = 0;

        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'admin/dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.catalog}}', 'url' => 'admin/catalog'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.catalog_manufacturer}}'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.catalog_manufacturer_'.$mode.'}}'];
        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);

        $data['classContainer'] = $sysDoc->getClassContainer();

        $data['sidebar'] = loaderController('common'.DS.'sidebar', 'index', $client);
        $data['nav'] = loaderController('common'.DS.'navHorizontal', 'index', $client);
        $data['logout'] = loaderController('common'.DS.'logout', 'index', $client);
        $data['footer'] = loaderController('common'.DS.'footer', 'index', $client);
        
        $sysDoc->setBody(loaderTemplate('catalog/manufacturer_form', $data, $client));

        $sysDoc->renderHtml();
    }
    
    private function validate()
    {
        return true;
    }
}