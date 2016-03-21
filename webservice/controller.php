<?php
/**
 * @package    system cart
 *             webservice/controller.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

abstract class webserviceController
{
    abstract function actionIndex();

    protected function checkWebserviceKey()
    {
        $header = getallheaders();
        if(isset($header['sys-webservice-key'])) {
            $data = explode(':', $header['sys-webservice-key']);
            if(count($data) == 2) {
                $key = factory::getConfig()->get('webservice_key');
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
        global $client;
        if(factory::getUser()->isLogin($client))
            return true;
        else
            outputError(5);
    }
}
?>