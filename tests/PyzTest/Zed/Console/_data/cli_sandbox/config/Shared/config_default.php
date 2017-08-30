<?php

use Monolog\Logger;
use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Acl\AclConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Auth\AuthConstants;
use Spryker\Shared\Cms\CmsConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\ErrorHandler\ErrorHandlerConstants;
use Spryker\Shared\ErrorHandler\ErrorRenderer\WebHtmlErrorRenderer;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\Log\LogConstants;
use Spryker\Shared\NewRelic\NewRelicConstants;
use Spryker\Shared\Oms\OmsConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Price\PriceConstants;
use Spryker\Shared\PriceCartConnector\PriceCartConnectorConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Shared\Sales\SalesConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\SequenceNumber\SequenceNumberConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\Tax\TaxConstants;
use Spryker\Shared\Twig\TwigConstants;
use Spryker\Shared\User\UserConstants;
use Spryker\Shared\ZedNavigation\ZedNavigationConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;
use Spryker\Zed\DummyPayment\DummyPaymentConfig;
use Spryker\Zed\Oms\OmsConfig;
use Spryker\Zed\Propel\PropelConfig;

$config[KernelConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];

$config[KernelConstants::CORE_NAMESPACES] = [
    'SprykerEco',
    'Spryker',
];

$config[ApplicationConstants::PROJECT_TIMEZONE] = 'UTC';
$config[KernelConstants::PROJECT_NAMESPACE] = 'Pyz';

$config[TwigConstants::ZED_TWIG_OPTIONS] = [
    'cache' => APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Zed/twig',
];

$config[TwigConstants::YVES_TWIG_OPTIONS] = [
    'cache' => APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Yves/twig',
];

$config[TwigConstants::YVES_PATH_CACHE_FILE] = APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Yves/twig/.pathCache';
$config[TwigConstants::ZED_PATH_CACHE_FILE] = APPLICATION_ROOT_DIR . '/data/' . Store::getInstance()->getStoreName() . '/cache/Zed/twig/.pathCache';

$config[PropelConstants::ZED_DB_ENGINE_MYSQL] = PropelConfig::DB_ENGINE_MYSQL;
$config[PropelConstants::ZED_DB_ENGINE_PGSQL] = PropelConfig::DB_ENGINE_PGSQL;
$config[PropelConstants::ZED_DB_SUPPORTED_ENGINES] = [
    PropelConfig::DB_ENGINE_MYSQL => 'MySql',
    PropelConfig::DB_ENGINE_PGSQL => 'PostgreSql',
];

/**
 * Elasticsearch settings
 */
$config[ApplicationConstants::ELASTICA_PARAMETER__HOST]
    = $config[SearchConstants::ELASTICA_PARAMETER__HOST]
    = 'localhost';
$config[ApplicationConstants::ELASTICA_PARAMETER__TRANSPORT]
    = $config[SearchConstants::ELASTICA_PARAMETER__TRANSPORT]
    = 'http';
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT]
    = $config[SearchConstants::ELASTICA_PARAMETER__PORT]
    = '10005';
$config[ApplicationConstants::ELASTICA_PARAMETER__AUTH_HEADER]
    = $config[SearchConstants::ELASTICA_PARAMETER__AUTH_HEADER]
    = '';
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = null; // Store related config
$config[ApplicationConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE]
    = $config[CollectorConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE]
    = $config[SearchConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE]
    = 'page';

/**
 * Page search settings
 */
$config[SearchConstants::FULL_TEXT_BOOSTED_BOOSTING_VALUE] = 3;
$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '';

/**
 * Hostname(s) for Yves - Shop frontend
 * In production you probably use a CDN for static content
 */
$config[ApplicationConstants::HOST_YVES]
    = $config[ProductManagementConstants::HOST_YVES]
    = $config[PayolutionConstants::HOST_YVES]
    = $config[NewsletterConstants::HOST_YVES]
    = $config[CustomerConstants::HOST_YVES]
    = $config[ApplicationConstants::HOST_STATIC_ASSETS]
    = $config[ApplicationConstants::HOST_STATIC_MEDIA]
    = $config[ApplicationConstants::HOST_SSL_YVES]
    = $config[ApplicationConstants::HOST_SSL_STATIC_ASSETS]
    = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA]
    = 'www.de.project.local';

/**
 * Hostname(s) for Zed - Shop frontend
 * In production you probably use HTTPS for Zed
 */
$config[ApplicationConstants::HOST_ZED_GUI]
    = $config[ApplicationConstants::HOST_ZED_API]
    = $config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'zed.de.project.local';

$config[ApplicationConstants::YVES_TRUSTED_HOSTS] = [];

$config[ApplicationConstants::ZED_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED] =
    $config[ApplicationConstants::YVES_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED] = false;

$config[ApplicationConstants::ZED_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG] =
    $config[ApplicationConstants::YVES_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG] = [
    'max_age' => 31536000,
    'include_sub_domains' => true,
    'preload' => true,
    ];

$config[LogConstants::LOG_LEVEL] = Logger::INFO;

$config[ZedRequestConstants::TRANSFER_USERNAME] = 'yves';
$config[ZedRequestConstants::TRANSFER_PASSWORD] = 'o7&bg=Fz;nSslHBC';

$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';

$config[StorageConstants::STORAGE_KV_SOURCE] = 'redis';
$config[StorageConstants::STORAGE_PERSISTENT_CONNECTION] = true;

$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS_LOCKING;
$config[SessionConstants::YVES_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_HOUR;
$config[SessionConstants::YVES_SESSION_FILE_PATH] = session_save_path();
$config[SessionConstants::YVES_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_PERSISTENT_CONNECTION] = $config[StorageConstants::STORAGE_PERSISTENT_CONNECTION];

$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[SessionConstants::ZED_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_HOUR;
$config[SessionConstants::ZED_SESSION_FILE_PATH] = session_save_path();
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED_GUI];
$config[SessionConstants::ZED_SESSION_PERSISTENT_CONNECTION] = $config[StorageConstants::STORAGE_PERSISTENT_CONNECTION];

$config[SessionConstants::SESSION_HANDLER_REDIS_LOCKING_TIMEOUT_MILLISECONDS] = 0;
$config[SessionConstants::SESSION_HANDLER_REDIS_LOCKING_RETRY_DELAY_MICROSECONDS] = 0;
$config[SessionConstants::SESSION_HANDLER_REDIS_LOCKING_LOCK_TTL_MILLISECONDS] = 0;

$config[ApplicationConstants::ZED_SSL_ENABLED] = false;
$config[ZedRequestConstants::ZED_API_SSL_ENABLED] = false;
$config[ApplicationConstants::ZED_SSL_EXCLUDED] = ['heartbeat/index'];

$config[TwigConstants::YVES_THEME]
    = $config[CmsConstants::YVES_THEME] = 'default';

$config[ApplicationConstants::YVES_TRUSTED_PROXIES] = [];
$config[ApplicationConstants::YVES_SSL_ENABLED] = false;
$config[ApplicationConstants::YVES_COMPLETE_SSL_ENABLED] = false;
$config[ApplicationConstants::YVES_SSL_EXCLUDED] = [
    'heartbeat' => '/heartbeat',
];

$config[ErrorHandlerConstants::YVES_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/public/Yves/errorpage/error.html';
$config[ErrorHandlerConstants::ZED_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/public/Yves/errorpage/error.html';
$config[ErrorHandlerConstants::ERROR_RENDERER] = WebHtmlErrorRenderer::class;

$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_NAME] = 'did';
$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_VALID_FOR] = '+5 year';
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_NAME] = 'vid';
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_VALID_FOR] = '+30 minute';

$config[CustomerConstants::CUSTOMER_SECURED_PATTERN] = '(^/login_check$|^/customer|^/wishlist)';
$config[CustomerConstants::CUSTOMER_ANONYMOUS_PATTERN] = '^/.*';

$currentStore = Store::getInstance()->getStoreName();

$config[ApplicationConstants::CLOUD_ENABLED] = false;
$config[ApplicationConstants::CLOUD_OBJECT_STORAGE_ENABLED] = false;
$config[ApplicationConstants::CLOUD_CDN_ENABLED] = false;
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_PREFIX] = 'media';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTP] = '';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTPS] = '';
$config[ApplicationConstants::CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME] = '/images/products/';

$config[PriceConstants::DEFAULT_PRICE_TYPE] =
    $config[PriceCartConnectorConstants::DEFAULT_PRICE_TYPE] = 'DEFAULT';

$config[UserConstants::USER_SYSTEM_USERS] = [
    'yves_system',
];

/** For a better performance you can turn off Zed authentication */
$config[AuthConstants::AUTH_ZED_ENABLED]
    = $config[ZedRequestConstants::AUTH_ZED_ENABLED] = true;

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
        'bundle' => 'heartbeat',
        'controller' => 'index',
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
        'bundle' => 'heartbeat',
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
$config[ZedNavigationConstants::ZED_NAVIGATION_CACHE_ENABLED] = true;

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
        'filtered_string' => '***',
    ],
];

$config[EventJournalConstants::WRITER_OPTIONS] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Writer\\File' => [
        'log_path' => APPLICATION_ROOT_DIR . '/data/DE/logs/',
    ],
];

$config[SequenceNumberConstants::ENVIRONMENT_PREFIX]
    = $config[SalesConstants::ENVIRONMENT_PREFIX]
    = '';

$config[NewRelicConstants::NEWRELIC_API_KEY] = null;

// Due to some deprecation notices we silence all deprecations for the time being
$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED;

// To only log e.g. deprecations instead of throwing exceptions here use
//$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL
//$config[ErrorHandlerConstants::ERROR_LEVEL_LOG_ONLY] = E_DEPRECATED | E_USER_DEPRECATED;

$config[KernelConstants::AUTO_LOADER_CACHE_FILE_NO_LOCK] = false;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = false;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_PROVIDER] = \Spryker\Shared\Kernel\ClassResolver\Cache\Provider\File::class;
$config[ApplicationConstants::ENABLE_WEB_PROFILER] = false;

$config[PropelConstants::ZED_DB_ENGINE_MYSQL] = PropelConfig::DB_ENGINE_MYSQL;
$config[PropelConstants::ZED_DB_ENGINE_PGSQL] = PropelConfig::DB_ENGINE_PGSQL;
$config[PropelConstants::ZED_DB_SUPPORTED_ENGINES] = [
    PropelConfig::DB_ENGINE_MYSQL => 'MySql',
    PropelConfig::DB_ENGINE_PGSQL => 'PostgreSql',
];
$config[PropelConstants::SCHEMA_FILE_PATH_PATTERN] = APPLICATION_VENDOR_DIR . '/*/*/src/*/Zed/*/Persistence/Propel/Schema/';
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = true;

$config[KernelConstants::DEPENDENCY_INJECTOR_YVES] = [
    'Checkout' => [
        'DummyPayment',
    ],
];

$config[KernelConstants::DEPENDENCY_INJECTOR_ZED] = [
    'Payment' => [
        'DummyPayment',
    ],
    'Oms' => [
        'DummyPayment',
    ],
];

$config[OmsConstants::PROCESS_LOCATION] = [
    OmsConfig::DEFAULT_PROCESS_LOCATION,
    $config[KernelConstants::SPRYKER_ROOT] . '/DummyPayment/config/Zed/Oms',
];

$config[OmsConstants::ACTIVE_PROCESSES] = [
    'DummyPayment01',
];

$config[SalesConstants::PAYMENT_METHOD_STATEMACHINE_MAPPING] = [
    DummyPaymentConfig::PAYMENT_METHOD_INVOICE => 'DummyPayment01',
    DummyPaymentConfig::PAYMENT_METHOD_CREDIT_CARD => 'DummyPayment01',
];

$config[TaxConstants::DEFAULT_TAX_RATE] = 19;

$config[QueueConstants::QUEUE_SERVER_ID] = (gethostname()) ?: php_uname('n');
$config[QueueConstants::QUEUE_WORKER_INTERVAL_MILLISECONDS] = 10000;
$config[QueueConstants::QUEUE_WORKER_MAX_THRESHOLD_SECONDS] = 59;

/*
 * Queues can have different adapters and maximum worker number
 * QUEUE_ADAPTER_CONFIGURATION can have the array like this as an example:
 *
 *   'mailQueue' => [
 *       QueueConfig::CONFIG_QUEUE_ADAPTER => \Spryker\Client\RabbitMq\Model\RabbitMqAdapter::class,
 *       QueueConfig::CONFIG_MAX_WORKER_NUMBER => 5
 *   ],
 *
 */
$config[QueueConstants::QUEUE_ADAPTER_CONFIGURATION] = [];
