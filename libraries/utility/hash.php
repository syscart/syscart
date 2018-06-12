<?php
/**
 * @package    syscart
 *             libraries/utility/hash.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

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