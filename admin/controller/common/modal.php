<?php
/**
 * @package    syscart
 *             admin/controller/common/modal.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonModal extends adminController
{
    public function index()
    {
        return null;
    }

    public function render($option = [])
    {
        global $client;

        $data = [];
        if(isset($option['id']))
            $data['id'] = $option['id'];
        else {
            $randomId = 'modal-'.rand(100,999);
            $data['id'] = $randomId;
        }
        
        if(isset($option['size']))
            if($option['size'] == 'large')
                $data['size'] = 'modal-lg';
            elseif($option['size'] == 'small')
                $data['size'] = 'modal-sm';
            else
                $data['size'] = '';
        else
            $data['size'] = '';

        if(isset($option['buttonFooter']))
            foreach( $option['buttonFooter'] as $item => $button ) {
                $data['buttonFooter'][$item]['title'] = $button['title'];
                $data['buttonFooter'][$item]['size'] = (isset($button['size'])) ? ' btn-'.$button['size'] : '';
                $data['buttonFooter'][$item]['color'] = (isset($button['color'])) ? ' btn-'.$button['size'] : ' btn-default';
                $data['buttonFooter'][$item]['close'] = (isset($button['close'])) ? ' data-dismiss="modal"' : '';
            }
        else
            $data['buttonFooter'] = [];
        
        $data['showHeader'] = (isset($option['showHeader'])) ? $option['showHeader'] : true;
        $data['showFooter'] = (isset($option['showFooter'])) ? $option['showFooter'] : true;
        $data['titleId'] = 'modal-title-'.rand(100,999);
        $data['title'] = (isset($option['title'])) ? $option['title'] : '';
        $data['body'] = (isset($option['body'])) ? $option['body'] : '';
        $data['footer'] = (isset($option['footer'])) ? $option['footer'] : '';
        
        return loaderTemplate('common/modal', $data, $client);
    }
}