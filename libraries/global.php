<?php
/**
 * @package    shopiros
 *             libraries/global.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

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

global $sysDocScript;
$sysDocScript = $sysDoc->scriptManager();
global $sysDocStyle;
$sysDocStyle = $sysDoc->stylesheetManager();
global $sysDocMeta;
$sysDocMeta = $sysDoc->metaManager();

global $sysUrl;
$sysUrl = $sysConfig->get('url');