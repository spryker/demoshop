<?php
use ProjectA\Shared\System\SystemConfig;

/**
 * This is the global runtime configuration for Yves and Zed.
 *
 * The configuration is created from:
 * (1) config_default
 * (2) config_default-[ENVIRONMENT]
 * (3) config_local
 * (4) config_local_[STORENAME]
 *
 * To overwrite these entries you need to create your own config files (which are on svn:ignore):
 * - config_local.php for configuration that apply for the whole system (e.g. Connection to Solr)
 * - config_local_[STORENAME].php for configuration for each store (e.g. Connection to MySQL)
 *
 */

/**
 * Global timezone used to for underlying data, timezones for presentation layer can be changed in stores configuration
 */
$config[\ProjectA\Shared\System\SystemConfig::PROJECT_TIMEZONE] = 'UTC';


$config[SystemConfig::ZED_MYSQL] = [
    SystemConfig::ZED_MYSQL__USERNAME => '',
    SystemConfig::ZED_MYSQL__PASSWORD => '',
    SystemConfig::ZED_MYSQL__DATABASE => '',
    SystemConfig::ZED_MYSQL__HOST => 'localhost',
    SystemConfig::ZED_MYSQL__PORT => 3306,
];

$config[SystemConfig::PROJECT_NAMESPACE] = 'Pyz';

$config[SystemConfig::REDIS_PARAMETER] = [
    SystemConfig::REDIS_PARAMETER__SCHEME => 'tcp',
    SystemConfig::REDIS_PARAMETER__HOST => '580a3b7944a84d53be497c5a5189affc.publb.rackspaceclouddb.com',
    SystemConfig::REDIS_PARAMETER__PORT => '41219',
    SystemConfig::REDIS_PARAMETER__PASSWORD => 'qYvshA7fz2jvXMyXU6u2d7GwWhEt4jd6DEkg'
];

/*
 * Select which code generators you want to be runnning on create factories
 *
 * zed:
 *      Pal_CodeGenerator_Zed_Factories
 *      Pal_CodeGenerator_Zed_DependencyInjection_Repository
 *      Pal_CodeGenerator_Zed_DependencyInjection_Container
 * yves:
 *      Pal_CodeGenerator_Yves_Factories
 *      Pal_CodeGenerator_Yves_ZedRequest
 * transfer:
 *      Pal_CodeGenerator_Transfer_Factory
 */
$config['code_generators'] = [
    'transfer',
    'zed',
    'yves'
];

$config['search'] = [
    'number_of_facets' => 6
];

$config['db_dump'] = array(
    'username' => '',
    'password' => '',
    'database' => '',
    'host' => 'localhost',
    'mysqldump_bin' => '/usr/bin/mysqldump',
    'mysql_bin' => '/usr/bin/mysql',
);

/**
 * Connection to Storages
 *  - Key Value Storages
 *  - Solr
 *  - Couchbase
 *  - ...
 *
 *
 */
$config['storage'] = [
    'kv' => [
        //define the current used source and provide a setup
        'source' => 'mysql',
        'couchbase' => [
            'hosts' => [
                [
                    'host' => '0.0.0.0',
                    'port' => '8091'
                ],
            ],
            'user' => '',
            'password' => '',
            'bucket' => '',
            'timeout' => 100000,
        ],
        'memcached' => [
            'host' => 'localhost',
            'port' => '11211',
            'prefix' => ''
        ],
        'mysql' => [
            'host' => '',
            'user' => '',
            'password' => '',
            'database' => '',
            'port' => '',
            'table' => ''
        ]
    ],
    'solr' => [
        'config_dir' => APPLICATION_ROOT_DIR . '/config/Zed/solr',
        'application_dir' => APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/bin/',
        'data_dir' => APPLICATION_ROOT_DIR . '/data/common/solr',
        // Used for reading
        'defaultEndpointSetup' => [
            'host' => 'localhost',
            'port' => 10007,
            'path' => '/solr'
        ],
        // Used for writing
        'masterEndpointSetup' => [
            'host' => 'localhost',
            'port' => 10007,
            'path' => '/solr'
        ],
        // Used for solr setup, always on localhost
        'localEndpointSetup' => [
            'host' => 'localhost',
            'port' => 10007,
            'path' => '/solr'
        ],
        'endpointGroups' => [
            'stores' => [
                'DE'
            ],
        ],
        //! the defaultEndpointSetup will be merged to each endpoint during runtime
        //  if you you want to change a specific endpoint, change its config here
        'endpoint' => [
            'DE' => [
                'core' => 'DE'
            ],
            'META_DATA' => [
                'core' => 'META_DATA',
            ],
            //necessary to setup cores etc.  - standard solr.xml will point to /cores
            //! solr admin implementation will add /cores so this one needs to be empty
            'ADMIN' => []
        ]
    ]
];

$config['storage']['couchbase'] = [
    'hosts' => [
        [
            'host' => '0.0.0.0',
            'port' => '8091'
        ],
    ],
    'buckets' => [
        'import_product_data' => 'import_product_data',
        'eclass_migration' => 'eclass_migration',
        'catalog' => 'catalog',
    ],
    'user' => '',
    'password' => '',
    'bucket' => '',
    'timeout' => 100000,
];

$config['storage']['elastic'] = [
    'indexes' => [
        'product_category_search' => 'product_category_search'
    ],
    'hosts' => [
        ['host' => '0.0.0.0', 'port' => 9200]
    ],
];

/**
 * Connection to Jenkins
 *
 * GLOBAL
 */
$config['jenkins'] = array(
    'base_url' => 'http://127.0.0.1:8081',
    'notify_email' => '',
    // TODO: change to NEW?  PalShared_Data::getLocalCommonPath('jenkins'),
    'data_dir' => APPLICATION_ROOT_DIR . '/data/jenkins', //PalShared_Data::getLocalCommonPath('jenkins'),
);

/**
 * Hostnames of all applications
 *
 * STORE
 */
$config['host'] = array(
    'yves' => 'http://www-development.project-yz.com',
    'zed_gui' => 'http://zed-development.project-yz.com',
    'zed_api' => 'localhost:10101',

    'static_assets' => '',
    'static_media' => '',
);

$config['host_ssl'] = array(
    'yves' => 'https://www-development.project-yz.com',
    'zed_gui' => 'https://zed-development.project-yz.com',
    'zed_api' => 'localhost:10101',

    'static_assets' => '',
    'static_media' => '',
);

/**
 * Activate logging
 *
 * GLOBAL
 */
$config['log'] = array(
    'logLevel' => Monolog\Logger::INFO,
  //  'log_propel_sql' => true, // File: data/logs/ZED/propel_sql.log
    'log_memcache_synchronize' => false, // File: data/logs/ZED/memcache_synchronize.log
);

$config[SystemConfig::ZED_LOG_PROPEL_SQL] = true;

/**
 * TODO move to Yves config
 */
$config['transfer'] = array(
    'username' => 'yves',
    'password' => 'o7&bg=Fz;nSslHBC',
    'ssl' => false,
    'debug_session_forward_enabled' => false,
    'debug_session_name' => 'XDEBUG_SESSION'
);

/**
 * options for password hashing
 * algorithm needs to be changed if there is a more secure one
 * options can be adjusted if needed
 * see https://github.com/ircmaxell/password_compat for options
 * After changing algorithm or options nothing needs to be done, passwords will rehash on demand
 */
$config[SystemConfig::ZED_LIBRARY_PASSWORD_ALGORITHM] = PASSWORD_BCRYPT;
$config[SystemConfig::ZED_LIBRARY_PASSWORD_OPTIONS] = [];


/**
 * Configuration for Payment
 * Pay Attention to NOT use characters which are
 * not defined in ASCII
 *
 * STORE
 */
$config['payone'] = array(
    'mode' => 'test',
    'mid' => '25735',
    'portalid' => '2018246',
    'key' => 'dFWR8GlNG8aonscn',
    'aid' => '25811',
    'encoding' => 'UTF-8',
    'currency' => 'EUR',
    'gatewayurl' => 'https://api.pay1.de/post-gateway/',
);

// TODO remove - from Migusta
//$config['payone'] = array(
//    'mode'       => 'test',
//    'mid'        => '24047',
//    'portalid'   => '2017184',
//    'key'        => '3AHSu99Q7Bi2H03n',
//    'aid'        => '24058',
//    'encoding'   => 'UTF-8',
//    'currency'   => 'EUR',
//    'gatewayurl' => 'https://api.pay1.de/post-gateway/',
//);

/**
 * @todo REMOVE ME LATER
 */
//
///**
// * Configuration for Payone
// * Pay Attention to NOT use characters which are
// * not defined in ASCII
// *
// * STORE
// */
//$config['adyen_test']['merchant_user'] = 'ws@Company.SaatchiOnline';
//$config['adyen_test']['merchant_password'] = "M>35^t&DZ7IH{as}4xD[*&A%d";
//$config['adyen_test']['merchant_account'] = 'SaatchiOnlineUS';
//$config['adyen_test']['currency'] = 'USD';
//$config['adyen_test']['skin_code'] = 'SbbWtMjR';
//$config['adyen_test']['hmac_shared_secret_key'] = 'skdlfjs7w9sls44da';
//$config['adyen_test']['hpp_url'] = 'https://test.adyen.com/hpp/details.shtml';
//
//$config['adyen']['merchant_user'] = 'ws@Company.SaatchiOnline';
//$config['adyen']['merchant_password'] = "M>35^t&DZ7IH{as}4xD[*&A%d";
//$config['adyen']['merchant_account'] = 'SaatchiOnlineUS';
//$config['adyen']['currency'] = 'USD';
//$config['adyen']['skin_code'] = 'SbbWtMjR';
//$config['adyen']['hmac_shared_secret_key'] = 'skdlfjs7w9sls44da';
//$config['adyen']['hpp_url'] = 'https://test.adyen.com/hpp/details.shtml';
//
//$config['adyen_test']['development']['notification_raw_data_log_url']
//    = 'http://yves.dev.saatchionline.com/data/static/US/payment/notification/';
//
//$config['adyen']['development']['notification_raw_data_log_url']
//    = 'http://yves.dev.saatchionline.com/data/static/US/payment/notification/';
//
//
$config['stripe'] = [
    'currency' => 'EUR',
    'secret_key' => '',
    'publishable_key' => '',
];

$config['stripe_test'] = [
    'currency' => 'EUR',
    'secret_key' => '',
    'publishable_key' => '',
];


$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = null;
$config[SystemConfig::ZED_SESSION_SAVE_PATH] = null;

$config['zed'] = [
    'ssl_enabled' => true,
    'ssl_excluded' => [
        'system/heartbeat',
    ],
];

$config['yves'] = [
    'theme' => 'demoshop',
    'trusted_proxies' => [],
    'ssl_enabled' => false,
    'complete_ssl_enabled' => false,
    'ssl_excluded' => [
        '/monitoring/heartbeat',
    ],
    'session' => [
        'save_handler' => null,
        'save_path' => null,
        'name' => null,
        'cookie_domain' => null,
    ],
];

$config['kibana'] = [
    'base_url' => '',
];

/**
 * @todo REMOVE ME
 */
//$config['ftp_proxy'] = array(
//    'lftp_binary' => '/usr/bin/lftp',
//);

//$config['activemq'] = array(
//    array(
//        'host' => 'localhost',
//        'port' => '61613',
//    ),
//    array(
//        'host' => 'localhost',
//        'port' => '61613',
//    ),
//);

$config['lumberjack'] = [
    'enabled' => false,
    'url' => '/lumberjack/elastic-search-proxy/',
    'mapping' => 'mapping',
    'search' => 'search',
    'proxy' => true,
    'elasticsearch' => [
        'host' => '',
        'port' => '9200',
        'protocol' => 'http',
        'index' => 'lumberjack',
        'type' => '',
    ],
    'gui' => [
        'requireJs' => APPLICATION_VENDOR_DIR . '/project-a/lumberjack-package/src/ProjectA/Zed/Lumberjack/Module/View/gui/dist/require.js',
        'lumberjackMinJs' => APPLICATION_VENDOR_DIR . '/project-a/lumberjack-package/src/ProjectA/Zed/Lumberjack/Module/View/gui/dist/lumberjack-min.js',
    ],
    // key name => length of sanitized string
    'keys_to_sanitize' => [
        'cc_cardholder' => 5,
        'cc_number' => 8,
        'cc_expiration_month' => 2,
        'cc_expiration_year' => 4,
        'cc_verification' => 3,
        'cvc' => 3,
        'password' => 5,
        'pdf' => 5,
    ],
];

$config['propel'] = array(
    'propel.project.dir' =>
        APPLICATION_SOURCE_DIR . '/Generated/Zed/PropelGen/' . \ProjectA_Shared_Library_Store::getInstance()->getStoreName() . '/',
    'propel.schema.dir' =>
        APPLICATION_SOURCE_DIR . '/Generated/Zed/PropelGen/' . \ProjectA_Shared_Library_Store::getInstance()->getStoreName() . '/Schema',
    'propel.php.dir' => APPLICATION_ROOT_DIR,
    'propel.packageObjectModel' => 'true',
    'propel.project' => 'zed',
    'propel.targetPackage' => 'Zed',
    'propel.database' => 'mysql',
    'propel.database.encoding' => 'utf8',
    'propel.mysql.tableType' => 'InnoDB',
    'propel.behavior.lumberjack.class' => 'ProjectA_Zed_Lumberjack_Component_Model_Behaviour_Lumberjack',
    'propel.behavior.changepaldefaults.class' => 'ProjectA_Zed_Library_Propel_Behavior_ChangePalDefaults',
    'propel.behavior.default' => 'lumberjack, changepaldefaults',
    'propel.builder.pluralizer.class' => 'builder.util.StandardEnglishPluralizer',
    'propel.builder.object.class' => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5ObjectBuilder',
    'propel.builder.peer.class' => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5PeerBuilder',
    'propel.builder.tablemap.class' => 'ProjectA_Zed_Library_Propel_Builder_Map_PHP5TableMapBuilder',
    'propel.builder.peerstub.class' => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5PeerStubBuilder',
    'propel.builder.objectstub.class' => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5ObjectStubBuilder',
    'propel.builder.query.class' => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5QueryBuilder',
    'propel.builder.querystub.class' => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5QueryStubBuilder',
);

$config['dwh'] = array(
    'mysql-binary' => '/usr/bin/mysql',
    'mysql-username' => '',
    'mysql-password' => '',
    'mysql-database' => '',
    'mysql-host' => 'localhost',

    'postgresql-binary' => '/usr/bin/psql',
    'postgresql-username' => '',
    'postgresql-database' => '',
    'postgresql-host' => 'localhost',

    // where to find uploaded zips etc, same for all environments
    'data-dir' => '/path/to/dwh/data',

    // a directory for keeping timestamp files, separate for each environment
    'work-dir' => '/path/to/environment/dwh/work',

    // a directory for keeping json data files to be used by others, separate for each environment
    'export-dir' => '/path/to/environment/dwh/export',

    // can be used on dev machines to limit the time range of data to be processed
    // (makes it faster). Both expressions must be castable to a TIMESTAMP
    'import-min-time' => '1970-01-01',
    'import-max-time' => 'now()',

    // the maximum number of jobs that can be run in parallel
    'maximum-number-parallel-import-jobs' => 4,
    // url to the cubes application
    'cubes-url' => 'http://localhost:8080',
);

$config['mcm'] = array(
    'username_webtrekk' => 'user',
    'password_webtrekk' => 'pass',
    'tracking_id_webtrekk' => 'id'
);

$config['mail-chimp'] = array(
    'api-key' => '12345abcde', // the api key for the mail chimp api
    'import-start-date' => '2013-04-01' // the day from which on to track campaigns and lists
);

$config['adwords'] = array(
    'email' => 'foo@example.com',
    'password' => '123abc',
    'developer-token' => 'asdfghjkl',
    'mcc-client-id' => null

);

$config['glossary'] = array(
    'broadcast' => true,
    'destination' => '/queue/glossary',
    'properties' => array(
        'persistent' => 'true',
    ),
    'prefetch_size' => 50,
    'amount_of_frames' => 50,
    'amount_of_buckets' => 1,
    'url' => '',
    'mapping' => 'mapping',
    'search' => 'search',
    'proxy' => true,
    'username' => null,
    'password' => null,
    'timeout_seconds' => 1,
    'timeout_milliseconds' => 0,
);

$config['mail'] = array(
    'defaultReplyEmail' => 'orders@project-yz.com',
    'viewOrderUrl' => 'http://www.project-yz.com/accounts/orders',
    'availabilityCheckUrl' => 'http://www.project-yz.com/artworkavailability',
    'zedOrderViewUrl' => 'https://zed.project-yz.com/sales/order-details/index/id/',
    'operationsMailAddress' => 'support@project-yz.com',
    'accountingMailAddress' => 'accounting@project-yz.com',
    'cartAbandonedUnsubscribeSalt' => 'IAMTHEMOSTSECRETSALTOFALLTIMEREALLYTRUSTME',
    /**
     * fakeOrderData used in "GetUserInformation from Legacy" Command
     */
    'overrideOrderData' => array(
        'email' => 'dev@project-yz.com',
        'firstname' => 'Jon',
        'lastname' => 'Doe'
    )
);

$config['productImage'] = [
    'originalProductImageDirectory' => 'images' . DIRECTORY_SEPARATOR . 'products/original',
    'incomingProductImageDirectory' => 'images' . DIRECTORY_SEPARATOR . 'products/incoming',
    'processedProductImageDirectory' => 'images' . DIRECTORY_SEPARATOR . 'products/processed',
    'imageUrlPrefix' => 'images',
    'amazonS3Key' => '',
    'amazonS3Secret' => '',
    'amazonS3BucketName' => ''
];

$config['invoice'] = [
    'protectedDocumentDirectory' => 'protected' . DIRECTORY_SEPARATOR . 'invoices',
];

$config['customer'] = [
    'minutes_before_restore_password_invalid' => 60,
    'double_opt_in_registration' => false
];

$config['cloud'] = [
    'enabled' => false,
    'objectStorage' => [
        'enabled' => false,
        'providerName' => 'rackspace',
        'dataContainers' => [
            'defaultPrivateContainerName' => 'pyz-private',
            'defaultPublicContainerName' => '',
            'defaultPublicCdnContainerName' => 'pyz-cdn',
            'defaultImagesContainerName' => 'pyz-private',
        ],
        'rackspace' => [
            'username' => 'cloudfiles.contorion',
            'apiKey' => 'e73a9eb8d9324e98bbf6552e8150ec9c',
            'apiEndpoint' => 'https://lon.identity.api.rackspacecloud.com/v2.0/',
            'storageService' => 'cloudFiles',
            'location' => 'LON'
        ],
        'productImages' => [
            'prefix' => 'productImages',
            'deleteRemoteObjects' => true,
        ],
    ],
    'cdn' => [
        'enabled' => false,
        'static_media' => [
            'prefix' => 'media',
            'http' => '',
            'https' => '',
        ],
        'static_assets' => [
            'prefix' => 'assets',
            'http' => '',
            'https' => '',
        ],
        'productImages' => [
            'pathName' => '/images/products/',
        ],
        'deleteLocalProcessedImages' => false,
        'deleteLocalOriginalImages' => false,
    ]
];
