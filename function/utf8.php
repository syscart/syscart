<?php
/**
 * @package    shopiros
 *             function/utf8.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

/**
 * Wrapper round mb_strlen
 * Assumes you have mb_internal_encoding to UTF-8 already
 * Note: this function does not count bad bytes in the string - these
 * are simply ignored
 * @param string UTF-8 string
 * @return int number of UTF-8 characters in string
 * @package utf8
 * @subpackage strings
 */
function utf8_strlen($str){
    return mb_strlen($str);
}

/**
 * Assumes mbstring internal encoding is set to UTF-8
 * Wrapper around mb_strpos
 * Find position of first occurrence of a string
 * @param string haystack
 * @param string needle (you should validate this with utf8_is_valid)
 * @param integer offset in characters (from left)
 * @return mixed integer position or FALSE on failure
 * @package utf8
 * @subpackage strings
 */
function utf8_strpos($str, $search, $offset = FALSE){
    if ( $offset === FALSE ) {
        return mb_strpos($str, $search);
    } else {
        return mb_strpos($str, $search, $offset);
    }
}

/**
 * Assumes mbstring internal encoding is set to UTF-8
 * Wrapper around mb_strrpos
 * Find position of last occurrence of a char in a string
 * @param string haystack
 * @param string needle (you should validate this with utf8_is_valid)
 * @param integer (optional) offset (from left)
 * @return mixed integer position or FALSE on failure
 * @package utf8
 * @subpackage strings
 */
function utf8_strrpos($str, $search, $offset = FALSE){
    if ( $offset === FALSE ) {
        # Emulate behaviour of strrpos rather than raising warning
        if ( empty($str) ) {
            return FALSE;
        }
        return mb_strrpos($str, $search);
    } else {
        if ( !is_int($offset) ) {
            trigger_error('utf8_strrpos expects parameter 3 to be long',E_USER_WARNING);
            return FALSE;
        }
        
        $str = mb_substr($str, $offset);
        
        if ( FALSE !== ( $pos = mb_strrpos($str, $search) ) ) {
            return $pos + $offset;
        }
        
        return FALSE;
    }
}

/**
 * Assumes mbstring internal encoding is set to UTF-8
 * Wrapper around mb_substr
 * Return part of a string given character offset (and optionally length)
 * @param string
 * @param integer number of UTF-8 characters offset (from left)
 * @param integer (optional) length in UTF-8 characters from offset
 * @return mixed string or FALSE if failure
 * @package utf8
 * @subpackage strings
 */
function utf8_substr($str, $offset, $length = FALSE){
    if ( $length === FALSE ) {
        return mb_substr($str, $offset);
    } else {
        return mb_substr($str, $offset, $length);
    }
}

/**
 * Assumes mbstring internal encoding is set to UTF-8
 * Wrapper around mb_strtolower
 * Make a string lowercase
 * Note: The concept of a characters "case" only exists is some alphabets
 * such as Latin, Greek, Cyrillic, Armenian and archaic Georgian - it does
 * not exist in the Chinese alphabet, for example. See Unicode Standard
 * Annex #21: Case Mappings
 * @param string
 * @return mixed either string in lowercase or FALSE is UTF-8 invalid
 * @package utf8
 * @subpackage strings
 */
function utf8_strtolower($str){
    return mb_strtolower($str);
}

/**
 * Assumes mbstring internal encoding is set to UTF-8
 * Wrapper around mb_strtoupper
 * Make a string uppercase
 * Note: The concept of a characters "case" only exists is some alphabets
 * such as Latin, Greek, Cyrillic, Armenian and archaic Georgian - it does
 * not exist in the Chinese alphabet, for example. See Unicode Standard
 * Annex #21: Case Mappings
 * @param string
 * @return mixed either string in lowercase or FALSE is UTF-8 invalid
 * @package utf8
 * @subpackage strings
 */
function utf8_strtoupper($str){
    return mb_strtoupper($str);
}

/**
 * UTF-8 aware alternative to strrev
 * Reverse a string
 * @param string UTF-8 encoded
 * @return string characters in string reverses
 * @see http://www.php.net/strrev
 * @package utf8
 * @subpackage strings
 */
function utf8_strrev($str){
    preg_match_all('/./us', $str, $ar);
    return join('',array_reverse($ar[0]));
}