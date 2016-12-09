<?php
/**
 * @package    shopiros
 *             admin/model/login/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class consoleModelUsersLogin
{
    public function actionIndex()
    {
        echo utilityString::ss('login form');
    }
}