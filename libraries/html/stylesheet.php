<?php
/**
 * @package    shopiros
 *             libraries/html/css.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class htmlStylesheet
{
    private $headers = [];
    private $footers = [];

    public function setHeader($data)
    {
        $rel = (isset($data['rel'])) ? $data['rel'] : 'stylesheet';
        $type = (isset($data['type'])) ? $data['type'] : 'text/css';

        $this->headers[] = [
            'rel' => $rel,
            'href' => $data['href'],
            'type' => $type
        ];
    }

    public function setFooters($data)
    {
        $rel = (isset($data['rel'])) ? $data['rel'] : 'stylesheet';
        $type = (isset($data['type'])) ? $data['type'] : 'text/css';

        $this->footers[] = [
            'rel' => $rel,
            'href' => $data['href'],
            'type' => $type
        ];
    }

    public function renderHeader()
    {
        $data = '';
        foreach($this->headers as $value) {
            $data .= '<link rel="'.$value['rel'].'" href="'.$value['href'].'" type="'.$value['type'].'" />
        ';
        }

        return $data;
    }

    public function renderFooter()
    {
        $data = '';
        foreach($this->footers as $value) {
            $data .= '<link rel="'.$value['rel'].'" href="'.$value['href'].'" type="'.$value['type'].'" />
        ';
        }

        return $data;
    }
}
?>