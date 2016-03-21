<?php
/**
 * @package    system cart
 *             libraries/platform/query.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformQuery
{
    /**
     * @param $query
     *
     * @return mixed
     */
    public static function refactor($query)
    {
        $config = \factory::getConfig();

        $query = str_replace('#__', $config->get('db_prefix'), $query);

        return $query;
    }
}
?>