<?php
/**
 * @package    shopiros
 *             admin/controller/common/fileManager.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminControllerCommonFileManager extends adminController
{
    public function index()
    {
        global $client, $sysConfig, $sysDoc;

        $filter_name = platformRequest::getVar('filter_name', 'GET', null);
        $directory = platformRequest::getVar('directory', 'GET', null);
        $page = platformRequest::getVar('page', 'GET', null);
        $target = platformRequest::getVar('target', 'GET', null);
        $thumb = platformRequest::getVar('thumb', 'GET', null);

        $filter_name = (isset($filter_name)) ? rtrim(str_replace(['../', '..\\', '..', '*'], '', $filter_name), '/') : null;
        $directory = (isset($directory)) ? rtrim(UPLOAD_DIR.str_replace(['../', '..\\', '..'], '', $directory), '/') : UPLOAD_DIR;
        $page = (isset($page)) ? $page : 1;
        
        $data['images'] = [];
        
        $toolImageObject = loaderModule('tool'.DS.'image', $client);
        
        // Get directories
        $directories = glob($directory . '/' . $filter_name . '*', GLOB_ONLYDIR);
        if(!$directories)
            $directories = [];
        
        // Get files
        $files = glob($directory . '/' . $filter_name . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);
        if(!$files)
            $files = [];
        
        // Merge directories and files
        $images = array_merge($directories, $files);
        
        // Get total number of files and directories
        $image_total = count($images);
        
        // Split the array based on current page number and max number of items per page of 10
        $images = array_splice($images, ($page - 1) * 16, 16);
        
        foreach ($images as $image) {
            $name = str_split(basename($image), 14);

            if (is_dir($image)) {
                $url = '';

                if (isset($target))
                    $url .= '&target=' . $target;

                if (isset($thumb))
                    $url .= '&thumb=' . $thumb;

                $data['images'][] = [
                    'thumb' => '',
                    'name'  => implode(' ', $name),
                    'type'  => 'directory',
                    'path'  => utf8_substr($image, utf8_strlen(UPLOAD_DIR)),
                    'href'  => $sysConfig->get('url').'admin/common/fileManager&directory=' . urlencode(utf8_substr($image, utf8_strlen(UPLOAD_DIR))) . $url
                ];
            } elseif (is_file($image)) {
                $data['images'][] = [
                    'thumb' => $toolImageObject->resize(utf8_substr($image, utf8_strlen(UPLOAD_DIR)), 100, 100),
                    'name'  => implode(' ', $name),
                    'type'  => 'image',
                    'path'  => utf8_substr($image, utf8_strlen(UPLOAD_DIR)),
                    'href'  => $sysConfig->get('url').'media/upload/'.utf8_substr($image, utf8_strlen(UPLOAD_DIR))
                ];
            }
        }

        $sysDoc->setBody($data);
        $sysDoc->renderJson();
    }
}