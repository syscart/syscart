<?php
/**
 * @package    syscart
 *             libraries/platform/registry.php
 *
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
		if(isset($this->data->$field))
			return $this->data->$field;
		
		return $default;
	}
	
	public function set($field, $value = null)
	{
		$this->data->$field = $value;
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