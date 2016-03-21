<?php
/**
 * @package    system cart
 *             libraries/platform/registry.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformRegistry
{
	/**
	 * Registry Object Data
	 *
	 * @var    object
	 */
	protected $data;

	/**
	 * load object stdClass.
	 *
	 * @param   mixed    $data       An object of data to load object.
	 *
	 * @return  void
	 */
	public function loadObject($data)
	{
		// Instantiate the internal data object.
		$this->data = new \stdClass;

		foreach ($data as $key => $value) {
			$this->data->$key = $value;
		}

		return $this->data;
	}

	/**
	 * get field object stdClass.
	 *
	 * @param   mixed    $field      An object of data to load object.
	 * @param   mixed    $default    default value
	 *
	 * @return  mixed field
	 */
	public function get($field = NULL, $default = NULL)
	{
		return ($this->data->$field) ? $this->data->$field : $default;
	}

	/*
	 * get data object value
	 *
	 * @return	mixed field data object
	 * */
	public function getObject()
	{
		return $this->data;
	}
}
?>