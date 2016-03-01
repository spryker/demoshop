<?php

use Spryker\Shared\Application\ApplicationConstants;

$currentStore = \Spryker\Shared\Kernel\Store::getInstance()->getStoreName();

$dsn = sprintf('%s:host=%s;port=%d;dbname=%s',
    $config[ApplicationConstants::ZED_DB_ENGINE],
    $config[ApplicationConstants::ZED_DB_HOST],
    $config[ApplicationConstants::ZED_DB_PORT],
    $config[ApplicationConstants::ZED_DB_DATABASE]
);

$config[ApplicationConstants::PROPEL] = array_merge($config[ApplicationConstants::PROPEL], [
    'database' => [
        'connections' => [
            'default_pgsql' => [
                'adapter' => $config[ApplicationConstants::ZED_DB_ENGINE_PGSQL],
                'dsn' => $dsn, //'pgsql:host=127.0.0.1;dbname=DE_development_zed',
                'user' => $config[ApplicationConstants::ZED_DB_USERNAME],
                'password' => $config[ApplicationConstants::ZED_DB_PASSWORD],
                'settings' => [],
            ],
            'default_mysql' => [
                'adapter' => $config[ApplicationConstants::ZED_DB_ENGINE_MYSQL],
                'dsn' => $dsn, //'mysql:host=127.0.0.1;dbname=DE_development_zed',
                'user' => $config[ApplicationConstants::ZED_DB_USERNAME],
                'password' => $config[ApplicationConstants::ZED_DB_PASSWORD],
                'settings' => [
                    'charset' => 'utf8',
                    'queries' => [
                        'utf8' => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci',
                    ],
                ],
            ],
        ],
    ],
    'paths' => [
        'phpDir' => APPLICATION_ROOT_DIR,
        'sqlDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Sql',
        'migrationDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Migration_' . $config[ApplicationConstants::ZED_DB_ENGINE],
        'schemaDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Schema',
        'phpConfDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Config',
    ],
]);

$config[ApplicationConstants::PROPEL]['database']['connections']['default'] =
    $config[ApplicationConstants::PROPEL]['database']['connections']['default_' . $config[ApplicationConstants::ZED_DB_ENGINE]];
