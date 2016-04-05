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

loadFile(PATH_PLATFORM.DS.'admin'.DS.'libraries'.DS.'include.php');

global $client;
$client = 'admin';
$router = new utilityRouter();

$component = $router->getRoute(1);

if($component) {
    $function = $router->getRoute(2);

    if(is_null($function)) {
        if(file_exists(dirname(__FILE__).'/controller/'.$component.'/index.php')) {
            if(factory::getUser()->isLogin($client)) {
                if($component == 'home') {
                    $header = new platformHeader();
                    $header->redirect(factory::getConfig()->get('url').'admin/dashboard');
                } else {
                    loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.$component.DS.'index.php');

                    $class = 'adminController'.ucfirst( $component ).ucfirst( 'Index' );
                    $object = new $class();

                    $callback = $router->getRoute(3);
                    if(is_null($callback))
                        $object->index();
                    else
                        $object->$callback();
                }
            } else {
                $session = factory::getSession();
                if(isset($session->requestDataLogin)) {
                    $header = new platformHeader();
                    $header->redirect(factory::getConfig()->get('url').'admin/users/login');
                } else {
                    $session->requestDataLogin = $_GET;

                    $header = new platformHeader();
                    $header->redirect(factory::getConfig()->get('url').'admin/users/login');
                }
            }
        } else {
            loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.'error'.DS.'404.php');
            $object = new adminControllerError404();
            $object->index();
        }
    } else {
        if(file_exists(dirname(__FILE__).'/controller/'.$component.'/'.$function.'.php')) {
            if(factory::getUser()->isLogin($client)) {
                if($component == 'login') {
                    $header = new platformHeader();
                    $header->redirect(factory::getConfig()->get('url').'admin/dashboard');
                } else {
                    loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.$component.DS.$function.'.php' );

                    $class = 'adminController'.ucfirst( $component ).ucfirst( $function );
                    $object = new $class();

                    $callback = $router->getRoute(3);
                    if(is_null($callback))
                        $object->index();
                    else
                        $object->$callback();
                }
            } else {
                $session = factory::getSession();
                if(isset($session->requestDataLogin)) {
                    loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.'users'.DS.'login.php' );

                    $object = new adminControllerUsersLogin();

                    $callback = $router->getRoute(3);
                    if(is_null($callback))
                        $object->index();
                    else
                        $object->$callback();
                } else {
                    $session->requestDataLogin = $_GET;

                    $header = new platformHeader();
                    $header->redirect(factory::getConfig()->get('url').'admin/users/login');
                }
            }
        } else {
            loadFile(PATH_PLATFORM.DS.'admin'.DS.'controller'.DS.'error'.DS.'404.php');
            $object = new adminControllerError404();
            $object->index();
        }
    }
} else {
    if(factory::getUser()->isLogin($client)) {
        $header = new platformHeader();
        $header->redirect(factory::getConfig()->get('url').'admin/dashboard');
    } else {
        $session = factory::getSession();
        $session->requestDataLogin = $_GET;

        $header = new platformHeader();
        $header->redirect(factory::getConfig()->get('url').'admin/users/login');
    }
}