<?php
/**
 * @package    shopiros
 *             admin/libraries/tools/sortList.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    rayanehesab
 * @autor      majeed mohammadian
 */

defined('shopiros') or die('access denied...!');

class adminLibraryToolsSortList
{
    private $oldList = array();
    private $newList = array();
    private $countList = 0;

    public function render($items = array(), $type = 'subMenu', $parent = 0)
    {
        $parent = ($parent == null)? 0 : $parent;
        $this->oldList = $items;
        adminLibraryToolsSortList::sortList($parent);
        $listSendParent = array();
        for($i=0, $j=0 ; $i<count($this->newList) ; $i++)
            if($this->newList[$i]['parent'] == $parent)
            {
                $listSendParent[$j] = $this->newList[$i];
                $j++;
            }
        adminLibraryToolsSortList::changeLevel($listSendParent);
        for($k=0 ; $k<count($this->newList) ; $k++)
            $this->newList[$k]['name'] = ''.adminLibraryToolsSortList::showLevel($type, $this->newList[$k]['level']).$this->newList[$k]['name'];
        return $this->newList;
    }

    public function sortList($parent)
    {
        for($i=0 ; $i<count($this->oldList) ; $i++)
            if($this->oldList[$i]['parent'] == $parent)
            {
                $this->newList[$this->countList] = $this->oldList[$i];
                $this->countList++;
                adminLibraryToolsSortList::sortList($this->oldList[$i]['id']);
            }
    }

    public function changeLevel($list = array(), $level = 0)
    {
        for($i=0 ; $i<count($list) ; $i++)
        {
            for($m=0 ; $m<count($this->newList) ; $m++)
                if($list[$i]['id'] == $this->newList[$m]['id'])
                    $this->newList[$m]['level'] = $level;
            $listChild = array();
            $k = 0;
            for($j=0 ; $j<count($this->newList) ; $j++)
                if($list[$i]['id'] == $this->newList[$j]['parent'])
                {
                    $listChild[$k] = $this->newList[$j];
                    $k++;
                }
            if($listChild)
                adminLibraryToolsSortList::changeLevel($listChild, $level+1);
        }
    }

    public function showLevel($type, $level)
    {
        $img = '<img src="media/img/category.png"/>';
        $data = '';
        switch($type)
        {
            case 'subMenu':
            {
                $space = '';
                for($i=0 ; $i<$level ; $i++)
                    $space .= '  ';
                if($level != 0)
                    $data .= $space.$img.' ';
                break;
            }
            case 'dash':
            {
                $space = '';
                for($i=0 ; $i<$level ; $i++)
                    $space .= ' -';
                if($level != 0)
                    $data .= $space.' ';
                break;
            }
        }
        return $data;
    }
}