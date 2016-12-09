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
        
        return loaderTemplate('common/footer', [], $client);
    }
}