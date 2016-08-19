<?php
header("Content-type: application/x-javascript");

define('syscart', true);
require_once('../../../../include.php');

global $sysConfig;
?>
$(document).ready(function(){
    var iconXNavigation = '';
    if($('#x-navigation').children('span').hasClass('fa-dedent'))
        iconXNavigation = 'fa-dedent';
    else
        iconXNavigation = 'fa-indent';
    $('#x-navigation').click(function(){
        if(iconXNavigation == 'fa-dedent') {
            iconXNavigation = 'fa-indent';
            $.cookie('x-navigation', 'close', {expires: 365, path: '/'});
        } else {
            iconXNavigation = 'fa-dedent';
            $.cookie('x-navigation', 'open', {expires: 365, path: '/'});
        }
    });
});