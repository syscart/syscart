<?php
/**
 * @package    system cart
 *             admin/model/common/breadcrumb.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModelCommonBreadcrumb
{
    public function render($breadcrumb = array())
    {
        $data = '<!-- START BREADCRUMB -->';
        if($breadcrumb) {
            $data .= '<ul class="breadcrumb">';
            foreach( $breadcrumb as $item ) {
                if(isset( $item['url'] ))
                    $data .= '<li><a href="'.$item['url'].'">'.$item['text'].'</a></li>';
                else
                    $data .= '<li>'.$item['text'].'</li>';
            }
            $data .= '</ul>';
        }
        $data .= '<!-- END BREADCRUMB -->';
        
        return $data;
    }
}