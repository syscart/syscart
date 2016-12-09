<?php
/**
 * @package    shopiros
 *             index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('shopiros', true);

define('SITE_DIR', dirname(__FILE__));

define('DS', DIRECTORY_SEPARATOR);
/**
 * Define the application's minimum supported PHP version as a constant so it can be referenced within the application.
 */
define('SYSTEMLI_MINIMUM_PHP', '5.3');

if (version_compare(PHP_VERSION, SYSTEMLI_MINIMUM_PHP, '<'))
{
    die('Your host needs to use PHP ' . SYSTEMLI_MINIMUM_PHP . ' or higher to run this version of Systemli!');
}

// VirtualQMOD Include
require_once('../include.php');

global $client;
$client = 'site';

factory::getSession();

utilityRouter::getInstance();