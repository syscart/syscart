<?php
/**
 * @package    syscart
 *             libraries/platform/query.php
 *
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