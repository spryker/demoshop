<?php

use Pyz\Shared\Mail\MailConfig;
use SprykerFeature\Shared\Acl\AclConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Auth\AuthConfig;
use SprykerFeature\Shared\Customer\CustomerConfig;
use SprykerFeature\Shared\DbDump\DbDumpConfig;
use SprykerFeature\Shared\SequenceNumber\SequenceNumberConstants;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\User\UserConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerEngine\Shared\Lumberjack\LumberjackConfig;
use SprykerFeature\Shared\Session\SessionConfig;
use SprykerFeature\Shared\SequenceNumber\SequenceNumberConstants as SequenceNumberConfig;
use Pyz\Shared\OrderExporter\AfterbuyExportConstantInterface;
use Pyz\Shared\Glossary\GlossaryConfig;
use PavFeature\Shared\Adyen\AdyenConfigConstants;

$config[SystemConfig::PROJECT_NAMESPACES] = [
    'Pyz',
];
$config[SystemConfig::CORE_NAMESPACES] = [
    'SprykerFeature',
    'SprykerEngine',
    'PavEngine',
    'PavFeature'
];

$config[ApplicationConfig::ZED_TWIG_OPTIONS] = [];
$config[SystemConfig::CURRENT_APPLICATION_STORE] = APPLICATION_STORE;
$config[SystemConfig::CURRENT_APPLICATION_ENV] = APPLICATION_ENV;

$config[SystemConfig::PROJECT_TIMEZONE] = 'UTC';
$config[SystemConfig::PROJECT_NAMESPACE] = 'Pyz';

$config[SystemConfig::ZED_DB_ENGINE] = 'pgsql';

$config[DbDumpConfig::DB_DUMP_USERNAME] = '';
$config[DbDumpConfig::DB_DUMP_PASSWORD] = '';
$config[DbDumpConfig::DB_DUMP_DATABASE] = '';
$config[DbDumpConfig::DB_DUMP_HOST] = 'localhost';
$config[DbDumpConfig::DB_DUMP_MYSQLDUMP_BIN] = '/usr/bin/mysqldump';
$config[DbDumpConfig::DB_DUMP_MYSQL_BIN] = '/usr/bin/mysql';

$config[SystemConfig::STORAGE_KV_SOURCE] = 'redis';

$config[ApplicationConfig::ZED_TWIG_OPTIONS] = [
    'cache' => \SprykerFeature\Shared\Library\DataDirectory::getLocalStoreSpecificPath('cache/Zed/twig'),
];
$config[ApplicationConfig::YVES_TWIG_OPTIONS] = [
    'cache' => \SprykerFeature\Shared\Library\DataDirectory::getLocalStoreSpecificPath('cache/Yves/twig'),
];

$config[SystemConfig::ELASTICA_PARAMETER__HOST] = 'localhost';
$config[SystemConfig::ELASTICA_PARAMETER__TRANSPORT] = 'http';
$config[SystemConfig::ELASTICA_PARAMETER__PORT] = '10005';
$config[SystemConfig::ELASTICA_PARAMETER__INDEX_NAME] = 'page';

$config[SystemConfig::HOST_YVES]
    = $config[SystemConfig::HOST_STATIC_ASSETS]
    = $config[SystemConfig::HOST_STATIC_MEDIA]
    = $config[SystemConfig::HOST_SSL_YVES]
    = $config[SystemConfig::HOST_SSL_STATIC_ASSETS]
    = $config[SystemConfig::HOST_SSL_STATIC_MEDIA]
    = 'www.spryker.dev';

$config[SystemConfig::HOST_ZED_GUI]
    = $config[SystemConfig::HOST_ZED_API]
    = $config[SystemConfig::HOST_SSL_ZED_GUI]
    = $config[SystemConfig::HOST_SSL_ZED_API]
    = 'zed.spryker.dev';

$config[SystemConfig::LOG_LEVEL] = Monolog\Logger::INFO;

$config[YvesConfig::TRANSFER_USERNAME] = 'yves';
$config[YvesConfig::TRANSFER_PASSWORD] = 'o7&bg=Fz;nSslHBC';
$config[YvesConfig::TRANSFER_SSL] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[YvesConfig::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

$config[SystemConfig::ZED_LIBRARY_PASSWORD_ALGORITHM] = PASSWORD_BCRYPT;
$config[SystemConfig::ZED_LIBRARY_PASSWORD_OPTIONS] = [];

$config[SystemConfig::YVES_STORAGE_SESSION_TIME_TO_LIVE] = SessionConfig::SESSION_LIFETIME_1_HOUR;
$config[SystemConfig::YVES_STORAGE_SESSION_FILE_PATH] = session_save_path();

$config[SystemConfig::ZED_STORAGE_SESSION_TIME_TO_LIVE] = SessionConfig::SESSION_LIFETIME_30_DAYS;
$config[SystemConfig::ZED_STORAGE_SESSION_COOKIE_NAME] = 'zed_session';
$config[SystemConfig::ZED_STORAGE_SESSION_FILE_PATH] = session_save_path();
$config[SystemConfig::ZED_SESSION_SAVE_HANDLER] = null;

$config[SystemConfig::ZED_SSL_ENABLED] = false;
$config[SystemConfig::ZED_API_SSL_ENABLED] = false;
$config[SystemConfig::ZED_SSL_EXCLUDED] = ['system/heartbeat'];

$config[YvesConfig::YVES_THEME] = 'demoshop';
$config[YvesConfig::YVES_TRUSTED_PROXIES] = [];
$config[YvesConfig::YVES_SSL_ENABLED] = false;
$config[YvesConfig::YVES_COMPLETE_SSL_ENABLED] = false;
$config[YvesConfig::YVES_SSL_EXCLUDED] = ['/monitoring/heartbeat'];

$config[YvesConfig::YVES_SESSION_SAVE_HANDLER] = SessionConfig::SESSION_HANDLER_REDIS;
$config[YvesConfig::YVES_SESSION_NAME] = 'yves_session';
$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = $config[SystemConfig::HOST_YVES];
$config[YvesConfig::YVES_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/static/public/Yves/errorpage/error.html';

$config[CustomerConfig::CUSTOMER_SECURED_PATTERN] = '(^/login_check$|^/customer)';
$config[CustomerConfig::CUSTOMER_ANONYMOUS_PATTERN] = '^/.*';

$currentStore = \SprykerEngine\Shared\Kernel\Store::getInstance()->getStoreName();

$config[SystemConfig::PROPEL] = [
    'database' => [
        'connections' => [
            'default' => [
                'adapter'  => 'pgsql',
                // please define this in the corresponding config_default_[environment]_[language].php file
                'dsn' => 'undefined',
                'user'     => 'development',
                'password' => '',
                'settings' => [
                    'charset' => 'utf8',
                    'queries' => [
                          'utf8' => "SET NAMES 'UTF8'",
                        ],
                ],
            ],
        ],
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
                'object' => '\SprykerEngine\Zed\Propel\Business\Builder\ObjectBuilder',
            ],
        ],
    ],
    'paths' => [
        'phpDir' => APPLICATION_ROOT_DIR,
        'sqlDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Sql',
        'migrationDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Migration',
        'schemaDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Schema',
        'phpConfDir' => APPLICATION_ROOT_DIR . '/src/Generated/Propel/' . $currentStore . '/Config',
    ],
];

$config[SystemConfig::CLOUD_ENABLED] = false;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED] = false;
$config[SystemConfig::CLOUD_OBJECT_STORAGE_PROVIDER_NAME] = 'rackspace';
$config[SystemConfig::CLOUD_OBJECT_STORAGE_DATA_CONTAINERS] = [
    'defaultPrivateContainerName' => 'pyz-private',
    'defaultPublicContainerName' => '',
    'defaultPublicCdnContainerName' => 'pyz-cdn',
    'defaultImagesContainerName' => 'pyz-private',
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

$config[MailConfig::MAIL_PROVIDER_MANDRILL] = [
    'api-key' => 'W-oNqoH_RPRodHpYgm3trg',
    'host' => 'smtp.mandrillapp.com',
    'port' => '587',
    'username' => 'office@petsdeli.de',
    'from_mail' => 'office@petsdeli.de',
    'from_name' => 'PETS DELI',
];

$config[CustomerConfig::SHOP_MAIL_FROM_EMAIL_NAME]    = 'PETS DELI';
$config[CustomerConfig::SHOP_MAIL_FROM_EMAIL_ADDRESS] = 'office@petsdeli.de';

$config[CustomerConfig::SHOP_MAIL_REGISTRATION_TOKEN]   = 'registration.token';
$config[CustomerConfig::SHOP_MAIL_REGISTRATION_SUBJECT] = 'registration.mail.subject';

$config[CustomerConfig::SHOP_MAIL_PASSWORD_RESTORE_TOKEN]   = 'password.restore';
$config[CustomerConfig::SHOP_MAIL_PASSWORD_RESTORE_SUBJECT] = 'password.restore.mail.subject';

$config[CustomerConfig::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_TOKEN]   = 'password.change.confirmation';
$config[CustomerConfig::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_SUBJECT] = 'password.change.confirmation.mail.subject';

$config[UserConfig::USER_SYSTEM_USERS] = [
    'yves_system',
];

$config[AuthConfig::AUTH_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                'bundle' => '*',
                'controller' => 'gateway',
                'action' => '*',
            ],
        ],
        'token' => 'JDJ5JDEwJFE0cXBwYnVVTTV6YVZXSnVmM2l1UWVhRE94WkQ4UjBUeHBEWTNHZlFRTEd4U2F6QVBqejQ2',
    ],
];

$config[AclConfig::ACL_DEFAULT_RULES] = [
    [
        'bundle' => 'auth',
        'controller' => 'login',
        'action' => 'index',
        'type' => 'allow',
    ],
    [
        'bundle' => 'auth',
        'controller' => 'login',
        'action' => 'check',
        'type' => 'allow',
    ],
    [
        'bundle' => 'auth',
        'controller' => 'password',
        'action' => 'reset',
        'type' => 'allow',
    ],
    [
        'bundle' => 'auth',
        'controller' => 'password',
        'action' => 'reset-request',
        'type' => 'allow',
    ],
    [
        'bundle' => 'acl',
        'controller' => 'index',
        'action' => 'denied',
        'type' => 'allow',
    ],
    [
        'bundle' => 'system',
        'controller' => 'heartbeat',
        'action' => 'index',
        'type' => 'allow',
    ],
];

$config[AclConfig::ACL_USER_RULE_WHITELIST] = [
    [
        'bundle' => 'application',
        'controller' => '*',
        'action' => '*',
        'type' => 'allow',
    ],
    [
        'bundle' => 'auth',
        'controller' => '*',
        'action' => '*',
        'type' => 'allow',
    ],
    [
        'bundle' => 'system',
        'controller' => 'heartbeat',
        'action' => 'index',
        'type' => 'allow',
    ],
];

$config[AclConfig::ACL_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                'bundle' => '*',
                'controller' => 'gateway',
                'action' => '*',
                'type' => 'allow',
            ],
        ],
    ],
];

$config[ApplicationConfig::NAVIGATION_CACHE_ENABLED] = true;

$config[LumberjackConfig::COLLECTORS]['YVES'] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Collector\ServerDataCollector',
    '\SprykerEngine\Shared\Lumberjack\Model\Collector\RequestDataCollector',
    '\SprykerEngine\Shared\Lumberjack\Model\Collector\EnvironmentDataCollector',
    '\SprykerFeature\Client\Lumberjack\Service\YvesDataCollector',
];
$config[LumberjackConfig::WRITERS]['YVES'] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Writer\File',
];

$config[LumberjackConfig::COLLECTORS]['ZED'] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Collector\ServerDataCollector',
    '\SprykerEngine\Shared\Lumberjack\Model\Collector\RequestDataCollector',
    '\SprykerEngine\Shared\Lumberjack\Model\Collector\EnvironmentDataCollector',
];
$config[LumberjackConfig::WRITERS]['ZED'] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Writer\File',
];

$config[LumberjackConfig::COLLECTOR_OPTIONS] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Collector\RequestDataCollector' => [
        'param_blacklist' => ['cc', 'password', 'encryptedCardData', 'encrypted_card_data'],
        'filtered_content' => '***FILTERED***',
    ],
];

$config[YvesConfig::YVES_SHOW_EXCEPTION_STACK_TRACE] = true;

$config[SystemConfig::PROPEL_DEBUG] = false;
$config[ApplicationConfig::SHOW_SYMFONY_TOOLBAR] = false;
$config[SequenceNumberConfig::ENVIRONMENT_PREFIX] = '';

$config[LumberjackConfig::WRITER_OPTIONS] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Writer\File' => ['log_path' => '/data/logs/development/DE/'],
];

$config[AfterbuyExportConstantInterface::AFTERBUY_IS_EXPORT_ENABLED] = false;
$config[AfterbuyExportConstantInterface::AFTERBUY_PARTNER_ID] = 107450;
$config[AfterbuyExportConstantInterface::AFTERBUY_PARTNER_PASS] = '6/UMU16Qn/=hCFhKZbqpr)8T0';
$config[AfterbuyExportConstantInterface::AFTERBUY_USER_ID] = 'petsdelideutschland';
$config[AfterbuyExportConstantInterface::AFTERBUY_URL] = 'https://api.afterbuy.de/afterbuy/ShopInterface.aspx?';
$config[AfterbuyExportConstantInterface::AFTERBUY_EMAILS] = [
    'ds@petsdeli.de',
    'raed.marji@project-a.com'
];
$config[AfterbuyExportConstantInterface::AFTERBUY_CONNECTION_TIMEOUT] = 120;

$config[GlossaryConfig::REMOTE_CSV_URL] = 'https://docs.google.com/spreadsheets/d/13InPAj1BWLFrvQX8h6uVIVJi-wNmTmUPd3cJXTfGp5U/pub?gid=0&single=true&output=csv';

$config[AdyenConfigConstants::ADYEN_PAYMENT_PROVIDER] = [

    AdyenConfigConstants::ADYEN_MODE => AdyenConfigConstants::ADYEN_MODE_TEST,

    AdyenConfigConstants::ADYEN_CREDENTIALS_AUTHENTICATION_WS_USER => 'ws@Company.PetsDeliRoseneck',
    AdyenConfigConstants::ADYEN_CREDENTIALS_AUTHENTICATION_WS_PASSWORD => 'CGjNNU2yaEMeLG4Mq8eqG',
    AdyenConfigConstants::ADYEN_CREDENTIALS_MERCHANT_ACCOUNT => 'PetsDeliRoseneckDE',
    AdyenConfigConstants::ADYEN_CREDENTIALS_HMAC_KEY => 'b06eb58e77e3124cacd570862c6b8499',
    AdyenConfigConstants::ADYEN_CREDENTIALS_HMAC_ALGORITHM => 'sha1',
    AdyenConfigConstants::ADYEN_CREDENTIALS_SKIN_CODE => 'KaYI8dwX',
    AdyenConfigConstants::ADYEN_CREDENTIALS_PUBLIC_KEY_CLIENT_SIDE_ENCRYPTION => '10001|A335386FB3B6B5BB4AA6CDC8AD5764BB6F20FE1087C8BC5FF8CCA1D6974E3D48D5967FCFD829BF74A1B0E12FCFF07D60DB02AE5225C49F7F4B054A4D7FADE8BCA6B7D23FA2E763746609706552E4D53D57F14A4DC937C92214B660FB9C3332C96EAB068E8436A6428A9AED8DBB4D1A5B3B15BA97927963CD6229210439293EBCC8E00C022EE2746C8F7E1F9C44271C8DC376AF4BC2448507A2DBF60401BFCCAA9AEEE65A43671C74BFBA89ED136DD8E8414F17C1EF5CBD3158E9BDA27095A6656E9C4C4FAF61F1B7FF7FED8C5BC971D460E106AF5007F606898175BC30BBD9C7AFD1E54A86584CFB9B38AF3A63B39AE61485DAB8B60ADB94A399005192450B75',

    AdyenConfigConstants::ADYEN_CONFIGURATION_HPP_PAYMENT_RETURN_URL => '/checkout/redirect-payment-return',
    AdyenConfigConstants::ADYEN_CONFIGURATION_HPP_PAYMENT_SUCCESS_ROUTE => 'checkout/success',
    AdyenConfigConstants::ADYEN_CONFIGURATION_HPP_PAYMENT_FAILURE_ROUTE => 'cart',
    AdyenConfigConstants::ADYEN_CONFIGURATION_HPP_PAYMENT_ABORTED_ROUTE => 'cart',
    AdyenConfigConstants::ADYEN_CONFIGURATION_HPP_PAYMENT_ERROR_ROUTE => 'home',
    AdyenConfigConstants::ADYEN_CONFIGURATION_ARE_API_PAYMENT_METHODS_ENABLED => true,
    AdyenConfigConstants::ADYEN_CONFIGURATION_ARE_HPP_PAYMENT_METHODS_ENABLED => true,
    AdyenConfigConstants::ADYEN_CONFIGURATION_IS_PAYMENT_SELECTION_ON_HPP => false,
    AdyenConfigConstants::ADYEN_CONFIGURATION_FETCH_HPP_PAYMENT_METHODS => false,
];

$config[SystemConfig::ZED_SHOW_EXCEPTION_STACK_TRACE] = false;

$config[SequenceNumberConstants::ENVIRONMENT_PREFIX] = "D";
