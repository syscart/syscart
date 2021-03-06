<?php
/**
 * @package    syscart
 *             libraries/html/loadDefault.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class htmlAdminLoadDefault
{
    public function meta()
    {
        global $sysDoc;

        $sysDoc->metaManager()->set([
            'name' => 'generator',
            'content' => 'system cart (syscart)'
        ]);
    
        $sysDoc->metaManager()->set([
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1',
        ]);
    
        $sysDoc->metaManager()->set([
            'http-equiv' => 'X-UA-Compatible',
            'content' => 'IE=edge'
        ]);
    
        $sysDoc->metaManager()->set([
            'http-equiv' => 'Content-Type',
            'content' => 'text/html; charset=utf-8'
        ]);
    }

    public function styleHeader()
    {
        global $sysDocStyle;
    
        $sysDocStyle->setHeader([
            'rel' => 'icon',
            'href' => 'favicon.ico',
            'type' => 'image/x-icon'
        ]);
    
        $sysDocStyle->setHeader([
            'rel' => 'shortcut icon',
            'href' => 'favicon.ico',
            'type' => 'image/vnd.microsoft.icon'
        ]);
    
        $sysDocStyle->setHeader([
            'href' => 'media/font/style.css',
        ]);
    }

    public function styleFooter()
    {
        global $sysDocStyle;
    
        $sysDocStyle->setFooters([
            'href' => 'media/css/jqueryui/1.12.0/ul-lightness/jquery-ui.css',
        ]);

        $sysDocStyle->setFooters([
            'href' => 'media/css/bootstrap/bootstrap.min.css',
        ]);

        $sysDocStyle->setFooters([
            'href' => 'media/css/mcustomscrollbar/jquery.mCustomScrollbar.css',
        ]);

        $sysDocStyle->setFooters([
            'href' => 'media/css/theme-default.css',
        ]);
    
        $sysDocStyle->setFooters([
            'href' => 'media/css/style.css',
        ]);
    }

    public function scriptHeader()
    {

    }

    public function scriptFooter()
    {
        global $client, $sysDocScript;
        $sysDocScript->setFooter('media/js/jquery/script/core/2.1.1/jquery.js');
        $sysDocScript->setFooter('media/js/jquery/script/ui/1.12.0/jquery-ui.min.js');
        $sysDocScript->setFooter('media/js/jquery/plugins/bootstrap/bootstrap.min.js');
        $sysDocScript->setFooter('media/js/jquery/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');
        $sysDocScript->setFooter('media/js/plugins.js');
        $sysDocScript->setFooter('media/js/actions.js');
        $sysDocScript->setFooter('media/js/jquery/plugins/cookie/jquery.cookie.js');
        $sysDocScript->setFooter('media/js/route/'.$client.'.php');
    }
}