<?php
/**
 * @package    syscart
 *             libraries/html/css.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class htmlStylesheet
{
    private $headers = [];
    private $footers = [];

    public function setHeader($data)
    {
        $rel = (isset($data['rel'])) ? $data['rel'] : 'stylesheet';
        $type = (isset($data['type'])) ? $data['type'] : 'text/css';

        $this->headers[] = [
            'rel' => $rel,
            'href' => $data['href'],
            'type' => $type
        ];
    }

    public function setFooters($data)
    {
        $rel = (isset($data['rel'])) ? $data['rel'] : 'stylesheet';
        $type = (isset($data['type'])) ? $data['type'] : 'text/css';

        $this->footers[] = [
            'rel' => $rel,
            'href' => $data['href'],
            'type' => $type
        ];
    }

    public function renderHeader()
    {
        $data = '';
        foreach($this->headers as $value) {
            $data .= '<link rel="'.$value['rel'].'" href="'.$value['href'].'" type="'.$value['type'].'" />
        ';
        }

        return $data;
    }

    public function renderFooter()
    {
        $data = '';
        foreach($this->footers as $value) {
            $data .= '<link rel="'.$value['rel'].'" href="'.$value['href'].'" type="'.$value['type'].'" />
        ';
        }

        return $data;
    }
}
?>