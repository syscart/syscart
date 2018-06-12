<?php
/**
 * @package    syscart
 *             config.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class syscartConfig {
    // database
    public $host = 'localhost';
    public $db = 'syscart';
    public $db_user = 'root';
    public $db_pass = '';
    public $db_port = '3306';
    public $db_prefix = 'sl_';
    // session
    public $lifetime = '150';
    // url
    public $url = 'http://localhost/syscart/web/';
    // webservice
    public $webservice_key = '655';
    // meta
    public $metaDescription = 'title shop';
}