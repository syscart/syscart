<?php
/**
 * @package    syscart
 *             libraries/utility/string.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

/**
 * syscart Platform string Class
 *
 * This class string to better than function string
 */
class utilityString
{
    /*
     * get variable POST or GET method request
     *
     * @param   string  $question   get name request
     * @param   string  $default    default value
     *
     * @return  safe tag for request name
     * */
    public static function replaceAmp($string = NULL)
    {
        if($string) {
            $string = str_replace('&amp;', '&', $string);
        }

        return $string;
    }

    public static function ss($s)
    {
        return $s;
    }
}
?>