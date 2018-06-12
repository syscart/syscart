<?php
/**
 * @package    syscart
 *             libraries/loader.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

spl_autoload_register(function($className) {
    $parts = preg_split('/(?<=\\w)(?=[A-Z])/', $className);
    $arrPart = explode('\\', $parts[1]);
    $namespace = $arrPart[count($arrPart)-1];
    unset($parts[0]);
    unset($parts[1]);
    $fileName = implode('', $parts);

    $load = dirname(__FILE__).DS.$namespace.DS.$fileName.'.php';
    if(is_readable($load))
        loadFile($load);
});