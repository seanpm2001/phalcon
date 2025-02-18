<?php

/**
 * This file is part of the Phalcon Framework.
 *
 * (c) Phalcon Team <team@phalcon.io>
 *
 * For the full copyright and license information, please view the LICENSE.txt
 * file that was distributed with this source code.
 */

declare(strict_types=1);

/*******************************************************************************
 * Load settings and setup
 *******************************************************************************/
/**
 * Converts ENV variables to defined for tests to work
 */
if (!function_exists('loadDefined')) {
    function loadDefined()
    {
        defineFromEnv('DATA_MYSQL_CHARSET');
        defineFromEnv('DATA_MYSQL_HOST');
        defineFromEnv('DATA_MYSQL_NAME');
        defineFromEnv('DATA_MYSQL_PASS');
        defineFromEnv('DATA_MYSQL_PORT');
        defineFromEnv('DATA_MYSQL_USER');

        if (!defined('PATH_DATA')) {
            define('PATH_DATA', dataDir());
        }

        if (!defined('PATH_OUTPUT')) {
            define('PATH_OUTPUT', outputDir());
        }
    }
}

/**
 * Ensures that certain folders are always ready for us.
 */
if (!function_exists('loadFolders')) {
    function loadFolders()
    {
        $folders = [
            'coverage',
            'tests' . DIRECTORY_SEPARATOR . 'annotations',
            'tests' . DIRECTORY_SEPARATOR . 'assets',
            'tests' . DIRECTORY_SEPARATOR . 'cache',
            'tests' . DIRECTORY_SEPARATOR . 'cache/models',
            'tests' . DIRECTORY_SEPARATOR . 'image',
            'tests' . DIRECTORY_SEPARATOR . 'image/gd',
            'tests' . DIRECTORY_SEPARATOR . 'image/imagick',
            'tests' . DIRECTORY_SEPARATOR . 'logs',
            'tests' . DIRECTORY_SEPARATOR . 'session',
            'tests' . DIRECTORY_SEPARATOR . 'stream',
        ];

        foreach ($folders as $folder) {
            $item = outputDir($folder);

            if (true !== file_exists($item)) {
                mkdir($item, 0777, true);
            }
        }
    }
}

/**
 * Initialize ini values and xdebug if it is loaded
 */
if (!function_exists('loadIni')) {
    function loadIni()
    {
        error_reporting(-1);

        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');

        setlocale(LC_ALL, 'en_US.utf-8');

        date_default_timezone_set('UTC');

        if (function_exists('mb_internal_encoding')) {
            mb_internal_encoding('utf-8');
        }

        if (function_exists('mb_substitute_character')) {
            mb_substitute_character('none');
        }

        clearstatcache();

        if (extension_loaded('xdebug')) {
            ini_set('xdebug.cli_color', '1');
            ini_set('xdebug.dump_globals', 'On');
            ini_set('xdebug.show_local_vars', 'On');
            ini_set('xdebug.max_nesting_level', '100');
            ini_set('xdebug.var_display_max_depth', '4');
        }
    }
}

/*******************************************************************************
 * Directories
 *******************************************************************************/
/**
 * Returns the root dir
 */
if (!function_exists('rootDir')) {
    function rootDir(string $fileName = ''): string
    {
        return dirname(dirname(dirname(__FILE__))) . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/**
 * Returns the cache folder
 */
if (!function_exists('cacheDir')) {
    function cacheDir(string $fileName = ''): string
    {
        return outputDir()
            . 'tests' . DIRECTORY_SEPARATOR
            . 'cache' . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/**
 * Returns the output folder
 */
if (!function_exists('dataDir')) {
    function dataDir(string $fileName = ''): string
    {
        return rootDir()
            . 'tests' . DIRECTORY_SEPARATOR
            . '_data' . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/**
 * Returns the output folder
 */
if (!function_exists('logsDir')) {
    function logsDir(string $fileName = ''): string
    {
        return outputDir()
            . 'tests' . DIRECTORY_SEPARATOR
            . 'logs' . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/**
 * Returns the output folder
 */
if (!function_exists('cacheModelsDir')) {
    function cacheModelsDir(string $fileName = ''): string
    {
        return outputDir()
            . 'tests' . DIRECTORY_SEPARATOR
            . 'cache' . DIRECTORY_SEPARATOR
            . 'models' . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/**
 * Returns the output folder
 */
if (!function_exists('outputDir')) {
    function outputDir(string $fileName = ''): string
    {
        return rootDir()
            . 'tests' . DIRECTORY_SEPARATOR
            . '_output' . DIRECTORY_SEPARATOR
            . $fileName;
    }
}

/*******************************************************************************
 * Utility
 *******************************************************************************/
if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        if (defined($key)) {
            return constant($key);
        }

        if (getenv($key) !== false) {
            return getenv($key);
        }

        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('defineFromEnv')) {
    function defineFromEnv(string $name)
    {
        if (defined($name)) {
            return;
        }

        define(
            $name,
            env($name)
        );
    }
}

/*******************************************************************************
 * Options
 *******************************************************************************/
if (!function_exists('getOptionsModelCacheStream')) {
    /**
     * Get Model cache options - Stream
     */
    function getOptionsModelCacheStream(): array
    {
        if (!is_dir(cacheDir('models'))) {
            mkdir(
                cacheDir('models')
            );
        }

        return [
            'lifetime'   => 3600,
            'storageDir' => cacheModelsDir(),
        ];
    }
}

if (!function_exists('getOptionsLibmemcached')) {
    function getOptionsLibmemcached(): array
    {
        return [
            'client'  => [],
            'servers' => [
                [
                    'host'   => env('DATA_MEMCACHED_HOST', '127.0.0.1'),
                    'port'   => env('DATA_MEMCACHED_PORT', 11211),
                    'weight' => env('DATA_MEMCACHED_WEIGHT', 0),
                ],
            ],
        ];
    }
}

if (!function_exists('getOptionsMysql')) {
    /**
     * Get mysql db options
     */
    function getOptionsMysql(): array
    {
        return [
            'host'     => env('DATA_MYSQL_HOST'),
            'username' => env('DATA_MYSQL_USER'),
            'password' => env('DATA_MYSQL_PASS'),
            'dbname'   => env('DATA_MYSQL_NAME'),
            'port'     => env('DATA_MYSQL_PORT'),
            'charset'  => env('DATA_MYSQL_CHARSET'),
        ];
    }
}

if (!function_exists('getOptionsPostgresql')) {
    /**
     * Get postgresql db options
     */
    function getOptionsPostgresql(): array
    {
        return [
            'host'     => env('DATA_POSTGRES_HOST'),
            'username' => env('DATA_POSTGRES_USER'),
            'password' => env('DATA_POSTGRES_PASS'),
            'port'     => env('DATA_POSTGRES_PORT'),
            'dbname'   => env('DATA_POSTGRES_NAME'),
            'schema'   => env('DATA_POSTGRES_SCHEMA'),
        ];
    }
}

if (!function_exists('getOptionsRedis')) {
    function getOptionsRedis(): array
    {
        return [
            'host'  => env('DATA_REDIS_HOST'),
            'port'  => env('DATA_REDIS_PORT'),
            'index' => env('DATA_REDIS_NAME'),
        ];
    }
}

if (!function_exists('getOptionsRedisCluster')) {
    function getOptionsRedisCluster(): array
    {
        return [
            'hosts' => explode(',', env('DATA_REDIS_CLUSTER_HOSTS')),
            'auth' => env('DATA_REDIS_CLUSTER_AUTH')
        ];
    }
}

if (!function_exists('getOptionsSessionStream')) {
    /**
     * Get Session Stream options
     */
    function getOptionsSessionStream(): array
    {
        if (!is_dir(cacheDir('sessions'))) {
            mkdir(cacheDir('sessions'));
        }

        return [
            'savePath' => cacheDir('sessions'),
        ];
    }
}

if (!function_exists('getOptionsSqlite')) {
    /**
     * Get sqlite db options
     */
    function getOptionsSqlite(): array
    {
        return [
            'dbname' => rootDir(env('DATA_SQLITE_NAME')),
        ];
    }
}
