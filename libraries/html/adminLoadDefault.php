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
        global $sysDoc, $sysConfig;
    
        $sysDoc->stylesheetManager()->setHeader([
            'rel' => 'icon',
            'href' => $sysConfig->get('url').'favicon.ico',
            'type' => 'image/x-icon'
        ]);

        $sysDoc->stylesheetManager()->setHeader([
            'rel' => 'shortcut icon',
            'href' => $sysConfig->get('url').'favicon.ico',
            'type' => 'image/vnd.microsoft.icon'
        ]);

        $sysDoc->stylesheetManager()->setHeader([
            'href' => $sysConfig->get('url').'templates/backend/css/theme-default.css',
        ]);
    }

    public function styleFooter()
    {

    }

    public function scriptHeader()
    {

    }

    public function scriptFooter()
    {
        global $sysDoc, $sysConfig;
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins/jquery/jquery.min.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins/jquery/jquery-ui.min.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins/bootstrap/bootstrap.min.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/plugins.js');
        $sysDoc->scriptManager()->setFooter($sysConfig->get('url').'templates/backend/js/actions.js');
    }
}
?>