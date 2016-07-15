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

function loaderModule($file = '', $client = 'site')
{
    if($file == '') {
        trigger_error( 'Error: not selection module' );
        exit;
    }
    else {
        $file = PATH_PLATFORM.DS.$client.DS.'module'.DS.$file.'.php';

        if (file_exists($file)) {
            loadFile($file);
            $data = implode('', array_map('ucfirst', explode(DS, $file)));
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
    if($file == '') {
        trigger_error( 'Error: not selection template' );
        exit;
    }
    else {
        $file = PATH_PLATFORM.DS.$client.DS.'templates'.DS.$file.'.tpl';

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

function loaderLanguage($file = '', $client = 'site')
{
    if($file == '') {
        trigger_error( 'Error: not selection language' );
        exit;
    }
    else {
        switch($client)
        {
            case 'site':
                $config = factory::getConfig()->get('languageSite');
                break;
            case 'admin':
                $config = factory::getConfig()->get('languageAdmin');
                break;
            case 'exchange':
                $config = factory::getConfig()->get('languageExchange');
                break;
            case 'webservice':
                $config = factory::getConfig()->get('languageWebservice');
                break;
            case 'other':
                $config = factory::getConfig()->get('languageOther');
                break;
        }
        $default = 'persian';
        
        $fileDefault = PATH_PLATFORM.DS.$client.DS.'language'.DS.$config.DS.'default.php';
        if(!file_exists($fileDefault))
            $fileDefault = PATH_PLATFORM.DS.$client.DS.'language'.DS.$default.DS.'default.php';
        
        if(file_exists($fileDefault)) {
            $dataLanguage = loadFile( $fileDefault, true );
        }

        $fileOption = PATH_PLATFORM.DS.$client.DS.'language'.DS.$config.DS.$file.'.php';
        if(!file_exists($fileOption))
            $fileOption = PATH_PLATFORM.DS.$client.DS.'language'.DS.$default.DS.$file.'.php';

        $_ = loadFile( $fileOption, true );
        $dataLanguage = array_merge( $dataLanguage, $_ );
        
        return $dataLanguage;
    }
}