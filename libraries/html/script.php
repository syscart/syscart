<?php
/**
 * @package    system cart
 *             libraries/html/script.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class htmlScript
{
    private $headers = [];
    private $footers = [];

    public function setHeader($name, $src, $asinc = false, $class = '')
    {
        $this->headers[] = [
            'name' => $name,
            'src' => $src,
            'asinc' => $asinc,
            'class' => $class
        ];
    }

    public function setFooter($name, $src, $asinc = false, $class = '')
    {
        $this->footers[] = [
            'name' => $name,
            'src' => $src,
            'asinc' => $asinc,
            'class' => $class
        ];
    }

    public function renderHeader()
    {
        $data = '';
        foreach($this->headers as $value) {
            $data .= '<link rel="'.$value['rel'].'" href="'.$value['href'].'" type="'.$value['type'].'" />';
        }

        return $data;
    }

    public function renderFooter()
    {
        $data = '';
        foreach($this->footers as $value) {
            $data .= '<link rel="'.$value['rel'].'" href="'.$value['href'].'" type="'.$value['type'].'" />';
        }

        return $data;
    }
}

?>