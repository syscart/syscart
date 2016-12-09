<?php
/**
 * @package    shopiros
 *             admin/controller/users/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerUsersIndex extends adminController
{
    public function index()
    {
        global $sysUser;
        echo utilityString::ss('user page index');
        global $client;
        if($sysUser->isLogin($client)) {

        } else {

        }
    }
}