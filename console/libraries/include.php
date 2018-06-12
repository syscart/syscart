<?php
/**
 * @package    syscart
 *             console/libraries/include.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

loadFile(PATH_PLATFORM.DS.'console'.DS.'libraries'.DS.'loader.php');
loadFile(PATH_PLATFORM.DS.'console'.DS.'controller'.DS.'controller.php');
loadFile(PATH_PLATFORM.DS.'console'.DS.'module'.DS.'module.php');