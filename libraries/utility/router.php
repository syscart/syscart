<?php
/**
 * @package    system cart
 *             libraries/utility/router.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class utilityRouter
{
    public static function getInstance()
    {
        global $sysConfig, $sysDbo;
    
        $sql = "SELECT * FROM #__setting";
        $sql = platformQuery::refactor($sql);
    
        $query = $sysDbo->prepare($sql);
    
        $query->execute();
        $resultConfig = $query->fetchAll(\PDO::FETCH_ASSOC);
        
        foreach( $resultConfig as  $data ) {
            if($data['serialized'])
                $sysConfig->set($data['key'], json_decode($data['value']));
            else
                $sysConfig->set($data['key'], $data['value']);
        }
        
        switch(self::getRoute(0))
        {
            case 'admin':
                loadFile(PATH_PLATFORM.DS.'admin'.DS.'index.php');
                break;
            case 'exchange':
                loadFile(PATH_PLATFORM.DS.'exchange'.DS.'index.php');
                break;
            case 'install':
                break;
            case 'page':
                break;
            case 'feed':
                break;
            case 'webservice':
                loadFile(PATH_PLATFORM.DS.'webservice'.DS.'index.php');
                break;
            default:
                $router = explode('/', platformRequest::getVar('route', 'GET'));
                echo platformRequest::getVar('route', 'GET');
                break;
        }
    }

    /**
     * @param $number
     *
     * @return utilityRouter|null
     */
    public function getRoute($number)
    {
        if(isset(explode('/', platformRequest::getVar('route', 'GET'))[$number]))
            return explode('/', platformRequest::getVar('route', 'GET'))[$number];
        else
            return NULL;
    }

    public function getRouteConsole($number)
    {
        if(isset(platformRequest::getVar('argv', 'SERVER')[0])) {
            $data = explode('/', platformRequest::getVar('argv', 'SERVER')[0]);
            if(isset($data[$number]))
                return $data[$number];
            else
                return NULL;
        } else
            return NULL;
    }
}