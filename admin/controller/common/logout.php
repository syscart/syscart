<?php
/**
 * @package    system cart
 *             admin/controller/common/logout.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonLogout extends adminController
{
    public function index()
    {
        global $client;
        $language = loaderLanguage('common/logout', $client);
        echo '<pre dir="ltr">';
        var_dump($language);
        echo '</pre>';
        foreach($language as $item => $value) {
            $data[$item] = $value;
        }

        $data['site_url'] = factory::getConfig()->get('url');
        
        return loaderTemplate('common/logout', $data, $client);
    }
}
?>