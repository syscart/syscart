<?php
/**
 * @package    syscart
 *             admin/controller/controller.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

abstract class adminController extends platformController
{
    abstract function index();
}