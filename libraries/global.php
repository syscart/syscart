<?php
/**
 * @package    system cart
 *             libraries/global.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

global $sysConfig;
$sysConfig = factory::getConfig();
global $sysEvent;
$sysEvent = factory::getEvent();
global $sysDbo;
$sysDbo = factory::getDbo();
global $sysDb;
$sysDb = factory::getDbDriver();
global $sysSession;
$sysSession = factory::getSession();
global $sysUser;
$sysUser = factory::getUser();
global $sysLang;
$sysLang = factory::getLanguage();
global $sysDoc;
$sysDoc = factory::getDocument();