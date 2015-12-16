<?php

use Pyz\Shared\Mail\MailConstants;
use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Auth\AuthConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\User\UserConstants;
use Spryker\Shared\Lumberjack\LumberjackConstants;
use Spryker\Shared\NewRelic\NewRelicConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\SequenceNumber\SequenceNumberConstants as SequenceNumberConfig;
use Spryker\Shared\Log\Config\DefaultLoggerConfig;
use Spryker\Shared\Payolution\PayolutionConstants;

$config[ApplicationConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];
$config[ApplicationConstants::CORE_NAMESPACES] = [
    'Spryker',
    'Spryker',
];

$config[ApplicationConstants::PROJECT_TIMEZONE] = 'UTC';
$config[ApplicationConstants::PROJECT_NAMESPACE] = 'Pyz';

$config[ApplicationConstants::ZED_TWIG_OPTIONS] = [
    'cache' => \Spryker\Shared\Library\DataDirectory::getLocalStoreSpecificPath('cache/Zed/twig'),
];

$config[ApplicationConstants::YVES_TWIG_OPTIONS] = [
    'cache' => \Spryker\Shared\Library\DataDirectory::getLocalStoreSpecificPath('cache/Yves/twig'),
];

$config[ApplicationConstants::ZED_DB_ENGINE] = 'mysql';

$config[ApplicationConstants::STORAGE_KV_SOURCE] = 'redis';

$config[ApplicationConstants::ELASTICA_PARAMETER__HOST] = 'localhost';
$config[ApplicationConstants::ELASTICA_PARAMETER__TRANSPORT] = 'http';
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = '10005';
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = 'page';

$config[ApplicationConstants::HOST_YVES]
    = $config[ApplicationConstants::HOST_STATIC_ASSETS]
    = $config[ApplicationConstants::HOST_STATIC_MEDIA]
    = $config[ApplicationConstants::HOST_SSL_YVES]
    = $config[ApplicationConstants::HOST_SSL_STATIC_ASSETS]
    = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA]
    = 'www.spryker.dev';

$config[ApplicationConstants::HOST_ZED_GUI]
    = $config[ApplicationConstants::HOST_ZED_API]
    = $config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'zed.spryker.dev';

$config[ApplicationConstants::LOG_LEVEL] = Monolog\Logger::INFO;

$config[ApplicationConstants::TRANSFER_USERNAME] = 'yves';
$config[ApplicationConstants::TRANSFER_PASSWORD] = 'o7&bg=Fz;nSslHBC';
$config[ApplicationConstants::TRANSFER_SSL] = false;
$config[ApplicationConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[ApplicationConstants::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

//$config[ApplicationConstants::ZED_LIBRARY_PASSWORD_ALGORITHM] = PASSWORD_BCRYPT;
//$config[ApplicationConstants::ZED_LIBRARY_PASSWORD_OPTIONS] = [];

$config[ApplicationConstants::YVES_STORAGE_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_HOUR;
$config[ApplicationConstants::YVES_STORAGE_SESSION_FILE_PATH] = session_save_path();

$config[ApplicationConstants::ZED_STORAGE_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_30_DAYS;
$config[ApplicationConstants::ZED_STORAGE_SESSION_COOKIE_NAME] = 'zed_session';
$config[ApplicationConstants::ZED_STORAGE_SESSION_FILE_PATH] = session_save_path();
$config[ApplicationConstants::ZED_SESSION_SAVE_HANDLER] = null;

$config[ApplicationConstants::ZED_SSL_ENABLED] = false;
$config[ApplicationConstants::ZED_API_SSL_ENABLED] = false;
$config[ApplicationConstants::ZED_SSL_EXCLUDED] = ['system/heartbeat'];

$config[ApplicationConstants::YVES_THEME] = 'demoshop';
$config[ApplicationConstants::YVES_TRUSTED_PROXIES] = [];
$config[ApplicationConstants::YVES_SSL_ENABLED] = false;
$config[ApplicationConstants::YVES_COMPLETE_SSL_ENABLED] = false;
$config[ApplicationConstants::YVES_SSL_EXCLUDED] = ['/monitoring/heartbeat'];

$config[ApplicationConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[ApplicationConstants::YVES_SESSION_NAME] = 'yves_session';
$config[ApplicationConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];

$config[ApplicationConstants::YVES_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/static/public/Yves/errorpage/error.html';
$config[ApplicationConstants::YVES_SHOW_EXCEPTION_STACK_TRACE] = true;
$config[ApplicationConstants::ZED_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/static/public/Yves/errorpage/error.html';
$config[ApplicationConstants::ZED_SHOW_EXCEPTION_STACK_TRACE] = true;

$config[CustomerConstants::CUSTOMER_SECURED_PATTERN] = '(^/login_check$|^/customer)';
$config[CustomerConstants::CUSTOMER_ANONYMOUS_PATTERN] = '^/.*';

$currentStore = \Spryker\Shared\Kernel\Store::getInstance()->getStoreName();
$config[ApplicationConstants::PROPEL] = [
    'database' => [
        'connections' => [
            'default' => [
                'adapter' => 'mysql',
                'dsn' => 'mysql:host=127.0.0.1;dbname=DE_development_zed',
                'user' => 'development',
                'password' => '',
                'settings' => [
                    'charset' => 'utf8',
                    'queries' => [
                        'utf8' => 'SET NAMES utf8 COLLATE utf8_unicode_ci, COLLATION_CONNECTION = utf8_unicode_ci, COLLATION_DATABASE = utf8_unicode_ci, COLLATION_SERVER = utf8_unicode_ci',
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
                'object' => '\Spryker\Zed\Propel\Business\Builder\ObjectBuilder',
            ],
         ],
    ],
    'paths' => [
        'phpDir' => APPLICATION_ROOT_DIR,
        'sqlDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Sql',
        'migrationDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Migration',
        'schemaDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Schema',
        'phpConfDir' => APPLICATION_ROOT_DIR . '/src/Orm/Propel/' . $currentStore . '/Config',
    ],
];

$config[ApplicationConstants::CLOUD_ENABLED] = false;
$config[ApplicationConstants::CLOUD_OBJECT_STORAGE_ENABLED] = false;

$config[ApplicationConstants::CLOUD_CDN_ENABLED] = false;

$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_PREFIX] = 'media';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTP] = '';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTPS] = '';

$config[ApplicationConstants::CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME] = '/images/products/';

$config[MailConstants::MAIL_PROVIDER_MANDRILL] = [
    'api-key' => '5hGEFy0SpJXIft1GSULiVw',
    'host' => 'smtp.mandrillapp.com',
    'port' => '587',
    'username' => 'fabian.wesner@spryker.com',
    'from_mail' => 'service@demoshop.de',
    'from_name' => 'Demoshop',
];

$config[CustomerConstants::SHOP_MAIL_FROM_EMAIL_NAME] = '';
$config[CustomerConstants::SHOP_MAIL_FROM_EMAIL_ADDRESS] = 'service@demoshop.de';

$config[CustomerConstants::SHOP_MAIL_REGISTRATION_TOKEN] = 'registration.token';
$config[CustomerConstants::SHOP_MAIL_REGISTRATION_SUBJECT] = 'registration.mail.subject';

$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORE_TOKEN] = 'password.restore';
$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORE_SUBJECT] = 'password.restore.mail.subject';

$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_TOKEN] = 'password.change.confirmation';
$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_SUBJECT] = 'password.change.confirmation.mail.subject';

$config[UserConstants::USER_SYSTEM_USERS] = [
    'yves_system',
];

$config[AuthConstants::AUTH_DEFAULT_CREDENTIALS] = [
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

$config[AclConstants::ACL_DEFAULT_RULES] = [
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

$config[AclConstants::ACL_USER_RULE_WHITELIST] = [
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

$config[AclConstants::ACL_DEFAULT_CREDENTIALS] = [
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

$config[ApplicationConstants::NAVIGATION_CACHE_ENABLED] = true;

$config[LumberjackConstants::COLLECTORS]['YVES'] = [
    '\Spryker\Shared\Lumberjack\Model\Collector\ServerDataCollector',
    '\Spryker\Shared\Lumberjack\Model\Collector\RequestDataCollector',
    '\Spryker\Shared\Lumberjack\Model\Collector\EnvironmentDataCollector',
    '\Spryker\Client\Lumberjack\YvesDataCollector',
];
$config[LumberjackConstants::WRITERS]['YVES'] = [
    '\Spryker\Shared\Lumberjack\Model\Writer\File',
];

$config[LumberjackConstants::COLLECTORS]['ZED'] = [
    '\Spryker\Shared\Lumberjack\Model\Collector\ServerDataCollector',
    '\Spryker\Shared\Lumberjack\Model\Collector\RequestDataCollector',
    '\Spryker\Shared\Lumberjack\Model\Collector\EnvironmentDataCollector',
];
$config[LumberjackConstants::WRITERS]['ZED'] = [
    '\Spryker\Shared\Lumberjack\Model\Writer\File',
];

$config[LumberjackConstants::COLLECTOR_OPTIONS] = [
    '\Spryker\Shared\Lumberjack\Model\Collector\RequestDataCollector' => [
        'param_blacklist' => ['cc', 'password'],
        'filtered_content' => '***FILTERED***',
    ],
];

$config[ApplicationConstants::PROPEL_DEBUG] = false;
$config[ApplicationConstants::SHOW_SYMFONY_TOOLBAR] = false;
$config[SequenceNumberConfig::ENVIRONMENT_PREFIX] = '';

$config[LumberjackConstants::WRITER_OPTIONS] = [
    '\Spryker\Shared\Lumberjack\Model\Writer\File' => ['log_path' => '/data/logs/development/DE/'],
];

$config[PayolutionConstants::TRANSACTION_GATEWAY_URL] = 'https://test.ctpe.net/frontend/payment.prc';
$config[PayolutionConstants::CALCULATION_GATEWAY_URL] = 'https://test-payment.payolution.com/payolution-payment/rest/request/v2';
$config[PayolutionConstants::TRANSACTION_SECURITY_SENDER] = '8a82941850cd6ba60150cdba275b0201';
$config[PayolutionConstants::TRANSACTION_USER_LOGIN] = '8a82941850cd6ba60150cdba275c0205';
$config[PayolutionConstants::TRANSACTION_USER_PASSWORD] = 'EANPb8wg';
$config[PayolutionConstants::CALCULATION_SENDER] = 'Spyker';
$config[PayolutionConstants::CALCULATION_USER_LOGIN] = 'spryker-installment';
$config[PayolutionConstants::CALCULATION_USER_PASSWORD] = '0mQzn5iqhr3idfZZjvsEPOrlDvT97Tg3M5d';
$config[PayolutionConstants::TRANSACTION_MODE] = 'CONNECTOR_TEST';
$config[PayolutionConstants::CALCULATION_MODE] = 'TEST';
$config[PayolutionConstants::TRANSACTION_CHANNEL_PRE_CHECK] = '8a82941850cd6ba60150cdc25e54028f';
$config[PayolutionConstants::TRANSACTION_CHANNEL_INVOICE] = '8a82941850cd6ba60150cdbf9af40280';
$config[PayolutionConstants::TRANSACTION_CHANNEL_INSTALLMENT] = '8a82941850cd6ba60150cdbf9af40280';
$config[PayolutionConstants::CALCULATION_CHANNEL] = 'spryker-installment';
$config[PayolutionConstants::MIN_ORDER_GRAND_TOTAL_INVOICE] = '500';
$config[PayolutionConstants::MAX_ORDER_GRAND_TOTAL_INVOICE] = '500000';
$config[PayolutionConstants::MIN_ORDER_GRAND_TOTAL_INSTALLMENT] = '500';
$config[PayolutionConstants::MAX_ORDER_GRAND_TOTAL_INSTALLMENT] = '500000';
$config[PayolutionConstants::PAYOLUTION_BCC_EMAIL] = 'invoices@payolution.com';

$config[NewRelicConstants::NEWRELIC_API_KEY] = null;

$config[DefaultLoggerConfig::DEFAULT_LOG_FILE_PATH] = APPLICATION_ROOT_DIR . '/data/DE/logs/application.log';
$config[DefaultLoggerConfig::DEFAULT_LOG_LEVEL] = Monolog\Logger::ERROR;
