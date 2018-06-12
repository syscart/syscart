<?php
/**
 * @package    syscart
 *             webservice/controller.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

abstract class webserviceController extends platformController
{
    abstract function actionIndex();

    protected function checkWebserviceKey()
    {
        global $sysConfig;
        $header = getallheaders();
        if(isset($header['sys-webservice-key'])) {
            $data = explode(':', $header['sys-webservice-key']);
            if(count($data) == 2) {
                $key = $sysConfig->get('webservice_key');
                if(strcmp($data[0], md5($key.$data[1])) == 0)
                    return true;
                else
                    outputError(4);
            } else
                outputError(3);
        } else
            outputError(2);
    }

    protected function checkWebserviceLogin()
    {
        global $client, $sysUser;
        if($sysUser->isLogin($client))
            return true;
        else
            outputError(5);
    }
}