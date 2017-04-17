<?php
/**
 * @package    shopiros
 *             libraries/utility/array.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

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