<?php
/**
 * @package    system cart
 *             admin/controller/users/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerUsersIndex extends adminController
{
    public function actionIndex()
    {
        global $sysUser;
        echo utilityString::ss('user page index');
        global $client;
        if($sysUser->isLogin($client)) {

        } else {

        }
    }

    public function actionAjax()
    {
        $this->ajaxCheck();
    }
}