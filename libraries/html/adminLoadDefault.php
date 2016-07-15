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
        factory::getDocument()->metaManager()->set([
            'name' => 'generator',
            'content' => 'system cart (syscart)'
        ]);

        factory::getDocument()->metaManager()->set([
            'name' => 'viewport',
            'content' => 'width=device-width, initial-scale=1',
        ]);

        factory::getDocument()->metaManager()->set([
            'http-equiv' => 'X-UA-Compatible',
            'content' => 'IE=edge'
        ]);

        factory::getDocument()->metaManager()->set([
            'http-equiv' => 'Content-Type',
            'content' => 'text/html; charset=utf-8'
        ]);
    }

    public function styleHeader()
    {
        factory::getDocument()->stylesheetManager()->setHeader([
            'rel' => 'icon',
            'href' => factory::getConfig()->get('url').'favicon.ico',
            'type' => 'image/x-icon'
        ]);

        factory::getDocument()->stylesheetManager()->setHeader([
            'rel' => 'shortcut icon',
            'href' => factory::getConfig()->get('url').'favicon.ico',
            'type' => 'image/vnd.microsoft.icon'
        ]);

        factory::getDocument()->stylesheetManager()->setHeader([
            'href' => factory::getConfig()->get('url').'templates/backend/css/theme-default.css',
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
        factory::getDocument()->scriptManager()->setFooter(factory::getConfig()->get('url').'templates/backend/js/plugins/jquery/jquery.min.js');
        factory::getDocument()->scriptManager()->setFooter(factory::getConfig()->get('url').'templates/backend/js/plugins/jquery/jquery-ui.min.js');
        factory::getDocument()->scriptManager()->setFooter(factory::getConfig()->get('url').'templates/backend/js/plugins/bootstrap/bootstrap.min.js');
        factory::getDocument()->scriptManager()->setFooter(factory::getConfig()->get('url').'templates/backend/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js');
        factory::getDocument()->scriptManager()->setFooter(factory::getConfig()->get('url').'templates/backend/js/plugins.js');
        factory::getDocument()->scriptManager()->setFooter(factory::getConfig()->get('url').'templates/backend/js/actions.js');
    }
}
?>