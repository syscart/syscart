<?php
/**
 * @package    system cart
 *             libraries/factory.php
 *
 * @copyright  Copyright (C) 2016 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 * @company    syscart
 * @autor      majeed mohammadian
 */

defined('syscart') or die('access denied...!');

abstract class factory
{
    /**
     * Global configuraiton object
     *
     * @var    config
     */
    public static $config = null;

    /**
     * Global event object
     *
     * @var    event
     */
    public static $event = null;

    /**
     * Global database object
     *
     * @var    DatabaseDriver
     */
    public static $database = null;

    /**
     * Global dbDriver object
     *
     * @var    dbDriverDriver
     */
    public static $dbDriver = null;

    /**
     * Global session object
     *
     * @var    session object
     */
    public static $session = null;

    /**
     * Global user object
     *
     * @var    user object
     */
    public static $user = null;

    /**
     * Global language object
     *
     * @var    language object
     */
    public static $language = null;

    /**
     * Global document object
     *
     * @var    document object
     */
    public static $document = null;

    /**
     * Get a configuration object
     *
     * @param   string  $file       The path to the configuration file
     * @param   string  $namespace  The namespace of the configuration file
     *
     * @return  Registry
     */
    public static function getConfig($file = null, $namespace = '')
    {
        if (!self::$config)
        {
            if ($file === null)
                $file = PATH_PLATFORM . '/config.php';

            self::$config = self::createConfig($file, $namespace);
        }

        return self::$config;
    }

    /**
     * Create a configuration object
     *
     * @param   string  $file       The path to the configuration file.
     * @param   string  $namespace  The namespace of the configuration file.
     *
     * @return  registry
     */
    protected static function createConfig($file, $namespace = '')
    {
        if (is_file($file))
            loadFile($file);
        else
            echo 'file not found.';

        $registry = new platformRegistry();

        // Sanitize the namespace.
        $namespace = ucfirst((string) preg_replace('/[^A-Z_]/i', '', $namespace));

        // Build the config name.
        $name = 'syscartConfig' . $namespace;

        // Handle the PHP configuration type.
        if (class_exists($name))
        {
            // Create the kakshidiConfig object
            $config = new $name;

            // Load the configuration values into the registry
            $registry->loadObject($config);
        }

        return $registry;
    }

    /**
     * Get a event object.
     *
     * @return  eventManager
     *
     * @see     eventManager
     */
    public static function getEvent()
    {
        if (!self::$event)
            self::$event = new platformEvent();

        return self::$event;
    }

    /**
     * Get a database object.
     *
     * @return  databaseDriver
     *
     * @see     databaseDriver
     */
    public static function getDbo()
    {
        if (!self::$database)
            self::$database = self::createDbo();

        return self::$database;
    }

    /**
     * Create an database object
     *
     * @return  databaseDriver
     */
    protected static function createDbo()
    {
        return platformDb::connect();
    }

    /**
     * Get an dbDriver object.
     *
     * @return  dbDriver object
     */
    public static function getDbDriver()
    {
        if (!self::$dbDriver)
            self::$dbDriver = new platformDbDriver();

        return self::$dbDriver;
    }

    /**
     * Get a session object.
     *
     * @param   array  $options  An array containing session options
     *
     * @return  session object
     */
    public static function getSession(array $options = array())
    {
        if (!self::$session)
            self::$session = self::createSession($options);

        return self::$session;
    }

    /**
     * Create a session object
     *
     * @param   array  $options  An array containing session options
     *
     * @return  session object
     */
    protected static function createSession(array $options = array())
    {
        $conf = self::getConfig();

        // Config time is in minutes
        $options['expire'] = ($conf->get('lifetime')) ? $conf->get('lifetime') * 60 : 900;

        $session = new platformSession();
        $session->getInstance($options);

        return $session;
    }

    /**
     * Get an user object.
     *
     * @return  user object
     */
    public static function getUser()
    {
        if (!self::$user)
            self::$user = new platformUser();

        return self::$user;
    }

    /**
     * Get an language object.
     *
     * @return  language object
     */
    public static function getLanguage()
    {
        if (!self::$language)
            self::$language = new platformLanguage();

        return self::$language;
    }

    /**
     * Get an document object.
     *
     * @return  document object
     */
    public static function getDocument()
    {
        if (!self::$document)
            self::$document = new htmlDocument();

        return self::$document;
    }
}