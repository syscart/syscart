<?php
/**
 * @package    system cart
 *             libraries/html/loadDefault.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class htmlAdminLoadDefault
{
    public function meta()
    {
        global $sysDoc, $sysConfig;

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
        global $sysConfig, $sysDocStyle;
    
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
            'href' => 'templates/backend/css/theme-default.css',
        ]);
    
        $sysDocStyle->setFooters([
            'href' => 'templates/backend/css/style.css',
        ]);
    }

    public function scriptHeader()
    {

    }

    public function scriptFooter()
    {
        global $sysDocScript;
        $sysDocScript->setFooter('templates/backend/js/plugins/jquery/jquery.min.js');
        $sysDocScript->setFooter('templates/backend/js/plugins/jquery/jquery-ui.min.js');
        $sysDocScript->setFooter('templates/backend/js/plugins/bootstrap/bootstrap.min.js');
        $sysDocScript->setFooter('templates/backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');
        $sysDocScript->setFooter('templates/backend/js/plugins.js');
        $sysDocScript->setFooter('templates/backend/js/actions.js');
    }
}
?>