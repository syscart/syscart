<?php
/**
 * @package    shopiros
 *             console/libraries/include.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

loadFile(PATH_PLATFORM.DS.'console'.DS.'libraries'.DS.'loader.php');
loadFile(PATH_PLATFORM.DS.'console'.DS.'controller'.DS.'controller.php');
loadFile(PATH_PLATFORM.DS.'console'.DS.'module'.DS.'module.php');