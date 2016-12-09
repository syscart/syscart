<?php
/**
 * @package    shopiros
 *             libraries/platform/header.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class platformHeader
{
    private $data = array();

    public function __toString()
    {
        return get_class($this);
    }

    public function set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if(isset($this->data[$name]))
            return $this->data[$name];
        else
            return false;
    }

    public function __isset($name)
    {
        return isset($this->data[$name]);
    }

    public function __unset($name)
    {
        unset($this->data[$name]);
    }

    public function redirect($url, $status = 302)
    {
        header('Location: ' . str_replace(array('&amp;', "\n", "\r"), array('&', '', ''), $url), true, $status);
        exit;
    }

    public function output()
    {
        if(!headers_sent()) {
            if($this->data) {
                factory::getEvent()->listen('onBeforeSendHeader');
                foreach($this->data as $header => $value) {
                    header($header.':'.$value, true);
                }
                factory::getEvent()->listen('onAfterSendHeader');
            }
        }
    }
}
?>