<?php
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
$config['timezone'] = 'UTC';

/**
 * Database-Connection
 *
 * STORE
 */
$config['db'] = array(
    'username' => '',
    'password' => '',
    'database' => '',
    'host'     => 'localhost',
    'port'     => 3306
);

/**
 * This tells the Generated_Zed_FactoryRepository Generator which Project Namespace should used
 */
$config['projectNamespace'] = 'Sao';

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

$config['db_dump'] = array(
    'username'      => '',
    'password'      => '',
    'database'      => '',
    'host'          => 'localhost',
    'mysqldump_bin' => '/usr/bin/mysqldump',
    'mysql_bin'     => '/usr/bin/mysql',
);

/**
 * Connection to Key Value Sources
 * define the current used source and provide a setup
 */
$config['kv_setup'] = [
    'source' => 'memcached',
    'memcached' => [
        'host'   => 'localhost',
        'port'   => '11211',
        'prefix' => ''
    ],
    'mysql' => [
        'host' => 'localhost',
        'user' => 'root',
        'password' => '',
        'database' => 'kv_storage',
    ]
];

/**
 * Connection to SOLR
 *
 * GLOBAL
 */
$config['solr'] = array(
    'base_url'        => 'http://127.0.0.1:8080',
    'config_dir' => APPLICATION_ROOT_DIR . '/config/Zed/solr',
    'application_dir' => APPLICATION_VENDOR_DIR . '/project-a/infrastructure-package/bin/',

    // TODO: change to NEW (needs server adjustments): PalShared_Data::getLocalCommonPath('solr'),
    'data_dir'        => APPLICATION_ROOT_DIR . '/data/solr',
);

/**
 * Connection to Jenkins
 *
 * GLOBAL
 */
$config['jenkins'] = array(
    'base_url'     => 'http://127.0.0.1:8081',
    'notify_email' => '',

    // TODO: change to NEW?  PalShared_Data::getLocalCommonPath('jenkins'),
    'data_dir'     => APPLICATION_ROOT_DIR . '/data/jenkins', //PalShared_Data::getLocalCommonPath('jenkins'),
);

/**
 * Hostnames of all applications
 *
 * STORE
 */
$config['host'] = array(
    'yves'          => '',
    'zed'           => '',
    'zed_local'     => '',

    'static_assets' => '',
    'static_media'  => '',
);

$config['host_ssl'] = array(
    'yves'          => '',
    'zed'           => '',
    'zed_local'     => '',

    'static_assets' => '',
    'static_media'  => '',
);

/**
 * Activate logging
 *
 * GLOBAL
 */
$config['log'] = array(
    'log_propel_sql'           => false, // File: data/logs/ZED/propel_sql.log
    'log_memcache_synchronize' => false, // File: data/logs/ZED/memcache_synchronize.log
);

/**
 * TODO move to Yves config
 */
$config['transfer'] = array(
    'username' => 'yves',
    'password' => 'o7&bg=Fz;nSslHBC',
    'ssl'      => false,
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
$config['password'] = [
    'algorithm' => 1, //PASSWORD_BCRYPT, constant not yet there in yves, restore to constant when using php 5.5
    'options'   => []
];

/**
 * Configuration for Payone
 * Pay Attention to NOT use characters which are
 * not defined in ASCII
 *
 * STORE
 */
$config['adyen_test']['merchant_user'] = 'ws@Company.SaatchiOnline';
$config['adyen_test']['merchant_password'] = "M>35^t&DZ7IH{as}4xD[*&A%d";
$config['adyen_test']['merchant_account'] = 'SaatchiOnlineUS';
$config['adyen_test']['currency'] = 'USD';
$config['adyen_test']['skin_code'] = 'SbbWtMjR';
$config['adyen_test']['hmac_shared_secret_key'] = 'skdlfjs7w9sls44da';
$config['adyen_test']['hpp_url'] = 'https://test.adyen.com/hpp/details.shtml';

$config['adyen']['merchant_user'] = 'ws@Company.SaatchiOnline';
$config['adyen']['merchant_password'] = "M>35^t&DZ7IH{as}4xD[*&A%d";
$config['adyen']['merchant_account'] = 'SaatchiOnlineUS';
$config['adyen']['currency'] = 'USD';
$config['adyen']['skin_code'] = 'SbbWtMjR';
$config['adyen']['hmac_shared_secret_key'] = 'skdlfjs7w9sls44da';
$config['adyen']['hpp_url'] = 'https://test.adyen.com/hpp/details.shtml';

$config['adyen_test']['development']['notification_raw_data_log_url']
    = 'http://yves.dev.saatchionline.com/data/static/US/payment/notification/';

$config['adyen']['development']['notification_raw_data_log_url']
    = 'http://yves.dev.saatchionline.com/data/static/US/payment/notification/';

$config['stripe_test']['currency'] = 'USD';
$config['stripe_test']['secret_key'] = 'sk_test_c3yedK5n5wKbwjNJZbuXYOxy';
$config['stripe_test']['publishable_key'] = 'pk_test_sUFzCYKTQrutJphLmWmyQS0l';

$config['stripe']['currency'] = 'USD';
$config['stripe']['secret_key'] = 'sk_test_c3yedK5n5wKbwjNJZbuXYOxy';
$config['stripe']['publishable_key'] = 'pk_test_sUFzCYKTQrutJphLmWmyQS0l';


$config['zed'] = array(
    'session'      => array(
        'save_handler' => null,
        'save_path'    => null
    ),
    'ssl_enabled'  => true,
    'ssl_excluded' => array(
        'monitoring/heartbeat'
    ),
    'customercare' => array(
        'zed_backlink' => 'DEFAULT.zed.saatchionline.com',
        // this is needed, because in live systems URL is set to localhost
        'error_mail'   => 'support@saatchionline.com',
    ),
);

$config['yves'] = [
    'theme'          => 'demoshop',
    'session'        => [
        'save_handler' => null,
        'save_path'    => null,
        'name'         => null,
        'domain'       => null,
    ]
];

$config['ftp_proxy'] = array(
    'lftp_binary' => '/usr/bin/lftp',
);

$config['activemq'] = array(
    array(
        'host' => 'localhost',
        'port' => '61613'
    ),
    array(
        'host' => 'localhost',
        'port' => '61613'
    ),
);

$config['lumberjack'] = array(
    'enabled'              => false,
    'destination'          => '/queue/lumberjack',
    'properties'           => array(
        'persistent' => 'true',
    ),
    'prefetch_size'        => 50,
    'amount_of_frames'     => 50,
    'amount_of_buckets'    => 5,
    'url'                  => '/lumberjack/elastic-search-proxy/',
    'mapping'              => 'mapping',
    'search'               => 'search',
    'proxy'                => true,
    'username'             => null,
    'password'             => null,
    'timeout_seconds'      => 1,
    'timeout_milliseconds' => 0,
    'elasticsearch'        => array(
        'host'              => '',
        'port'              => '9200',
        'protocol'          => 'http',
        'index'             => '',
        'type'              => '',
    ),
    'gui'                  => array(
        'requireJs'        => APPLICATION_VENDOR_DIR . '/project-a/lumberjack-package/src/ProjectA/Zed/Lumberjack/Module/View/gui/dist/require.js',
        'lumberjackMinJs'  => APPLICATION_VENDOR_DIR . '/project-a/lumberjack-package/src/ProjectA/Zed/Lumberjack/Module/View/gui/dist/lumberjack-min.js',
    ),
    // key name => length of sanitized string
    'keys_to_sanitize'     => array(
        'cc_cardholder' => 5,
        'cc_number' => 8,
        'cc_expiration_month' => 2,
        'cc_expiration_year' => 4,
        'cc_verification' => 3,
        'cvc' => 3,
        'password' => 5,
        'pdf' => 5,
    ),
);

$config['product_images_ftp_account'] = array(
    'host'        => 'upload.saatchionline.com',
    'username'    => 'production',
    'password'    => 'prod44mate89',
    'remote_path' => '/data/storage/production/static/US/upload/products/',
    'protocol'    => 'sftp://'
);

$config['propel'] = array(
    'propel.project.dir'                      =>
    APPLICATION_SOURCE_DIR . '/Generated/Zed/PropelGen/' . ProjectA_Shared_Library_Store::getInstance()->getStoreName() . '/',
    'propel.schema.dir'                       =>
    APPLICATION_SOURCE_DIR . '/Generated/Zed/PropelGen/' . ProjectA_Shared_Library_Store::getInstance()->getStoreName() . '/Schema',
    'propel.php.dir'                          => APPLICATION_ROOT_DIR,
    'propel.packageObjectModel'               => 'true',
    'propel.project'                          => 'zed',
    'propel.targetPackage'                    => 'Zed',
    'propel.database'                         => 'mysql',
    'propel.database.encoding'                => 'utf8',
    'propel.mysql.tableType'                  => 'InnoDB',
    'propel.behavior.lumberjack.class'        => 'ProjectA_Zed_Lumberjack_Component_Model_Behaviour_Lumberjack',
    'propel.behavior.changepaldefaults.class' => 'ProjectA_Zed_Library_Propel_Behavior_ChangePalDefaults',
    'propel.behavior.default'                 => 'lumberjack, changepaldefaults',
    'propel.builder.pluralizer.class'         => 'builder.util.StandardEnglishPluralizer',
    'propel.builder.object.class'             => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5ObjectBuilder',
    'propel.builder.peer.class'               => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5PeerBuilder',
    'propel.builder.tablemap.class'           => 'ProjectA_Zed_Library_Propel_Builder_Map_PHP5TableBuilder',
    'propel.builder.peerstub.class'           => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5PeerStubBuilder',
    'propel.builder.objectstub.class'         => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5ObjectStubBuilder',
    'propel.builder.query.class'              => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5QueryBuilder',
    'propel.builder.querystub.class'          => 'ProjectA_Zed_Library_Propel_Builder_Om_PHP5QueryStubBuilder',
);

$config['dwh'] = array(
    'mysql-binary'                        => '/usr/bin/mysql',
    'mysql-username'                      => '',
    'mysql-password'                      => '',
    'mysql-database'                      => '',
    'mysql-host'                          => 'localhost',

    'postgresql-binary'                   => '/usr/bin/psql',
    'postgresql-username'                 => '',
    'postgresql-database'                 => '',
    'postgresql-host'                     => 'localhost',

    // where to find uploaded zips etc, same for all environments
    'data-dir'                            => '/path/to/dwh/data',

    // a directory for keeping timestamp files, separate for each environment
    'work-dir'                            => '/path/to/environment/dwh/work',

    // a directory for keeping json data files to be used by others, separate for each environment
    'export-dir'                          => '/path/to/environment/dwh/export',

    // can be used on dev machines to limit the time range of data to be processed
    // (makes it faster). Both expressions must be castable to a TIMESTAMP
    'import-min-time'                     => '1970-01-01',
    'import-max-time'                     => 'now()',

    // the maximum number of jobs that can be run in parallel
    'maximum-number-parallel-import-jobs' => 4,

    // url to the cubes application
    'cubes-url'                           => 'http://localhost:8080',
);

$config['mcm'] = array(
    'username_webtrekk'    => 'user',
    'password_webtrekk'    => 'pass',
    'tracking_id_webtrekk' => 'id'
);

$config['mail-chimp'] = array(
    'api-key'           => '12345abcde', // the api key for the mail chimp api
    'import-start-date' => '2013-04-01' // the day from which on to track campaigns and lists
);

$config['adwords'] = array(
    'email'           => 'foo@example.com',
    'password'        => '123abc',
    'developer-token' => 'asdfghjkl',
    'mcc-client-id'   => null

);

$config['glossary'] = array(
    'broadcast'            => true,
    'destination'          => '/queue/glossary',
    'properties'           => array(
        'persistent' => 'true',
    ),
    'prefetch_size'        => 50,
    'amount_of_frames'     => 50,
    'amount_of_buckets'    => 1,
    'url'                  => '',
    'mapping'              => 'mapping',
    'search'               => 'search',
    'proxy'                => true,
    'username'             => null,
    'password'             => null,
    'timeout_seconds'      => 1,
    'timeout_milliseconds' => 0,
);

$config['fulfillment'] = array(
    'jondo'         => array(
        'services'  => array(
            'branding' => array(
                'insertCard' => array(
                    'outsideImage' => 'http://s3.amazonaws.com/saatchi-general/fulfillment/harvest/premiumBranding/insertCard/outside.jpg',
                    'insideImage'  => 'http://s3.amazonaws.com/saatchi-general/fulfillment/harvest/premiumBranding/insertCard/inside.jpg',
                ),
                'sticker'    => array(
                    'frontImage' => 'http://s3.amazonaws.com/saatchi-general/fulfillment/harvest/premiumBranding/sticker/sticker.jpg',
                ),
            ),
        ),
        'dpqApiUrl' => 'http://staging.harvestDigitalPrinting.com/integration/api/quoteApi.php',
        'cofApiUrl' => 'http://staging.harvestDigitalPrinting.com/integration/cofApi.php',
        'userId'    => 51,
        'userKey'   => 'rt596TY',
        'testMode'  => true,
    ),
    'marcofinearts' => array(
        'apiUrl'    => 'http://gatewaybeta.marcofinearts.com/v1/server.php?wsdl',
        'username'  => '',
        'password'  => '',
        'secretkey' => '',
    ),
    'sba'           => array(
        'apiUrl'          => 'http://24.157.59.5/sba/webservice/shippingwebservice.asmx?wsdl',
        'customer_number' => '689102',
        'password'        => 'sba0506130454',
    ),
    'universal'     => array(),
);

$config['mail'] = array(
    'defaultReplyEmail'    => 'orders@saatchionline.com',
    'viewOrderUrl'         => 'http://www.saatchionline.com/accounts/orders',
    'availabilityCheckUrl' => 'http://www.saatchionline.com/artworkavailability',
    'zedOrderViewUrl' => 'https://zed.saatchionline.com/sales/order-details/index/id/',
    'operationsMailAddress' => 'support@saatchionline.com',
    'accountingMailAddress' => 'accounting@saatchionline.com',
    'cartAbandonedUnsubscribeSalt' => 'IAMTHEMOSTSECRETSALTOFALLTIMEREALLYTRUSTME',
    /**
     * fakeOrderData used in "GetUserInformation from Legacy" Command
     */
    'overrideOrderData'    => array(
        'email'     => 'dev@saatchionline.com',
        'firstname' => 'Jon',
        'lastname'  => 'Doe'
    )
);
