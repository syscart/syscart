<?php
/**
 * @package    system cart
 *             webservice/controller/error.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class webserviceControllerError extends webserviceController
{
    public function actionIndex()
    {
        $this->checkWebserviceKey();
        $this->checkWebserviceLogin();


    }
}
?>