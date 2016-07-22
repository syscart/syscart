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

    public function setTitle($title, $client = null)
    {
        $this->title = $title;
        
        $data = null;
        if($client == 'admin') {
            $data .= '<div class="page-title">
                        <h2 class="pull-right">
                            <span class="fa fa-arrow-circle-o-left"></span> '.$title.'
                        </h2>
                    </div>';
        }
        
        return $data;
    }

    public function setClassTag($data)
    {
        $this->classTag = $data;
    }

    public function renderHtml()
    {
        global $sysLang;

        $classTagHtml = (isset($this->classTag['html'])) ? ' class="'.$this->classTag['html'].'"' : '';
        $classTagHead = (isset($this->classTag['head'])) ? ' class="'.$this->classTag['head'].'"' : '';
        $classTagBody = (isset($this->classTag['body'])) ? ' class="'.$this->classTag['body'].'"' : '';
        $data = '<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"'.$classTagHtml.' xml:lang="'.$sysLang->getCode().'" lang="'.$sysLang->getCode().'" dir="'.$sysLang->getDirection().'">
    <head'.$classTagHead.'>
        <title>'.$this->title.'</title>
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
        echo json_encode($this->body, JSON_UNESCAPED_UNICODE);
    }
}