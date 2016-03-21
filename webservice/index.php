<?php
/**
 * @package    system cart
 *             webservice/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

define('WEBSERVICE_DIR', dirname(__FILE__));

require_once('function.php');
require_once('controller.php');
//echo md5('655ff');
global $client;
$client = 'webservice';
$router = new utilityRouter();

$component = $router->getRoute(1);
if($component) {
    if(file_exists(dirname(__FILE__).'/controller/'.$component.'.php')) {
        require_once( 'controller/'.$component.'.php' );
        $class = 'webserviceController'.ucfirst( $component );
        $object = new $class();
        $function = $router->getRoute(2);
        if($function)
            $object->$function();
        else
            $object->actionIndex();
    } else
        outputError(1);
} else
    outputError(0);