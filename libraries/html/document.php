<?php
/**
 * @package    system cart
 *             libraries/html/document.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class htmlDocument
{
    private $beforeBody;
    private $body;
    private $afterBody;
    private $title = 'system library manager';
    private $classTag = [];

    protected static $meta = null;
    protected static $stylesheet = null;
    protected static $script = null;
    protected static $adminDefault = null;

    public static function metaManager()
    {
        if (!self::$meta)
            self::$meta = new htmlMeta();

        return self::$meta;
    }

    public static function stylesheetManager()
    {
        if (!self::$stylesheet)
            self::$stylesheet = new htmlStylesheet();

        return self::$stylesheet;
    }

    public static function scriptManager()
    {
        if (!self::$script)
            self::$script = new htmlScript();

        return self::$script;
    }

    public static function adminDefaultManager()
    {
        if (!self::$adminDefault)
            self::$adminDefault = new htmlAdminLoadDefault();

        return self::$adminDefault;
    }

    public function setDefaultDocument()
    {
        $this->adminDefaultManager()->meta();
        $this->adminDefaultManager()->styleHeader();
        $this->adminDefaultManager()->styleFooter();
        $this->adminDefaultManager()->scriptHeader();
        $this->adminDefaultManager()->scriptFooter();
    }

    public function setBody($data)
    {
        $this->body = $data;
    }

    public function setBeforeBody($data)
    {
        $this->beforeBody = $data;
    }

    public function setAfterBody($data)
    {
        $this->afterBody = $data;
    }

    public function setTitle($title, $client = null, $icon = 'fa fa-arrow-circle-o-left', $button = null)
    {
        $this->title = $title;
        
        $data = null;
        if($client == 'admin') {
            $data .= '<div class="page-title">';
                $data .= '<h2 class="pull-right">
                            <span class="'.$icon.'"></span> '.$title.'
                          </h2>';
                if($button) {
                    $data .= '<h2 class="pull-left button-list">';
                        foreach( $button as $item ) {
                            $class = (isset($item['class'])) ? ' '.$item['class'] : null;
                            $type = (isset($item['type'])) ? ' type="'.$item['type'].'"' : null;
                            $form = (isset($item['form'])) ? ' form="'.$item['form'].'"' : null;
                            $data .= '<button'.$type.' id="'.$item['id'].'" class="btn btn-'.$item['color'].$class.'"'.$form.'><i class="'.$item['icon'].'"></i> '.$item['text'].'</button>';
                        }
                    $data .= '</h2>';
                }
            $data .= '</div>';
        }
        
        return $data;
    }

    public function setClassTag($data)
    {
        $this->classTag = $data;
    }

    public function renderHtml()
    {
        global $sysLang, $sysUrl;

        $classTagHtml = (isset($this->classTag['html'])) ? ' class="'.$this->classTag['html'].'"' : '';
        $classTagHead = (isset($this->classTag['head'])) ? ' class="'.$this->classTag['head'].'"' : '';
        $classTagBody = (isset($this->classTag['body'])) ? ' class="'.$this->classTag['body'].'"' : '';
        $data = '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"'.$classTagHtml.' xml:lang="'.$sysLang->getCode().'" lang="'.$sysLang->getCode().'" dir="'.$sysLang->getDirection().'">
    <head'.$classTagHead.'>
        <title>'.$this->title.'</title>
        <base href="'.$sysUrl.'"/>
        '.$this->metaManager()->render().'
        '.$this->stylesheetManager()->renderHeader().'
        '.$this->scriptManager()->renderHeader().'
    </head>
    <body'.$classTagBody.'>
        '.$this->beforeBody.'
        '.$this->body.'
        '.$this->afterBody.'
        '.$this->stylesheetManager()->renderFooter().'
        '.$this->scriptManager()->renderFooter().'
    </body>
</html>';
    
        echo $sysLang->generate($data);
    }

    public function renderJson()
    {
        global $sysLang;

        $data = json_encode($this->body, JSON_UNESCAPED_UNICODE);
    
        echo $sysLang->generate($data);
    }

    public function addScript()
    {
        $script = func_get_args();
        global $sysDocScript, $sysDocStyle;
    
        $this->setDefaultDocument();
        
        foreach( $script as $key ) {
            switch($key)
            {
                case 'ajaxForm':
                    $sysDocScript->setFooter('templates/backend/js/plugins/form/jquery.form.js');
                    break;
                case 'select':
                    $sysDocScript->setFooter('templates/backend/js/plugins/bootstrap/bootstrap-select.js');
                    break;
                case 'check':
                    $sysDocScript->setFooter('templates/backend/js/plugins/icheck/icheck.min.js');
                    break;
                case 'notification':
                    $sysDocScript->setFooter('templates/backend/js/plugins/noty/jquery.noty.js');
                    $sysDocScript->setFooter('templates/backend/js/plugins/noty/layouts/topCenter.js');
                    $sysDocScript->setFooter('templates/backend/js/plugins/noty/themes/default.js');
                    break;
                case 'knobChart':
                    $sysDocScript->setFooter('templates/backend/js/plugins/knob/jquery.knob.min.js');
                    break;
                case 'maskedInput':
                    $sysDocScript->setFooter('templates/backend/js/plugins/maskedinput/jquery.maskedinput.min.js');
                    break;
                case 'dataTables':
                    $sysDocScript->setFooter('templates/backend/js/plugins/datatables/jquery.dataTables.min.js');
                    break;
                case 'fullCalendar':
                    $sysDocStyle->setFooters(['href' => 'media/css/fullcalendar/fullcalendar.css']);
                    $sysDocScript->setFooter('templates/backend/js/plugins/fullcalendar/fullcalendar.min.js');
                    $sysDocScript->setFooter('templates/backend/js/plugins/fullcalendar/lang/fa.js');
                    break;
                case 'highlight':
                    $sysDocScript->setFooter('templates/backend/js/plugins/highlight/jquery.highlight-4.js');
                    break;
                case 'morrisChart':
                    $sysDocScript->setFooter('templates/backend/js/plugins/morris/morris.min.js');
                    $sysDocScript->setFooter('templates/backend/js/plugins/morris/raphael-min.js');
                    break;
                case 'owl':
                    $sysDocScript->setFooter('templates/backend/js/plugins/owl/owl.carousel.min.js');
                    break;
                case 'rangeSlider':
                    $sysDocScript->setFooter('templates/backend/js/plugins/rangeslider/jQAllRangeSliders-min.js');
                    break;
                case 'scrollToTop':
                    $sysDocScript->setFooter('templates/backend/js/plugins/scrolltotop/scrolltopcontrol.js');
                    break;
                case 'smartWizard':
                    $sysDocScript->setFooter('templates/backend/js/plugins/smartwizard/jquery.smartWizard-2.0.min.js');
                    break;
                case 'sparkLineChart':
                    $sysDocScript->setFooter('templates/backend/js/plugins/sparkline/jquery.sparkline.min.js');
                    break;
                case 'tagsInput':
                    $sysDocScript->setFooter('templates/backend/js/plugins/tagsinput/jquery.tagsinput.min.js');
                    break;
                case 'fullScreen':
                    $sysDocScript->setFooter('templates/backend/js/plugins/fullscreen/jquery.fullscreen-min.js');
                    break;
                case 'validationEngine':
                    $sysDocScript->setFooter('templates/backend/js/plugins/validationengine/jquery.validationEngine.js');
                    $sysDocScript->setFooter('templates/backend/js/plugins/validationengine/languages/jquery.validationEngine-fa.js');
                    break;
            }
        }
    }
}