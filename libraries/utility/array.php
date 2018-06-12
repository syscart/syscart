<?php
/**
 * @package    syscart
 *             libraries/utility/array.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

/**
 * syscart Platform string Class
 *
 * This class string to better than function string
 */
class utilityArray
{
    /*
     * get maximum value in array
     *
     * @param   array   $array        array search
     * @param   string  $keyToSearch  key search
     *
     * @return  max value in array
     * */
    public static function maxValueInArray($array, $keyToSearch)
    {
        $currentMax = NULL;
        foreach($array as $arr)
        {
            foreach($arr as $key => $value)
            {
                if ($key == $keyToSearch && ($value >= $currentMax))
                {
                    $currentMax = $value;
                }
            }
        }

        return $currentMax;
    }
}