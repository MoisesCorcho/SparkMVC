<?php

namespace App\Config;

/**
 * Application Configuration
 * 
 * PHP version 8.1.6
 */
class Config
{
    /**
     * Database host
     * @var string
     */
    const DB_HOST = 'localhost'; 

    /**
     * Database user
     * @var string
     */
    const DB_USER = 'root';

    /**
     * Database password
     * @var string
     */
    const DB_PASS = '';

    /**
     * Database name
     * @var string
     */
    const DB_NAME = 'sparkmvc';

    /**
     * Project root
     * @var string
     */
    const URLROOT = 'http://localhost/proyectos/Moises/Php/sparkMVC';

    /**
     * Project name
     * @var string
     */
    const SITENAME = 'SparkMVC';

    /**
     * Project path
     * @var string
     */
    private static $APPROOT = null;

    /**
     * Get the app route.
     * It must be configured this way, because the functions do not work 
     * at compilation time.
     *
     * @return string
     */
    public static function getAppRoot()
    {
        if (self::$APPROOT === null) {
            self::$APPROOT = dirname(dirname(__FILE__));
        }
        return self::$APPROOT;
    }

    /**
     * Show or hide error messages on screen
     * @var boolean
     */
    const SHOW_ERRORS = true;

    /**
     * Project Timezone
     * @var string
     */
    const TIMEZONE = 'America/Bogota';
}