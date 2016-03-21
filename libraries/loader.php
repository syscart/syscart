<?php
/**
 * @package    system cart
 *             libraries/loader.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

spl_autoload_register(function($className) {
    $parts = preg_split('/(?<=\\w)(?=[A-Z])/', $className);
    $arrPart = explode('\\', $parts[0]);
    $namespace = $arrPart[count($arrPart)-1];
    unset($parts[0]);
    $fileName = implode('', $parts);

    $load = dirname(__FILE__).DS.$namespace.DS.$fileName.'.php';

    if(file_exists($load))
        require_once($load);
    else
        trigger_error();
});