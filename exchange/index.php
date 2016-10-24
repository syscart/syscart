<?php
/**
 * @package    system cart
 *             admin/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

define('ADMIN_DIR', dirname(__FILE__));

loadFile('function.php');

global $client, $sysUser, $sysConfig, $sysSession, $sysUrl;
$client = 'admin';
$router = new utilityRouter();

$component = $router->getRoute(1);
if($component) {
    if(file_exists(dirname(__FILE__).'/controller/'.$component.'/index.php')) {
        if($sysUser->isLogin($client)) {
            if($component == 'login') {
                $header = new platformHeader();
                $header->redirect($sysUrl.'admin/dashboard');
            } else {
                loadFile( 'controller/'.$component.'/index.php' );
                $class = 'adminController'.ucfirst( $component );
                $object = new $class();
                $object->actionIndex();
            }
        } else {
            if(isset($sysSession->requestDataLogin)) {
                loadFile( 'controller/login/index.php' );

                $object = new adminControllerLogin();
                $object->actionIndex();
            } else {
                $sysSession->requestDataLogin = $_GET;

                $header = new platformHeader();
                $header->redirect($sysUrl.'admin/login');
            }
        }
    } else {
        adminError();
    }
} else {
    if($sysUser->isLogin($client)) {
        $header = new platformHeader();
        $header->redirect($sysUrl.'admin/dashboard');
    } else {
        $sysSession->requestDataLogin = $_GET;

        $header = new platformHeader();
        $header->redirect($sysUrl.'admin/login');
    }
}