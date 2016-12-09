<?php
/**
 * @package    shopiros
 *             libraries/html/meta.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class htmlMeta
{
    private $meta = [];

    public function set($data)
    {
        $this->meta[] = $data;
    }

    public function get()
    {
        return $this->meta;
    }

    public function render()
    {
        $data = '';
        foreach($this->meta as $tag => $opteion) {
            $data .= '<meta ';
            foreach($opteion as $key => $value) {
                $data .= $key.'="'.$value.'" ';
            }
            $data .= '/>
        ';
        }

        return $data;
    }
}

?>