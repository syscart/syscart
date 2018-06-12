<?php
/**
 * @package    syscart
 *             console/controller/controller.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

abstract class consoleController extends platformController
{
    abstract function index();
}