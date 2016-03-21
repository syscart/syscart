<?php
/**
 * @package    system cart
 *             webservice/controller/login.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class webserviceControllerLogin extends webserviceController
{
    public function actionIndex()
    {
        $this->checkWebserviceKey();

        global $client;
        if(factory::getUser()->isLogin($client))
            outputError(6);
        else {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {

            } else
                outputError(7);
        }
    }
}
?>