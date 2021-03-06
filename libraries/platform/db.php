<?php
/**
 * @package    syscart
 *             libraries/platform/db.php
 *
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

class platformDb
{
    /**
     * @return null|PDO
     */
    public static function connect()
    {
        $config = factory::getConfig();

        $db = NULL;
        try {
            factory::getEvent()->listen('onAfterConnectDatabase');

            $dsn = 'mysql:host='.$config->get('host', 'localhost').';';
            $dsn .= 'dbname='.$config->get('db').';';
            $dsn .= 'port='.$config->get('db_port', '3306');

            $db = new PDO($dsn,
                $config->get('db_user', 'root'),
                $config->get('db_pass', ''),
                array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8" )
            );

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            factory::getEvent()->listen('onBeforeConnectDatabase');
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        return $db;
    }
}

?>