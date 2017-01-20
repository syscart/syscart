<?php
/**
 * @package    shopiros
 *             include.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');
defined('DS') or define('DS', DIRECTORY_SEPARATOR);

define('PATH_PLATFORM', dirname(__FILE__));

// VirtualQMOD
require_once('vqmod'.DS.'vqmod.php');
VQMod::bootup();

function loadFile($file, $language = false)
{
    if(file_exists($file)) {
        $_ = [];

        require_once(VQMod::modCheck($file));

        if($language)
            return $_;
    }
    else {
        trigger_error('Error: Could not load file ' . $file . '!');
        exit;
    }
}

loadFile(PATH_PLATFORM.DS.'config.php');

loadFile(PATH_PLATFORM.DS.'libraries'.DS.'function.php');
loadFile(PATH_PLATFORM.DS.'libraries'.DS.'loader.php');
loadFile(PATH_PLATFORM.DS.'libraries'.DS.'factory.php');
loadFile(PATH_PLATFORM.DS.'libraries'.DS.'global.php');

loadConfig();