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

require_once('function.php');

global $client;
$client = 'admin';
$router = new utilityRouter();

$component = $router->getRoute(1);
if($component) {
    if(file_exists(dirname(__FILE__).'/controller/'.$component.'/index.php')) {
        if(factory::getUser()->isLogin($client)) {
            if($component == 'login') {
                $header = new platformHeader();
                $header->redirect(factory::getConfig()->get('url').'admin/dashboard');
            } else {
                require_once( 'controller/'.$component.'/index.php' );
                $class = 'adminController'.ucfirst( $component );
                $object = new $class();
                $object->actionIndex();
            }
        } else {
            $session = factory::getSession();
            if(isset($session->requestDataLogin)) {
                require_once( 'controller/login/index.php' );

                $object = new adminControllerLogin();
                $object->actionIndex();
            } else {
                $session->requestDataLogin = $_GET;

                $header = new platformHeader();
                $header->redirect(factory::getConfig()->get('url').'admin/login');
            }
        }
    } else {
        adminError();
    }
} else {
    if(factory::getUser()->isLogin($client)) {
        $header = new platformHeader();
        $header->redirect(factory::getConfig()->get('url').'admin/dashboard');
    } else {
        $session = factory::getSession();
        $session->requestDataLogin = $_GET;

        $header = new platformHeader();
        $header->redirect(factory::getConfig()->get('url').'admin/login');
    }
}