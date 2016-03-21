<?php
/**
 * @package    system cart
 *             console/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

define('CONSOLE_DIR', dirname(__FILE__));

global $client;
$client = 'console';

loadFile(PATH_PLATFORM.DS.$client.DS.'libraries'.DS.'include.php');

array_shift($_SERVER['argv']);

$router = new utilityRouter();

$component = $router->getRouteConsole(0);

if(is_null($component)) {
    echo 'error : not select controller';
} else {
    $file = $router->getRouteConsole(1);
    if(is_null($file)) {
        echo 'error : not select file';
    } else {
        loadFile(PATH_PLATFORM.DS.$client.DS.'controller'.DS.$file.'.php');
        $function = $router->getRouteConsole(2);
        $class = 'consoleController'.ucfirst($component).ucfirst($file);
        $object = new $class();
        if(is_null($function))
            $object->index();
        else
            $object->$function();
    }
}