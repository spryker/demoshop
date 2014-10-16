<?php
use ProjectA\Shared\Adwords\AdwordsConfig;
use ProjectA\Shared\Customer\CustomerConfig;
use ProjectA\Shared\DbDump\DbDumpConfig;
use ProjectA\Shared\Dwh\DwhConfig;
use ProjectA\Shared\Glossary\GlossaryConfig;
use ProjectA\Shared\MailChimp\MailChimpConfig;
use ProjectA\Shared\Mcm\McmConfig;
use ProjectA\Shared\Payone\PayoneConfig;
use ProjectA\Shared\ProductImage\ProductImageConfig;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;

$config[SystemConfig::PROJECT_TIMEZONE] = 'UTC';
$config[SystemConfig::PROJECT_NAMESPACE] = 'Pyz';
$config[SystemConfig::CODE_GENERATORS] = ['transfer', 'zed', 'yves'];

$config[SystemConfig::ZED_MYSQL] = [
    SystemConfig::ZED_MYSQL__USERNAME => 'development',
    SystemConfig::ZED_MYSQL__PASSWORD => 'mate20mg',
    SystemConfig::ZED_MYSQL__DATABASE => 'DE_development_zed',
    SystemConfig::ZED_MYSQL__HOST => 'localhost',
    SystemConfig::ZED_MYSQL__PORT => 3306,
];

$config[SystemConfig::REDIS_PARAMETER] = [
    SystemConfig::REDIS_PARAMETER__SCHEME => 'tcp',
    SystemConfig::REDIS_PARAMETER__HOST => '580a3b7944a84d53be497c5a5189affc.publb.rackspaceclouddb.com',
    SystemConfig::REDIS_PARAMETER__PORT => '41219',
    SystemConfig::REDIS_PARAMETER__PASSWORD => 'qYvshA7fz2jvXMyXU6u2d7GwWhEt4jd6DEkg'
];


$config[DbDumpConfig::DB_DUMP_USERNAME] = '';
$config[DbDumpConfig::DB_DUMP_PASSWORD] = '';
$config[DbDumpConfig::DB_DUMP_DATABASE] = '';
$config[DbDumpConfig::DB_DUMP_HOST] = 'localhost';
$config[DbDumpConfig::DB_DUMP_MYSQLDUMP_BIN] = '/usr/bin/mysqldump';
$config[DbDumpConfig::DB_DUMP_MYSQL_BIN] = '/usr/bin/mysql';


$config[SystemConfig::STORAGE_KV_SOURCE] = 'mysql';
$config[SystemConfig::STORAGE_KV_COUCHBASE] = [
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
];

$config[SystemConfig::STORAGE_KV_MEMCACHED] = [
    'host' => 'localhost',
    'port' => '11211',
    'prefix' => ''
];
$config[SystemConfig::STORAGE_KV_MYSQL] = [
    'host' => '',
    'user' => '',
    'password' => '',
    'database' => '',
    'port' => '',
    'table' => ''
];

$config[SystemConfig::HOST_YVES]
    = $config[SystemConfig::HOST_STATIC_ASSETS]
    = $config[SystemConfig::HOST_STATIC_MEDIA]
    = $config[SystemConfig::HOST_SSL_YVES]
    = $config[SystemConfig::HOST_SSL_STATIC_ASSETS]
    = $config[SystemConfig::HOST_SSL_STATIC_MEDIA]
    = 'www-development.project-yz.de';

$config[SystemConfig::HOST_ZED_GUI]
    = $config[SystemConfig::HOST_ZED_API]
    = $config[SystemConfig::HOST_SSL_ZED_GUI]
    = $config[SystemConfig::HOST_SSL_ZED_API]
    = 'zed-development.project-yz.de';

$config[SystemConfig::LOG_LEVEL] = Monolog\Logger::INFO;
$config[SystemConfig::LOG_PROPEL_SQL] = false;

$config[YvesConfig::TRANSFER_USERNAME] = 'yves';
$config[YvesConfig::TRANSFER_PASSWORD] = 'o7&bg=Fz;nSslHBC';
$config[YvesConfig::TRANSFER_SSL] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

$config[SystemConfig::ZED_LIBRARY_PASSWORD_ALGORITHM] = PASSWORD_BCRYPT;
$config[SystemConfig::ZED_LIBRARY_PASSWORD_OPTIONS] = [];

$config[PayoneConfig::PAYONE_MODE] = 'test';
$config[PayoneConfig::PAYONE_MID] = '25735';
$config[PayoneConfig::PAYONE_PORTALID] = '2018246';
$config[PayoneConfig::PAYONE_KEY] = 'dFWR8GlNG8aonscn';
$config[PayoneConfig::PAYONE_AID] = '25811';
$config[PayoneConfig::PAYONE_ENCODING] = 'UTF-8';
$config[PayoneConfig::PAYONE_CURRENCY] = 'EUR';
$config[PayoneConfig::PAYONE_GATEWAYURL] = 'https://api.pay1.de/post-gateway/';

$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = null;
$config[SystemConfig::ZED_SESSION_SAVE_PATH] = null;

$config[SystemConfig::ZED_SSL_ENABLED] = false;
$config[SystemConfig::ZED_SSL_EXCLUDED] = ['system/heartbeat'];

$config[YvesConfig::YVES_THEME] = 'demoshop';
$config[YvesConfig::YVES_TRUSTED_PROXIES] = [];
$config[YvesConfig::YVES_SSL_ENABLED] = false;
$config[YvesConfig::YVES_COMPLETE_SSL_ENABLED] = false;
$config[YvesConfig::YVES_SSL_EXCLUDED] = ['/monitoring/heartbeat'];
$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = null;
$config[YvesConfig::YVES_SESSION_SAVE_PATH] = null;
$config[YvesConfig::YVES_SESSION_NAME] = null;
$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = null;
$config[YvesConfig::YVES_ERROR_PAGE] = '';

$config[SystemConfig::PROPEL] = array(
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

$config[DwhConfig::DWH] = array(
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

$config[DwhConfig::DWH_MYSQL_BINARY] = '/usr/bin/mysql';
$config[DwhConfig::DWH_MYSQL_USERNAME] = '';
$config[DwhConfig::DWH_MYSQL_PASSWORD] = '';
$config[DwhConfig::DWH_MYSQL_DATABASE] = '';
$config[DwhConfig::DWH_MYSQL_HOST] = 'localhost';
$config[DwhConfig::DWH_POSTGRESQL_BINARY] = '/usr/bin/psql';
$config[DwhConfig::DWH_POSTGRESQL_USERNAME] = '';
$config[DwhConfig::DWH_POSTGRESQL_DATABASE] = '';
$config[DwhConfig::DWH_POSTGRESQL_HOST] = 'localhost';
$config[DwhConfig::DWH_DATA_DIR] = '/path/to/dwh/data';
$config[DwhConfig::DWH_WORK_DIR] = '/path/to/environment/dwh/work';
$config[DwhConfig::DWH_EXPORT_DIR] = '/path/to/environment/dwh/export';
$config[DwhConfig::DWH_IMPORT_MIN_TIME] = '1970-01-01';
$config[DwhConfig::DWH_IMPORT_MAX_TIME] = 'now()';
$config[DwhConfig::DWH_MAXIMUM_NUMBER_PARALLEL_IMPORT_JOBS] = 4;
$config[DwhConfig::DWH_CUBES_URL] = 'http://localhost:8080';

$config[McmConfig::MCM_USERNAME_WEBTREKK] = 'user';
$config[McmConfig::MCM_PASSWORD_WEBTREKK] = 'pass';
$config[McmConfig::MCM_TRACKING_ID_WEBTREKK] = 'id';

$config[MailChimpConfig::MAIL_CHIMP_API_KEY] = '12345abcde';
$config[MailChimpConfig::MAIL_CHIMP_IMPORT_START_DATE] = '2013-04-01';

$config[AdwordsConfig::ADWORDS_EMAIL] = 'foo@example.com';
$config[AdwordsConfig::ADWORDS_PASSWORD] = '123abc';
$config[AdwordsConfig::ADWORDS_API_VERSION] = '123abc';
$config[AdwordsConfig::ADWORDS_DEVELOPER_TOKEN] = 'asdfghjkl';
$config[AdwordsConfig::ADWORDS_MCC_CLIENT_ID] = null;

$config[GlossaryConfig::GLOSSARY_BROADCAST] = true;
$config[GlossaryConfig::GLOSSARY_DESTINATION] = '/queue/glossary';
$config[GlossaryConfig::GLOSSARY_PROPERTIES] = ['persistent' => 'true'];
$config[GlossaryConfig::GLOSSARY_PREFETCH_SIZE] = 50;
$config[GlossaryConfig::GLOSSARY_AMOUNT_OF_FRAMES] = 50;
$config[GlossaryConfig::GLOSSARY_AMOUNT_OF_BUCKETS] = 1;
$config[GlossaryConfig::GLOSSARY_URL] = '';
$config[GlossaryConfig::GLOSSARY_MAPPING] = 'mapping';
$config[GlossaryConfig::GLOSSARY_SEARCH] = 'search';
$config[GlossaryConfig::GLOSSARY_PROXY] = true;
$config[GlossaryConfig::GLOSSARY_USERNAME] = null;
$config[GlossaryConfig::GLOSSARY_PASSWORD] = null;
$config[GlossaryConfig::GLOSSARY_TIMEOUT_SECONDS] = 1;
$config[GlossaryConfig::GLOSSARY_TIMEOUT_MILLISECONDS] = 0;

$config[ProductImageConfig::PRODUCT_IMAGE_ORIGINAL_PRODUCT_IMAGE_DIRECTORY]
    = 'images' . DIRECTORY_SEPARATOR . 'products/original';

$config[ProductImageConfig::PRODUCT_IMAGE_INCOMING_PRODUCT_IMAGE_DIRECTORY]
    = 'images' . DIRECTORY_SEPARATOR . 'products/incoming';

$config[ProductImageConfig::PRODUCT_IMAGE_PROCESSED_PRODUCT_IMAGE_DIRECTORY]
    = 'images' . DIRECTORY_SEPARATOR . 'products/processed';

$config[ProductImageConfig::PRODUCT_IMAGE_IMAGE_URL_PREFIX] = 'images';
$config[ProductImageConfig::PRODUCT_IMAGE_AMAZON_S3_KEY] = '';
$config[ProductImageConfig::PRODUCT_IMAGE_AMAZON_S3_SECRET] = '';
$config[ProductImageConfig::PRODUCT_IMAGE_AMAZON_S3_BUCKET_NAME] = '';


$config[CustomerConfig::CUSTOMER_MINUTES_BEFORE_RESTORE_PASSWORD_INVALID] = 60;
$config[CustomerConfig::CUSTOMER_DOUBLE_OPT_IN_REGISTRATION] = false;

$config[SystemConfig::CLOUD_ENABLED] = false;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED] = false;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_PROVIDER_NAME] = 'rackspace';
$config[SystemConfig::CLOUD_OBJECT_STORAGE_DATA_CONTAINERS] = [
    'defaultPrivateContainerName' => 'pyz-private',
    'defaultPublicContainerName' => '',
    'defaultPublicCdnContainerName' => 'pyz-cdn',
    'defaultImagesContainerName' => 'pyz-private',
];

$config[SystemConfig::CLOUD_OBJECT_STORAGE_RACKSPACE] = [
    'username' => 'cloudfiles.contorion',
    'apiKey' => 'e73a9eb8d9324e98bbf6552e8150ec9c',
    'apiEndpoint' => 'https://lon.identity.api.rackspacecloud.com/v2.0/',
    'storageService' => 'cloudFiles',
    'location' => 'LON'
];
$config[SystemConfig::CLOUD_OBJECT_STORAGE_PRODUCT_IMAGES] = [
    'prefix' => 'productImages',
    'deleteRemoteObjects' => true,
];

$config[SystemConfig::CLOUD_CDN_ENABLED] = false;

$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_PREFIX] = 'media';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = '';

$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_PREFIX] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_HTTP] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_HTTPS] = '';

$config[SystemConfig::CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME] = '/images/products/';

$config[SystemConfig::CLOUD_CDN_DELETE_LOCAL_PROCESSED_IMAGES] = false;
$config[SystemConfig::CLOUD_CDN_DELETE_LOCAL_ORIGINAL_IMAGES] = false;



