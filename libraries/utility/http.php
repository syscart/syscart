<?php
/**
 * @package    syscart
 *             libraries/utility/query.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class utilityHttp
{
    /**
     * @return mixed
     */
    public static function getIpAddress()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        return $ip;
    }
}
?>