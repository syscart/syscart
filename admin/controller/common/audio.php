<?php
/**
 * @package    syscart
 *             admin/controller/common/audio.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminControllerCommonAudio extends adminController
{
    public function index()
    {
        global $client;
        
        return loaderTemplate('common/audio', [], $client);
    }
}