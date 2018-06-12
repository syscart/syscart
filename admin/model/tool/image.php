<?php
/**
 * @package    syscart
 *             admin/model/tool/image.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class adminModelToolImage
{
    public function resize($filename, $width, $height) {
        global $sysConfig;
        
        if (!is_file(UPLOAD_DIR . $filename))
            return;
        
        $extension = pathinfo($filename, PATHINFO_EXTENSION);
        
        $old_image = $filename;
        $new_image = 'cache' . DS . utf8_substr($filename, 0, utf8_strrpos($filename, '.')) . '-' . $width . 'x' . $height . '.' . $extension;
        
        if (!is_file(UPLOAD_DIR . $new_image) || (filectime(UPLOAD_DIR . $old_image) > filectime(UPLOAD_DIR . $new_image))) {
            $path = '';
            
            $directories = explode(DS, dirname(str_replace('../', '', $new_image)));
            
            foreach ($directories as $directory) {
                $path = $path . DS . $directory;
                
                if (!is_dir(UPLOAD_DIR . $path))
                    @mkdir(UPLOAD_DIR . $path, 0777);
            }
            
            list($width_orig, $height_orig) = getimagesize(UPLOAD_DIR . $old_image);
            
            if($width_orig != $width || $height_orig != $height) {
                $image = new Image(UPLOAD_DIR . $old_image);
                $image->resize($width, $height);
                $image->save(UPLOAD_DIR . $new_image);
            } else
                copy(UPLOAD_DIR . $old_image, UPLOAD_DIR . $new_image);
        }
        
        return $sysConfig->get('url').'media/upload/'.$new_image;
    }
}