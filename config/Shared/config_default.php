<?php

use Pyz\Shared\Mail\MailConstants;
use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Auth\AuthConstants;
use Spryker\Shared\CustomerMailConnector\CustomerMailConnectorConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\NewRelic\NewRelicConstants;
use Spryker\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\PriceCartConnector\PriceCartConnectorConstants;
use Spryker\Shared\Price\PriceConstants;
use Spryker\Shared\Sales\SalesConstants;
use Spryker\Shared\SequenceNumber\SequenceNumberConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\User\UserConstants;
use Spryker\Zed\Propel\PropelConfig;

$config[ApplicationConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];
$config[ApplicationConstants::CORE_NAMESPACES] = [
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

$config[ApplicationConstants::ZED_DB_ENGINE_MYSQL] = PropelConfig::DB_ENGINE_MYSQL;
$config[ApplicationConstants::ZED_DB_ENGINE_PGSQL] = PropelConfig::DB_ENGINE_PGSQL;
$config[ApplicationConstants::ZED_DB_SUPPORTED_ENGINES] = [
    PropelConfig::DB_ENGINE_MYSQL => 'MySql',
    PropelConfig::DB_ENGINE_PGSQL => 'PostgreSql'
];

$config[ApplicationConstants::STORAGE_KV_SOURCE] = 'redis';

$config[ApplicationConstants::ELASTICA_PARAMETER__HOST] = 'localhost';
$config[ApplicationConstants::ELASTICA_PARAMETER__TRANSPORT] = 'http';
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = '10005';

/**
 * Hostname(s) for Yves - Shop frontend
 * In production you probably use a CDN for static content
 */
$config[ApplicationConstants::HOST_YVES]
    = $config[ApplicationConstants::HOST_STATIC_ASSETS]
    = $config[ApplicationConstants::HOST_STATIC_MEDIA]
    = $config[ApplicationConstants::HOST_SSL_YVES]
    = $config[ApplicationConstants::HOST_SSL_STATIC_ASSETS]
    = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA]
    = 'www.spryker.dev';

/**
 * Hostname(s) for Zed - Shop frontend
 * In production you probably use HTTPS for Zed
 */
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

$config[ApplicationConstants::APPLICATION_SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';

$config[ApplicationConstants::YVES_STORAGE_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_HOUR;
$config[ApplicationConstants::YVES_STORAGE_SESSION_FILE_PATH] = session_save_path();

$config[ApplicationConstants::ZED_STORAGE_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_HOUR;
$config[ApplicationConstants::ZED_STORAGE_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED_GUI];
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
$config[ApplicationConstants::YVES_SESSION_NAME] = $config[ApplicationConstants::HOST_YVES];
$config[ApplicationConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];

$config[ApplicationConstants::YVES_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/static/public/Yves/errorpage/error.html';
$config[ApplicationConstants::YVES_SHOW_EXCEPTION_STACK_TRACE] = true;
$config[ApplicationConstants::ZED_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/static/public/Yves/errorpage/error.html';
$config[ApplicationConstants::ZED_SHOW_EXCEPTION_STACK_TRACE] = true;

$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_NAME] = 'did';
$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_VALID_FOR] = '+5 year';
$config[ApplicationConstants::YVES_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_NAME] = 'vid';
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_VALID_FOR] = '+30 minute';

$config[CustomerConstants::CUSTOMER_SECURED_PATTERN] = '(^/login_check$|^/customer)';
$config[CustomerConstants::CUSTOMER_ANONYMOUS_PATTERN] = '^/.*';

$currentStore = \Spryker\Shared\Kernel\Store::getInstance()->getStoreName();
$config[ApplicationConstants::PROPEL_SHOW_EXTENDED_EXCEPTION] = false;

$config[ApplicationConstants::CLOUD_ENABLED] = false;
$config[ApplicationConstants::CLOUD_OBJECT_STORAGE_ENABLED] = false;
$config[ApplicationConstants::CLOUD_CDN_ENABLED] = false;
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_PREFIX] = 'media';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTP] = '';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTPS] = '';
$config[ApplicationConstants::CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME] = '/images/products/';

$config[MailConstants::MAIL_PROVIDER_MANDRILL] = [
    'api-key' => '',
    'host' => 'smtp.mandrillapp.com',
    'port' => '587',
    'username' => '',
    'from_mail' => 'john.doe@spryker.com',
    'from_name' => 'John Doe',
];

$config[PriceConstants::DEFAULT_PRICE_TYPE] =
    $config[PriceCartConnectorConstants::DEFAULT_PRICE_TYPE] = 'DEFAULT';

$config[CustomerConstants::MERGE_LANGUAGE_HANDLEBARS] =
    $config[MailConstants::MERGE_LANGUAGE_HANDLEBARS] =
    $config[NewsletterConstants::MERGE_LANGUAGE_HANDLEBARS] =
    $config[CustomerMailConnectorConstants::MERGE_LANGUAGE_HANDLEBARS] = 'handlebars';

$config[CustomerConstants::SHOP_MAIL_FROM_EMAIL_NAME] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_FROM_EMAIL_NAME] = '';

$config[CustomerConstants::SHOP_MAIL_FROM_EMAIL_ADDRESS] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_FROM_EMAIL_ADDRESS] = 'john.doe@spryker.com';

$config[CustomerConstants::SHOP_MAIL_REGISTRATION_TOKEN] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_REGISTRATION_TOKEN] = 'registration.token';

$config[CustomerConstants::SHOP_MAIL_REGISTRATION_SUBJECT] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_REGISTRATION_SUBJECT] = 'registration.mail.subject';

$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORE_TOKEN] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_PASSWORD_RESTORE_TOKEN] = 'password.restore';

$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORE_SUBJECT] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_PASSWORD_RESTORE_SUBJECT] = 'password.restore.mail.subject';

$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_TOKEN] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_TOKEN] = 'password.change.confirmation';

$config[CustomerConstants::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_SUBJECT] =
    $config[CustomerMailConnectorConstants::SHOP_MAIL_PASSWORD_RESTORED_CONFIRMATION_SUBJECT] = 'password.change.confirmation.mail.subject';

$config[UserConstants::USER_SYSTEM_USERS] = [
    'yves_system',
];

/** For a better performance you can turn off Zed authentication */
$config[AuthConstants::AUTH_ZED_ENABLED] = true;

$config[AuthConstants::AUTH_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                'bundle' => '*',
                'controller' => 'gateway',
                'action' => '*',
            ],
        ],
        'token' => 'JDJ5JDEwJFE0cXBwYnVVTTV6YVZXSnVmM2l1UWVhRE94WkQ4UjBUeHBEWTNHZlFRTEd4U2F6QVBqejQ2', // Please replace this token for your project
    ],
];

/**
 * ACL: Allow or disallow of urls for Zed Admin GUI for ALL users
 */
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

/**
 * ACL: Allow or disallow of urls for Zed Admin GUI
 */
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

/**
 * ACL: Special rules for specific users
 */
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

/**
 * Zed Navigation Cache
 * The cache should always be activated. Refresh/build with CLI command:
 * vendor/bin/console application:build-navigation-cache
 */
$config[ApplicationConstants::NAVIGATION_CACHE_ENABLED] = true;

$config[EventJournalConstants::COLLECTORS]['YVES'] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Collector\\ServerDataCollector',
    '\\Spryker\\Shared\\EventJournal\\Model\\Collector\\RequestDataCollector',
    '\\Spryker\\Shared\\EventJournal\\Model\\Collector\\EnvironmentDataCollector',
    '\\Pyz\\Yves\\EventJournal\\Collector\\YvesDataCollector',
];
$config[EventJournalConstants::LOCK_OPTIONS][EventJournalConstants::NO_LOCK] = false;
$config[EventJournalConstants::WRITERS]['YVES'] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Writer\\File',
];

$config[EventJournalConstants::COLLECTORS]['ZED'] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Collector\\ServerDataCollector',
    '\\Spryker\\Shared\\EventJournal\\Model\\Collector\\RequestDataCollector',
    '\\Spryker\\Shared\\EventJournal\\Model\\Collector\\EnvironmentDataCollector',
];
$config[EventJournalConstants::WRITERS]['ZED'] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Writer\\File',
];

$config[EventJournalConstants::FILTERS]['ZED'] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Filter\\RecursiveFieldFilter',
];

$config[EventJournalConstants::FILTERS]['YVES'] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Filter\\RecursiveFieldFilter',
];

$config[EventJournalConstants::FILTER_OPTIONS] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Filter\\RecursiveFieldFilter' => [
        'filter_pattern' => [
            ['registerForm', 'password', 'first'],
            ['registerForm', 'password', 'second'],
            ['_password'],
            ['transfer_data', 'login', 'password'],
        ],
        'filtered_string' => '***'
    ],
];

$config[EventJournalConstants::WRITER_OPTIONS] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Writer\\File' => [
        'log_path' => APPLICATION_ROOT_DIR . '/data/DE/logs/',
    ],
];

$config[ApplicationConstants::PROPEL_DEBUG] = false;
$config[ApplicationConstants::SHOW_SYMFONY_TOOLBAR] = false;
$config[SequenceNumberConstants::ENVIRONMENT_PREFIX]
    = $config[SalesConstants::ENVIRONMENT_PREFIX]
    = '';

/**
 * Payolution Testdata - You can use this until you have an own account.
 */
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

$config[LogConstants::LOG_FILE_PATH] = APPLICATION_ROOT_DIR . '/data/DE/logs/application.log';

$config[ApplicationConstants::ERROR_LEVEL] = E_ALL;
