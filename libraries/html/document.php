<?php
/**
 * @package    syscart
 *             libraries/html/document.php
 *
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
                $data .= '<h2 class="pull-right text-title-nav">
                            <span class="'.$icon.'"></span> '.$title.'
                          </h2>';
                if($button) {
                    $data .= '<h2 class="pull-left button-list">';
                        foreach( $button as $item ) {
                            $tag = (isset($item['tag'])) ? $item['tag'] : 'button';
                            $class = (isset($item['class'])) ? ' '.$item['class'] : null;
                            $text = (isset($item['text'])) ? $item['text'] : $item['tips'];
                            switch($tag)
                            {
                                case 'button':
                                    $form = (isset($item['form'])) ? ' form="'.$item['form'].'"' : null;
                                    $type = (isset($item['type'])) ? ' type="'.$item['type'].'"' : null;
                                    $tips = (isset($item['tips'])) ? ' role="button" data-toggle="tooltip" data-placement="top" data-original-title="'.$item['tips'].'"' : null;
                                    $data .= '<button'.$type.' id="'.$item['id'].'" class="btn btn-'.$item['color'].$class.'"'.$form.$tips.'><i class="'.$item['icon'].'"></i> <span class="btn-text">'.$text.'</span></button>';
                                    break;
                                case 'a':
                                    $href = (isset($item['href'])) ? $item['href'] : 'javascript:void(0)';
                                    $tips = (isset($item['tips'])) ? ' role="a" data-toggle="tooltip" data-placement="top" data-original-title="'.$item['tips'].'"' : null;
                                    $data .= '<a href="'.$href.'" id="'.$item['id'].'" class="btn btn-'.$item['color'].$class.'"'.$tips.'><i class="'.$item['icon'].'"></i> <span class="btn-text">'.$text.'</span></a>';
                                    break;
                            }
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
                    $sysDocScript->setFooter('media/js/jquery/plugins/form/jquery.form.js');
                    break;
                case 'select':
                    $sysDocScript->setFooter('media/js/jquery/plugins/bootstrap/bootstrap-select.js');
                    break;
                case 'check':
                    $sysDocScript->setFooter('media/js/jquery/plugins/icheck/icheck.min.js');
                    break;
                case 'notification':
                    $sysDocScript->setFooter('media/js/jquery/plugins/noty/jquery.noty.js');
                    $sysDocScript->setFooter('media/js/jquery/plugins/noty/layouts/topCenter.js');
                    $sysDocScript->setFooter('media/js/jquery/plugins/noty/themes/default.js');
                    break;
                case 'knobChart':
                    $sysDocScript->setFooter('media/js/jquery/plugins/knob/jquery.knob.min.js');
                    break;
                case 'maskedInput':
                    $sysDocScript->setFooter('media/js/jquery/plugins/maskedinput/jquery.maskedinput.min.js');
                    break;
                case 'dataTables':
                    $sysDocScript->setFooter('media/js/jquery/plugins/datatables/jquery.dataTables.min.js');
                    break;
                case 'fullCalendar':
                    $sysDocStyle->setFooters(['href' => 'media/css/fullcalendar/fullcalendar.css']);
                    $sysDocScript->setFooter('media/js/jquery/plugins/fullcalendar/fullcalendar.min.js');
                    $sysDocScript->setFooter('media/js/jquery/plugins/fullcalendar/lang/fa.js');
                    break;
                case 'highlight':
                    $sysDocScript->setFooter('media/js/jquery/plugins/highlight/jquery.highlight-4.js');
                    break;
                case 'morrisChart':
                    $sysDocScript->setFooter('media/js/jquery/plugins/morris/morris.min.js');
                    $sysDocScript->setFooter('media/js/jquery/plugins/morris/raphael-min.js');
                    break;
                case 'owl':
                    $sysDocScript->setFooter('media/js/jquery/plugins/owl/owl.carousel.min.js');
                    break;
                case 'rangeSlider':
                    $sysDocScript->setFooter('media/js/jquery/plugins/rangeslider/jQAllRangeSliders-min.js');
                    break;
                case 'scrollToTop':
                    $sysDocScript->setFooter('media/js/jquery/plugins/scrolltotop/scrolltopcontrol.js');
                    break;
                case 'smartWizard':
                    $sysDocScript->setFooter('media/js/jquery/plugins/smartwizard/jquery.smartWizard-2.0.min.js');
                    break;
                case 'sparkLineChart':
                    $sysDocScript->setFooter('media/js/jquery/plugins/sparkline/jquery.sparkline.min.js');
                    break;
                case 'tagsInput':
                    $sysDocScript->setFooter('media/js/jquery/plugins/tagsinput/jquery.tagsinput.min.js');
                    break;
                case 'fullScreen':
                    $sysDocScript->setFooter('media/js/jquery/plugins/fullscreen/jquery.fullscreen-min.js');
                    break;
                case 'validationEngine':
                    $sysDocScript->setFooter('media/js/jquery/plugins/validationengine/jquery.validationEngine.js');
                    $sysDocScript->setFooter('media/js/jquery/plugins/validationengine/languages/jquery.validationEngine-fa.js');
                    break;
                case 'fooTable':
                    $sysDocStyle->setFooters(['href' => 'media/css/footable/footable.core.css']);
                    $sysDocScript->setFooter('media/js/jquery/plugins/footable/footable.js');
                    break;
                case 'visJs':
                    $sysDocStyle->setFooters(['href' => 'media/css/vis/vis.css']);
                    $sysDocScript->setFooter('media/js/jquery/plugins/vis/vis.js');
                    break;
                case 'pJax':
                    $sysDocScript->setFooter('media/js/jquery/plugins/pjax/jquery.pjax.js');
                    break;
            }
        }
    }

    public function getClassContainer()
    {
        $navigation = platformRequest::getVar('x-navigation', 'COOKIE');

        return ($navigation == 'open') ? 'page-container page-mode-rtl' : 'page-container page-mode-rtl page-navigation-toggled page-container-wide';
    }
}