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
    $arrPart = explode('\\', $parts[0]);
    $namespace = $arrPart[count($arrPart)-1];
    unset($parts[0]);
    $fileName = lcfirst(implode('', $parts));

    $load = dirname(__FILE__).DS.$namespace.DS.$fileName.'.php';

    if(file_exists($load))
        loadFile($load);
    else
        trigger_error();
});