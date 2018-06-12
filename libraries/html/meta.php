<?php
/**
 * @package    syscart
 *             libraries/html/meta.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class htmlMeta
{
    private $meta = [];

    public function set($data)
    {
        $this->meta[] = $data;
    }

    public function get()
    {
        return $this->meta;
    }

    public function render()
    {
        $data = '';
        foreach($this->meta as $tag => $opteion) {
            $data .= '<meta ';
            foreach($opteion as $key => $value) {
                $data .= $key.'="'.$value.'" ';
            }
            $data .= '/>
        ';
        }

        return $data;
    }
}

?>