<?php
/**
 * @package    syscart
 *             libraries/html/script.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class htmlScript
{
    private $headers = [];
    private $footers = [];

    public function setHeader($data)
    {
        if(is_array($data)) {
            $src = ( isset( $data[ 'src' ] ) ) ? $data[ 'src' ] : null;
            $async = ( isset( $data[ 'async' ] ) ) ? $data[ 'async' ] : false;
            $class = ( isset( $data[ 'class' ] ) ) ? $data[ 'class' ] : null;
        } else {
            $src = $data;
            $async = false;
            $class = null;
        }
        
        if($src) {
            foreach( $this->headers as $item => $value ) {
                if($value['src'] == $src)
                    return;
            }
            
            $this->headers[] = [
                'src' => $src,
                'async' => $async,
                'class' => $class
            ];
        }
    }

    public function setFooter($data)
    {
        if(is_array($data)) {
            $src = ( isset( $data[ 'src' ] ) ) ? $data[ 'src' ] : null;
            $async = ( isset( $data[ 'async' ] ) ) ? $data[ 'async' ] : false;
            $class = ( isset( $data[ 'class' ] ) ) ? $data[ 'class' ] : null;
        } else {
            $src = $data;
            $async = false;
            $class = null;
        }
    
        if($src) {
            foreach( $this->footers as $item => $value ) {
                if($value['src'] == $src)
                    return;
            }
        
            $this->footers[] = [
                'src' => $src,
                'async' => $async,
                'class' => $class
            ];
        }
    }

    public function renderHeader()
    {
        $data = '';
        foreach($this->headers as $value) {
            $async = ($value['async']) ? ' async' : '';
            $class = ($value['class']) ? ' class="'.$value['class'].'"' : '';
            $data .= '<script type="text/javascript" src="'.$value['src'].'"'.$async.$class.'></script>
        ';
        }

        return $data;
    }

    public function renderFooter()
    {
        $data = '';
        foreach($this->footers as $value) {
            $async = ($value['async']) ? ' async' : '';
            $class = ($value['class']) ? ' class="'.$value['class'].'"' : '';
            $data .= '<script type="text/javascript" src="'.$value['src'].'"'.$async.$class.'></script>
        ';
        }

        return $data;
    }
}

?>