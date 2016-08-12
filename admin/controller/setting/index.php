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
        global $client, $sysDoc, $sysConfig, $sysDocScript;
        
        $button[] = ['id' => 'btn-save', 'color' => 'success', 'icon' => 'fa fa-save', 'text' => '{{t:general.save}}'];
        $data['heading_title'] = $sysDoc->setTitle('{{t:adminSetting.heading_title}}', $client, 'fa fa-cogs', $button);
        
        $sysDoc->addScript('ajaxForm', 'select', 'check', 'notification');

        $sysDocScript->setFooter($sysConfig->get('url').'templates/backend/js/route/setting/index.js');
        
        $sysDoc->metaManager()->set([
            'name' => 'description',
            'content' => $sysConfig->get('metaDescription')
        ]);
        
        $geographyObject = loaderModule('local'.DS.'geography', $client);
        
        $data['countries'] = $geographyObject->getAllCountryPublish();
        $data['zones'] = $geographyObject->getAllZoneCountryPublish($sysConfig->get('setting_country'));
        $data['cities'] = $geographyObject->getAllCityZoneCountryPublish($sysConfig->get('setting_country'), $sysConfig->get('setting_zone'));
        
        $data['currencies'] = null;
        $data['lengthClassIds'] = null;
        $data['weightClassIds'] = null;
        
        $breadcrumbObject = loaderModule('common'.DS.'breadcrumb', $client);
        
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.home}}', 'url' => 'dashboard'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting}}', 'url' => 'setting'];
        $breadcrumb[] = ['text' => '{{t:adminBreadcrumb.setting_base}}'];
        
        $data['breadcrumb'] = $breadcrumbObject->render($breadcrumb);
        
        $data['site_title'] = $sysConfig->get('setting_siteTitle');
        $data['owner'] = $sysConfig->get('setting_owner');
        $data['address'] = $sysConfig->get('setting_address');
        $data['email'] = $sysConfig->get('setting_email');
        $data['tell'] = $sysConfig->get('setting_tell');
        $data['fax'] = $sysConfig->get('setting_fax');
        $data['open'] = $sysConfig->get('setting_open');
        $data['description'] = $sysConfig->get('setting_description');
        
        $data['metaTitle'] = $sysConfig->get('setting_metaTitle');
        $data['metaDescription'] = $sysConfig->get('setting_metaDescription');
        $data['metaKeyword'] = $sysConfig->get('setting_metaKeyword');
        
        $data['countryValue'] = $sysConfig->get('setting_country');
        $data['zoneValue'] = $sysConfig->get('setting_zone');
        $data['cityValue'] = $sysConfig->get('setting_city');
        $data['currencyValue'] = $sysConfig->get('setting_currency');
        $data['lengthClassIdValue'] = $sysConfig->get('setting_lengthClassId');
        $data['weightClassIdValue'] = $sysConfig->get('setting_weightClassId');
        
        $data['showProductCount'] = $sysConfig->get('setting_showProductCount');
        $data['productDescriptionLength'] = $sysConfig->get('setting_productDescriptionLength');
        $data['commentStatus'] = $sysConfig->get('setting_commentStatus');
        $data['commentGuest'] = $sysConfig->get('setting_commentGuest');
        $data['commentMail'] = $sysConfig->get('setting_commentMail');
        $data['voucherMax'] = $sysConfig->get('setting_voucherMax');
        $data['tax'] = $sysConfig->get('setting_tax');
        $data['customerPrice'] = $sysConfig->get('setting_customerPrice');
        $data['loginAttempts'] = $sysConfig->get('setting_loginAttempts');
        $data['customerNewEmail'] = $sysConfig->get('setting_customerNewEmail');
        $data['invoicePrefix'] = $sysConfig->get('setting_invoicePrefix');
        $data['cartWeight'] = $sysConfig->get('setting_cartWeight');
        $data['checkoutGuest'] = $sysConfig->get('setting_checkoutGuest');
        $data['checkoutMail'] = $sysConfig->get('setting_checkoutMail');
        $data['stockDisplay'] = $sysConfig->get('setting_stockDisplay');
        $data['stockWarning'] = $sysConfig->get('setting_stockWarning');
        
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