<?php
/**
 * @package    syscart
 *             admin/controller/public/geography.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerPublicGeography extends adminController
{
    public function index()
    {
        // TODO: Implement index() method.
    }
    
    public function getZoneSelect()
    {
        global $client, $sysDoc;

        $data['success'] = false;

        $countryId = platformRequest::getVar('countryId');
        if($countryId) {
            $geographyObject = loaderModule('local'.DS.'geography', $client);

            $data['success'] = true;
            $zones = $geographyObject->getZoneCountrySelectBox($countryId);

            $data['data'] = '<option value="-1">{{t:general.please_select}}</option>';
            foreach( $zones as $zone ) {
                $name = ($zone['faName'] != '') ? $zone['faName'] : $zone['enName'];
                $data['data'] .= '<option value="'.$zone['id'].'">'.$name.'</option>';
            }
        } else {
            $data['error'] = '{{t:adminSetting.error_not_set_country}}';
        }

        $sysDoc->setBody($data);
        $sysDoc->renderJson();
    }

    public function getCitySelect()
    {
        global $client, $sysDoc;

        $data['success'] = false;

        $countryId = platformRequest::getVar('countryId');
        if($countryId) {
            $zoneId = platformRequest::getVar('zoneId');
            if($zoneId) {
                $geographyObject = loaderModule('local'.DS.'geography', $client);
                $data[ 'success' ] = true;
                $cities = $geographyObject->getCityZoneCountrySelectBox($countryId, $zoneId);
                $data[ 'data' ] = '<option value="-1">{{t:general.please_select}}</option>';
                foreach( $cities as $city ) {
                    $name = ( $city[ 'faName' ] != '' ) ? $city[ 'faName' ] : $city[ 'enName' ];
                    $data[ 'data' ] .= '<option value="'.$city[ 'id' ].'">'.$name.'</option>';
                }
            } else
                $data['error'] = '{{t:adminSetting.error_not_set_zone}}';
        } else
            $data['error'] = '{{t:adminSetting.error_not_set_country}}';

        $sysDoc->setBody($data);
        $sysDoc->renderJson();
    }
}