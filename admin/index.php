<?php
/**
 * @package    shopiros
 *             admin/index.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

define('ADMIN_DIR', dirname(__FILE__));

loadFile(PATH_PLATFORM.DS.'admin'.DS.'libraries'.DS.'include.php');

global $client, $sysUser, $sysConfig, $sysSession, $sysUrl;
$client = 'admin';
$router = new utilityRouter();

$component = $router->getRoute(1);

if($component) {
    $function = $router->getRoute(2);

    if(is_null($function)) {
        if(file_exists(dirname(__FILE__).'/controller/'.$component.'/index.php')) {
            if($sysUser->isLogin($client)) {
                if($component == 'home') {
                    $header = new platformHeader();
                    $header->redirect($sysUrl.'admin/dashboard');
                } else {
                    loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.$component.DS.'index.php');

                    $class = 'adminController'.ucfirst( $component ).ucfirst( 'Index' );
                    $object = new $class();

                    $callback = $router->getRoute(3);
                    $callbackPJax = '_'.$router->getRoute(3);
                    if(is_null($callback))
                        if(!platformRequest::getVar('X-PJAX', 'HEADER'))
                            $object->index();
                        else
                            $object->_index();
                    else
                        if(!platformRequest::getVar('X-PJAX', 'HEADER'))
                            $object->$callback();
                        else
                            $object->$callbackPJax();
                }
            } else {
                if(isset($sysSession->requestDataLogin)) {
                    $header = new platformHeader();
                    $header->redirect($sysUrl.'admin/users/login');
                } else {
                    $sysSession->requestDataLogin = $_GET;

                    $header = new platformHeader();
                    $header->redirect($sysUrl.'admin/users/login');
                }
            }
        } else {
            loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.'error'.DS.'404.php');
            $object = new adminControllerError404();
            $object->index();
        }
    } else {
        if(file_exists(dirname(__FILE__).'/controller/'.$component.'/'.$function.'.php')) {
            if($sysUser->isLogin($client)) {
                if($component == 'login') {
                    $header = new platformHeader();
                    $header->redirect($sysUrl.'admin/dashboard');
                } else {
                    loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.$component.DS.$function.'.php' );

                    $class = 'adminController'.ucfirst( $component ).ucfirst( $function );
                    $object = new $class();

                    $callback = $router->getRoute(3);
                    if(is_null($callback))
                        if(!platformRequest::getVar('X-PJAX', 'HEADER'))
                            $object->index();
                        else
                            $object->_index();
                    else
                        if(!platformRequest::getVar('X-PJAX', 'HEADER'))
                            $object->$callback();
                        else
                            $object->$callbackPJax();
                }
            } else {
                if(isset($sysSession->requestDataLogin)) {
                    loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.'users'.DS.'login.php' );

                    $object = new adminControllerUsersLogin();

                    $callback = $router->getRoute(3);
                    if(is_null($callback))
                        if(!platformRequest::getVar('X-PJAX', 'HEADER'))
                            $object->index();
                        else
                            $object->_index();
                    else
                        if(!platformRequest::getVar('X-PJAX', 'HEADER'))
                            $object->$callback();
                        else
                            $object->$callbackPJax();
                } else {
                    $sysSession->requestDataLogin = $_GET;

                    $header = new platformHeader();
                    $header->redirect($sysUrl.'admin/users/login');
                }
            }
        } else {
            loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.'error'.DS.'404.php');
            $object = new adminControllerError404();
            $object->index();
        }
    }
} else {
    if($sysUser->isLogin($client)) {
        $header = new platformHeader();
        $header->redirect($sysUrl.'admin/dashboard');
    } else {
        $sysSession->requestDataLogin = $_GET;

        $header = new platformHeader();
        $header->redirect($sysUrl.'admin/users/login');
    }
}