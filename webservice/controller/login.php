<?php
/**
 * @package    syscart
 *             webservice/controller/login.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class webserviceControllerLogin extends webserviceController
{
    public function actionIndex()
    {
        global $sysUser;
        $this->checkWebserviceKey();

        global $client;
        if($sysUser->isLogin($client))
            outputError(6);
        else {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

            } else
                outputError(7);
        }
    }
}