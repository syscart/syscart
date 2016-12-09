<?php
/**
 * @package    shopiros
 *             config.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class syscartConfig {
    // database
    public $host = 'localhost';
    public $db = 'syscart';
    public $db_user = 'root';
    public $db_pass = '';
    public $db_port = '3306';
    public $db_prefix = 'sl_';
    // session
    public $lifetime = '15';
    // url
    public $url = 'http://localhost/syscart/web/';
    // webservice
    public $webservice_key = '655';
    // meta
    public $metaDescription = 'title shop';
}