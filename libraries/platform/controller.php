<?php
/**
 * @package    shopiros
 *             libraries/platform/controller.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class platformController
{
    public function setFlash($message, $type = 'success', $icon = null, $client = 'admin')
    {
        global $sysSession;

        $data = ['site', 'admin', 'exchange', 'webservice', 'other'];
        if(in_array($client, $data)) {
            $index = ($sysSession->flash) ? utilityArray::maxValueInArray($sysSession->flash, 'index')+1 : 1;
            $data = array(
                'index' => $index,
                'message' => $message,
                'type' => $type,
                'icon' => $icon,
                'client' => $client
            );
            $flash = (array)$sysSession->flash;
            $flash[] = $data;

            $sysSession->flash = $flash;
        }
    }

    public function getFlashes()
    {
        global $sysSession;

        $flash = (array)$sysSession->flash;
        return $flash;
    }

    public function deleteFlash($index = null)
    {
        global $sysSession;

        if($index) {
            $flashes = $this->getFlashes();
            foreach( $flashes as $item => $flash ) {
                if($flash['index'] == $index) {
                    unset( $flashes[$item] );
                }
            }
            $sysSession->flash = $flashes;
        } else
            unset($sysSession->flash);
    }
}