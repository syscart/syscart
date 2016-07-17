<?php
/**
 * @package    system cart
 *             index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

define('syscart', true);

define('SITE_DIR', dirname(__FILE__));

/**
 * Define the application's minimum supported PHP version as a constant so it can be referenced within the application.
 */
define('SYSTEMLI_MINIMUM_PHP', '5.3');

if (version_compare(PHP_VERSION, SYSTEMLI_MINIMUM_PHP, '<'))
{
    die('Your host needs to use PHP ' . SYSTEMLI_MINIMUM_PHP . ' or higher to run this version of Systemli!');
}

require_once('../include.php');

global $client;
$client = 'site';

factory::getSession();

utilityRouter::getInstance();