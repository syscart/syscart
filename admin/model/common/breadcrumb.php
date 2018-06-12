<?php
/**
 * @package    syscart
 *             admin/model/common/breadcrumb.php
 *
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