<?php
/**
 * @package    syscart
 *             webservice/controller/session.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class webserviceControllerSession extends webserviceController
{
    public function actionIndex()
    {
        $this->checkWebserviceKey();

        if($_SERVER['REQUEST_METHOD'] == 'GET') {
            $data['success'] = true;
            $data['data'] = ['sessionId' => session_id()];

            outputJson($data);
        } else
            outputError(8);
    }
}
?>