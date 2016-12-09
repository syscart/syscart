<?php
/**
 * @package    shopiros
 *             admin/controller/error/404.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerError404 extends adminController
{
    public function index()
    {
        loadFile(ADMIN_DIR.DS.'templates'.DS.'error'.DS.'index.php');
    }
}