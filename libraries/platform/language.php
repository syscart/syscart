<?php
/**
 * @package    system cart
 *             libraries/platform/language.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformLanguage
{
	private $language = 'persian';
	private $code = 'fa-IR';
	private $direction = 'rtl';

	public function set($language = 'persian', $code = 'fa-IR', $direction = 'rtl')
	{
		$this->language = $language;
		$this->code = $code;
		$this->direction = $direction;
	}

	public function getLanguage()
	{
		return $this->language;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getDirection()
	{
		return $this->direction;
	}
}
?>