<?php

/**
 * Environment variables
 * In production make a copy of this file to ".env.php".
 * For other environments, change 'empty' in this filename to the env name.
 *
 * http://laravel.com/docs/configuration#protecting-sensitive-configuration
 */
return array(

    /**
     * Environment
     */
    'APP_ENV' => 'production',

    /**
     * Encryption Key
     */
    'APP_KEY' => 'YourSecretKey!!!',

    /**
     * Analytics
     */
    'ANALYTICS_ID'     => '',
    'ANALYTICS_DOMAIN' => '',

    /**
     * Database
     */
    'DB_HOST'     => '',
    'DB_DATABASE' => '',
    'DB_USERNAME' => '',
    'DB_PASSWORD' => '',

    /**
     * MAIL
     */
    'MANDRILL_SECRET' => '',

);
