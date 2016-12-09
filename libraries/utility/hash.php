<?php
/**
 * @package    shopiros
 *             libraries/utility/hash.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class utilityHash
{
    /*
	 * get random text
	 *
	 * @param	int		$count		count to get random string
	 *
	 * @return	string
	 * */
    public function getRandomText($count = 32)
    {
        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $rand = '';
        for ($i=0 ; $i<$count ; $i++) {
            $rand .= $char[rand(0, strlen($char)-1)];
        }
        return $rand;
    }
}
?>