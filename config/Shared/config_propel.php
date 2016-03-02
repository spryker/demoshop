<?php

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Propel\PropelConstants;

$currentStore = \Spryker\Shared\Kernel\Store::getInstance()->getStoreName();

$dsn = sprintf('%s:host=%s;port=%d;dbname=%s',
    $config[ApplicationConstants::ZED_DB_ENGINE],
    $config[ApplicationConstants::ZED_DB_HOST],
    $config[ApplicationConstants::ZED_DB_PORT],
    $config[ApplicationConstants::ZED_DB_DATABASE]
);

$connections = [
    'pgsql' => [
        'adapter' => PropelConstants::ZED_DB_ENGINE_PGSQL_VALUE,
        'dsn' => $dsn,
        'user' => $config[ApplicationConstants::ZED_DB_USERNAME],
        'password' => $config[ApplicationConstants::ZED_DB_PASSWORD],
        'settings' => [],
    ],
    'mysql' => [
        'adapter' => PropelConstants::ZED_DB_ENGINE_MYSQL_VALUE,
        'dsn' => $dsn,
        'user' => $config[ApplicationConstants::ZED_DB_USERNAME],
        'password' => $config[ApplicationConstants::ZED_DB_PASSWORD],
        'settings' => [
            'charset' => 'utf8',
            'queries' => [
                'utf8' => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci',
            ],
        ],
    ],
];

$config[ApplicationConstants::PROPEL] = [
    'database' => [
        'connections' => [],
    ],
    'runtime' => [
        'defaultConnection' => 'default',
        'connections' => ['default', 'zed'],
    ],
    'generator' => [
        'defaultConnection' => 'default',
        'connections' => ['default', 'zed'],
        'objectModel' => [
            'defaultKeyType' => 'fieldName',
            'builders' => [
                'object' => '\Spryker\Zed\Propel\Business\Builder\ObjectBuilder',
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
];

$engine = $config[ApplicationConstants::ZED_DB_ENGINE];
$config[ApplicationConstants::PROPEL]['database']['connections']['default'] = $connections[$engine];
