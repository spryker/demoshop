<?php
use ProjectA\Shared\Adwords\AdwordsConfig;
use ProjectA\Shared\Customer\CustomerConfig;
use ProjectA\Shared\DbDump\DbDumpConfig;
use ProjectA\Shared\Dwh\DwhConfig;
use ProjectA\Shared\Glossary\GlossaryConfig;
use Pyz\Shared\Mail\MailConfig;
use ProjectA\Shared\Payone\PayoneConfig;
use ProjectA\Shared\ProductImage\ProductImageConfig;
use ProjectA\Shared\System\SystemConfig;
use ProjectA\Shared\Yves\YvesConfig;

$config[SystemConfig::CURRENT_APPLICATION_STORE] = APPLICATION_STORE;
$config[SystemConfig::CURRENT_APPLICATION_ENV] = APPLICATION_ENV;

$config[SystemConfig::PROJECT_TIMEZONE] = 'UTC';
$config[SystemConfig::PROJECT_NAMESPACE] = 'Pyz';
$config[SystemConfig::CODE_GENERATORS] = ['transfer', 'zed', 'yves'];

$config[DbDumpConfig::DB_DUMP_USERNAME] = '';
$config[DbDumpConfig::DB_DUMP_PASSWORD] = '';
$config[DbDumpConfig::DB_DUMP_DATABASE] = '';
$config[DbDumpConfig::DB_DUMP_HOST] = 'localhost';
$config[DbDumpConfig::DB_DUMP_MYSQLDUMP_BIN] = '/usr/bin/mysqldump';
$config[DbDumpConfig::DB_DUMP_MYSQL_BIN] = '/usr/bin/mysql';

$config[SystemConfig::STORAGE_KV_SOURCE] = 'redis';

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
$config[SystemConfig::LOG_PROPEL_SQL] = true;

$config[YvesConfig::TRANSFER_USERNAME] = 'yves';
$config[YvesConfig::TRANSFER_PASSWORD] = 'o7&bg=Fz;nSslHBC';
$config[YvesConfig::TRANSFER_SSL] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

$config[SystemConfig::ZED_LIBRARY_PASSWORD_ALGORITHM] = PASSWORD_BCRYPT;
$config[SystemConfig::ZED_LIBRARY_PASSWORD_OPTIONS] = [];

$config[PayoneConfig::PAYONE_MODE] = 'test';
$config[PayoneConfig::PAYONE_MID] = '25735';
$config[PayoneConfig::PAYONE_AID] = '25811';
$config[PayoneConfig::PAYONE_ENCODING] = 'UTF-8';
$config[PayoneConfig::PAYONE_CURRENCY] = 'EUR';
$config[PayoneConfig::PAYONE_GATEWAYURL] = 'https://api.pay1.de/post-gateway/';

$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = null;

$config[SystemConfig::ZED_SSL_ENABLED] = false;
$config[SystemConfig::ZED_SSL_EXCLUDED] = ['system/heartbeat'];

$config[YvesConfig::YVES_THEME] = 'demoshop';
$config[YvesConfig::YVES_TRUSTED_PROXIES] = [];
$config[YvesConfig::YVES_SSL_ENABLED] = false;
$config[YvesConfig::YVES_COMPLETE_SSL_ENABLED] = false;
$config[YvesConfig::YVES_SSL_EXCLUDED] = ['/monitoring/heartbeat'];
$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = null;
$config[YvesConfig::YVES_SESSION_NAME] = 'yves_session';
$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = null;
$config[YvesConfig::YVES_ERROR_PAGE] = '';

$config[SystemConfig::PROPEL] = array(
    'propel.project.dir' =>
        APPLICATION_SOURCE_DIR . '/Generated/Zed/PropelGen/' . \ProjectA_Shared_Library_Store::getInstance()->getStoreName() . '/',
    'propel.schema.dir' =>
        APPLICATION_SOURCE_DIR . '/Generated/Zed/PropelGen/' . \ProjectA_Shared_Library_Store::getInstance()->getStoreName() . '/Schema',
    'propel.php.dir' => APPLICATION_ROOT_DIR,
    'propel.gen.dir' => APPLICATION_SOURCE_DIR . '/Generated/PropelGen/' . \ProjectA_Shared_Library_Store::getInstance()->getStoreName() . '/',
    'propel.packageObjectModel' => 'true',
    'propel.project' => 'zed',
    'propel.targetPackage' => 'Zed',
    'propel.database' => 'mysql',
    'propel.database.encoding' => 'utf8',
    'propel.mysql.tableType' => 'InnoDB',
    'propel.behavior.lumberjack.class' => 'ProjectA_Zed_Lumberjack_Business_Model_Behaviour_Lumberjack',
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

//$config[ProductImageConfig::PRODUCT_IMAGE_ORIGINAL_PRODUCT_IMAGE_DIRECTORY]
//    = 'images' . DIRECTORY_SEPARATOR . 'products/original';
//
//$config[ProductImageConfig::PRODUCT_IMAGE_INCOMING_PRODUCT_IMAGE_DIRECTORY]
//    = 'images' . DIRECTORY_SEPARATOR . 'products/incoming';
//
//$config[ProductImageConfig::PRODUCT_IMAGE_PROCESSED_PRODUCT_IMAGE_DIRECTORY]
//    = 'images' . DIRECTORY_SEPARATOR . 'products/processed';
//
//$config[ProductImageConfig::PRODUCT_IMAGE_IMAGE_URL_PREFIX] = 'images';
//$config[ProductImageConfig::PRODUCT_IMAGE_AMAZON_S3_KEY] = '';
//$config[ProductImageConfig::PRODUCT_IMAGE_AMAZON_S3_SECRET] = '';
//$config[ProductImageConfig::PRODUCT_IMAGE_AMAZON_S3_BUCKET_NAME] = '';


$config[CustomerConfig::CUSTOMER_MINUTES_BEFORE_RESTORE_PASSWORD_INVALID] = 60;
$config[CustomerConfig::CUSTOMER_DOUBLE_OPT_IN_REGISTRATION] = true;

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

//TODO: change this to our settings instead of using the zooron mandrill account
$config[MailConfig::MAIL_PROVIDER_MANDRILL] = [
    'api-key' => 'weUrHb0QNJaZNEvwZa03xA',
    'host' => 'smtp.mandrillapp.com',
    'port' => '587',
    'username' => 'tamer.el-hawari@project-a.com',
    'from_mail' => 'service@demoshop.de',
    'from_name' => 'Demoshop'
];
