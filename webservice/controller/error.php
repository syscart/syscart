<?php
/**
 * @package    syscart
 *             webservice/controller/error.php
 *
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