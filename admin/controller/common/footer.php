<?php
/**
 * @package    shopiros
 *             admin/controller/common/footer.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerCommonFooter extends adminController
{
    public function index()
    {
        global $client;
        
        $modalOption = [
            'id' => 'modal-media',
            'size' => 'large',
            'title' => '{{t:general.title_modal_media}}',
            'showFooter' => false
        ];
        
        $data['modalMedia'] = loaderController('common'.DS.'modal', 'render', $client, $modalOption);
        
        return loaderTemplate('common/footer', $data, $client);
    }
}