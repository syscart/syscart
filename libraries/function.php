<?php
/**
 * @package    system cart
 *             libraries/function.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

function loaderController($file = '', $function = 'index', $client = 'site')
{
    if($file == '') {
        trigger_error( 'Error: not selection controller' );
        exit;
    }
    else {
        $fileController = PATH_PLATFORM.DS.$client.DS.'controller'.DS.$file.'.php';

        if (file_exists($fileController)) {
            loadFile($fileController);
            $data = implode('', array_map('ucfirst', explode(DS, $file)));
            $class = $client . 'Controller' . $data;
            $object = new $class();
            return $object->$function();
        } else {
            trigger_error('Error: Could not load controller ' . $file . '!');
            exit;
        }
    }
}

function loaderModule($map = '', $client = 'site')
{
    if($map == '') {
        trigger_error( 'Error: not selection module' );
        exit;
    }
    else {
        $file = PATH_PLATFORM.DS.$client.DS.'module'.DS.$map.'.php';

        if (file_exists($file)) {
            loadFile($file);
            $data = implode('', array_map('ucfirst', explode(DS, $map)));
            $class = $client . 'Module' . $data;
            $object = new $class();
            return $object;
        } else {
            trigger_error('Error: Could not load model ' . $file . '!');
            exit;
        }
    }
}

function loaderTemplate($file = '', $data = array(), $client = 'site')
{
    global $sysUrl;
    if($file == '') {
        trigger_error( 'Error: not selection template' );
        exit;
    }
    else {
        $file = PATH_PLATFORM.DS.$client.DS.'templates'.DS.$file.'.tpl';
        
        $data['site_url'] = $sysUrl;
        if (file_exists($file)) {
            extract($data);
            ob_start();

            require_once($file);

            $output = ob_get_contents();
            ob_end_clean();
            return $output;
        } else {
            trigger_error('Error: Could not load template ' . $file . '!');
            exit;
        }
    }
}