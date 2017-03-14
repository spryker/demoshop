<?php

use Monolog\Logger;
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
use Spryker\Shared\PriceCartConnector\PriceCartConnectorConstants;
use Spryker\Shared\Price\PriceConstants;
use Spryker\Shared\Propel\PropelConstants;
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

$CURRENT_STORE = Store::getInstance()->getStoreName();

// ---------- General environment
$config[KernelConstants::SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';
$config[ApplicationConstants::PROJECT_TIMEZONE] = 'UTC';
$config[SequenceNumberConstants::ENVIRONMENT_PREFIX]
    = $config[SalesConstants::ENVIRONMENT_PREFIX]
    = '';
$config[ApplicationConstants::ENABLE_WEB_PROFILER] = false;
$config[ApplicationConstants::YVES_TRUSTED_PROXIES] = [];

// ---------- Namespaces
$config[KernelConstants::PROJECT_NAMESPACE] = 'Pyz';
$config[KernelConstants::PROJECT_NAMESPACES] = [
    'Pyz',
];
$config[KernelConstants::CORE_NAMESPACES] = [
    'SprykerEco',
    'Spryker',
];

// ---------- Propel
$config[PropelConstants::ZED_DB_ENGINE_MYSQL] = PropelConfig::DB_ENGINE_MYSQL;
$config[PropelConstants::ZED_DB_ENGINE_PGSQL] = PropelConfig::DB_ENGINE_PGSQL;
$config[PropelConstants::ZED_DB_SUPPORTED_ENGINES] = [
    PropelConfig::DB_ENGINE_MYSQL => 'MySql',
    PropelConfig::DB_ENGINE_PGSQL => 'PostgreSql',
];
$config[PropelConstants::SCHEMA_FILE_PATH_PATTERN] = sprintf(
    '%s/*/src/*/Zed/*/Persistence/Propel/Schema/',
    $config[KernelConstants::SPRYKER_ROOT]
);
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = true;

// ---------- Authentication
$config[UserConstants::USER_SYSTEM_USERS] = [
    'yves_system',
];
// For a better performance you can turn off Zed authentication
$config[AuthConstants::AUTH_ZED_ENABLED]
    = $config[ZedRequestConstants::AUTH_ZED_ENABLED]
    = true;
$config[AuthConstants::AUTH_DEFAULT_CREDENTIALS] = [
    'yves_system' => [
        'rules' => [
            [
                'bundle' => '*',
                'controller' => 'gateway',
                'action' => '*',
            ],
        ],
        // Please replace this token for your project
        'token' => 'JDJ5JDEwJFE0cXBwYnVVTTV6YVZXSnVmM2l1UWVhRE94WkQ4UjBUeHBEWTNHZlFRTEd4U2F6QVBqejQ2',
    ],
];

// ---------- ACL
// ACL: Allow or disallow of urls for Zed Admin GUI for ALL users
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
// ACL: Allow or disallow of urls for Zed Admin GUI
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
// ACL: Special rules for specific users
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

// ---------- Elasticsearch
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

// ---------- Page search
$config[SearchConstants::FULL_TEXT_BOOSTED_BOOSTING_VALUE] = 3;
$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '';

// ---------- Twig
$config[TwigConstants::YVES_TWIG_OPTIONS] = [
    'cache' => sprintf('%s/data/%s//cache/Zed/twig', APPLICATION_ROOT_DIR, $CURRENT_STORE),
];
$config[TwigConstants::ZED_TWIG_OPTIONS] = [
    'cache' => sprintf('%s/data/%s//cache/Zed/twig', APPLICATION_ROOT_DIR, $CURRENT_STORE),
];

// ---------- Navigation
// The cache should always be activated. Refresh/build with CLI command: vendor/bin/console application:build-navigation-cache
$config[ZedNavigationConstants::ZED_NAVIGATION_CACHE_ENABLED] = true;

// ---------- Zed request
$config[ZedRequestConstants::TRANSFER_USERNAME] = 'yves';
$config[ZedRequestConstants::TRANSFER_PASSWORD] = 'o7&bg=Fz;nSslHBC';
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_FORWARD_ENABLED] = false;
$config[ZedRequestConstants::TRANSFER_DEBUG_SESSION_NAME] = 'XDEBUG_SESSION';

// ---------- KV storage
$config[StorageConstants::STORAGE_KV_SOURCE] = 'redis';
$config[StorageConstants::STORAGE_PERSISTENT_CONNECTION] = true;

// ---------- Session
$config[SessionConstants::YVES_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS_LOCKING;
$config[SessionConstants::YVES_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_HOUR;
$config[SessionConstants::YVES_SESSION_FILE_PATH] = session_save_path();
$config[SessionConstants::YVES_SESSION_PERSISTENT_CONNECTION] = $config[StorageConstants::STORAGE_PERSISTENT_CONNECTION];
$config[SessionConstants::ZED_SESSION_SAVE_HANDLER] = SessionConstants::SESSION_HANDLER_REDIS;
$config[SessionConstants::ZED_SESSION_TIME_TO_LIVE] = SessionConstants::SESSION_LIFETIME_1_HOUR;
$config[SessionConstants::ZED_SESSION_FILE_PATH] = session_save_path();
$config[SessionConstants::ZED_SESSION_PERSISTENT_CONNECTION] = $config[StorageConstants::STORAGE_PERSISTENT_CONNECTION];
$config[SessionConstants::SESSION_HANDLER_REDIS_LOCKING_TIMEOUT_MILLISECONDS] = 0;
$config[SessionConstants::SESSION_HANDLER_REDIS_LOCKING_RETRY_DELAY_MICROSECONDS] = 0;
$config[SessionConstants::SESSION_HANDLER_REDIS_LOCKING_LOCK_TTL_MILLISECONDS] = 0;

// ---------- Cookie
$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_NAME] = 'did';
$config[ApplicationConstants::YVES_COOKIE_DEVICE_ID_VALID_FOR] = '+5 year';
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_NAME] = 'vid';
$config[ApplicationConstants::YVES_COOKIE_VISITOR_ID_VALID_FOR] = '+30 minute';

// ---------- HTTP strict transport security
$config[ApplicationConstants::ZED_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED]
    = $config[ApplicationConstants::YVES_HTTP_STRICT_TRANSPORT_SECURITY_ENABLED]
    = false;
$config[ApplicationConstants::ZED_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG]
    = $config[ApplicationConstants::YVES_HTTP_STRICT_TRANSPORT_SECURITY_CONFIG]
    = [
        'max_age' => 31536000,
        'include_sub_domains' => true,
        'preload' => true,
    ];

// ---------- SSL
$config[ApplicationConstants::YVES_SSL_ENABLED] = false;
$config[ApplicationConstants::YVES_COMPLETE_SSL_ENABLED] = false;
$config[ApplicationConstants::YVES_SSL_EXCLUDED] = [
    'heartbeat' => '/heartbeat',
];
$config[ApplicationConstants::ZED_SSL_ENABLED] = false;
$config[ZedRequestConstants::ZED_API_SSL_ENABLED] = false;
$config[ApplicationConstants::ZED_SSL_EXCLUDED] = ['heartbeat/index'];

// ---------- Theme
$config[ApplicationConstants::YVES_THEME]
    = $config[CmsConstants::YVES_THEME]
    = 'default';

// ---------- Error handling
$config[ErrorHandlerConstants::YVES_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/public/Yves/errorpage/error.html';
$config[ErrorHandlerConstants::ZED_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/public/Yves/errorpage/error.html';
$config[ErrorHandlerConstants::ERROR_RENDERER] = WebHtmlErrorRenderer::class;
// Due to some deprecation notices we silence all deprecations for the time being
$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL & ~E_DEPRECATED & ~E_USER_DEPRECATED;
// To only log e.g. deprecations instead of throwing exceptions here use
//$config[ErrorHandlerConstants::ERROR_LEVEL] = E_ALL
//$config[ErrorHandlerConstants::ERROR_LEVEL_LOG_ONLY] = E_DEPRECATED | E_USER_DEPRECATED;

// ---------- Logging
$config[LogConstants::LOG_LEVEL] = Logger::INFO;
$config[LogConstants::LOG_FILE_PATH] = sprintf(
    '%s/data/%s/logs/application.log',
    APPLICATION_ROOT_DIR,
    $CURRENT_STORE
);

// ---------- Auto-loader
$config[KernelConstants::AUTO_LOADER_CACHE_FILE_NO_LOCK] = false;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_ENABLED] = false;
$config[KernelConstants::AUTO_LOADER_UNRESOLVABLE_CACHE_PROVIDER] = \Spryker\Shared\Kernel\ClassResolver\Cache\Provider\File::class;

// ---------- Dependency injector
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

// ---------- State machine (OMS)
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

// ---------- NewRelic
$config[NewRelicConstants::NEWRELIC_API_KEY] = null;

// ---------- Customer (should go into bundle configuration)
$config[CustomerConstants::CUSTOMER_SECURED_PATTERN] = '(^/login_check$|^/customer|^/wishlist)';
$config[CustomerConstants::CUSTOMER_ANONYMOUS_PATTERN] = '^/.*';

// ---------- Price (should go into bundle configuration)
$config[PriceConstants::DEFAULT_PRICE_TYPE]
    = $config[PriceCartConnectorConstants::DEFAULT_PRICE_TYPE]
    = 'DEFAULT';

// ---------- Taxes (should go into bundle configuration)
$config[TaxConstants::DEFAULT_TAX_RATE] = 19;

// ---------- Event journal (deprecated)
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
