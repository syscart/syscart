<?php
/**
 * @package    system cart
 *             admin/controller/common/footer.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonFooter extends adminController
{
    public function index()
    {
        global $client, $sysConfig;
        $language = loaderLanguage('common/footer', $client);
        
        foreach($language as $item => $value) {
            $data[$item] = $value;
        }
        
        $data['site_url'] = $sysConfig->get('url');
        
        return loaderTemplate('common/footer', $data, $client);
    }
}