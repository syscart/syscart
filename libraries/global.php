<?php
/**
 * @package    syscart
 *             libraries/global.php
 *
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

global $sysDocScript;
$sysDocScript = $sysDoc->scriptManager();
global $sysDocStyle;
$sysDocStyle = $sysDoc->stylesheetManager();
global $sysDocMeta;
$sysDocMeta = $sysDoc->metaManager();

global $sysUrl;
$sysUrl = $sysConfig->get('url');