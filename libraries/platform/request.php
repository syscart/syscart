<?php
/**
 * @package    system cart
 *             libraries/platform/request.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformRequest
{
    /*
     * get variable POST or GET method request
     *
     * @param   string  $question   get name request
     * @param   string  $default    default value
     *
     * @return  safe tag for request name
     * */
    public static function getVar($question, $request = 'POST', $default = NULL)
    {
        $qi = NULL;
        switch($request)
        {
            case 'POST':
            case 'post':
                $qi = (isset($_POST[$question])) ? $_POST[$question] : $default;
                break;
            case 'GET':
            case 'get':
                $qi = (isset($_GET[$question])) ? $_GET[$question] : $default;
                break;
            case 'SERVER':
            case 'server':
                $qi = (isset($_SERVER[$question])) ? $_SERVER[$question] : $default;
                break;
            case 'COOKIE':
            case 'cookie':
                $qi = (isset($_COOKIE[$question])) ? $_COOKIE[$question] : $default;
                break;
            case 'HEADER':
            case 'header':
                $headers = getallheaders();
                $qi = (isset($headers[$question])) ? $headers[$question] : $default;
                break;
        }
        return strip_tags($qi);
    }
    
    public function post()
    {
        return $_POST;
    }
    
    public function get()
    {
        return $_GET;
    }
    
    public function server()
    {
        return $_SERVER;
    }
    
    public function cookie()
    {
        return $_COOKIE;
    }
    
    public function header()
    {
        return getallheaders();
    }
}