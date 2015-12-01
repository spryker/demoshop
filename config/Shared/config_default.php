<?php

use PavFeature\Shared\MailchimpClient\MailchimpClientConfig;
use PavFeature\Shared\NewsletterDoiMailQueueConnector\NewsletterDoiMailQueueConnectorConfig;
use Pyz\Shared\Mail\MailConfig;
use Pyz\Shared\ProductFeed\ProductFeedConfig;
use SprykerFeature\Shared\Acl\AclConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;
use SprykerFeature\Shared\Auth\AuthConfig;
use SprykerFeature\Shared\Customer\CustomerConfig;
use SprykerFeature\Shared\DbDump\DbDumpConfig;
use SprykerFeature\Shared\ProductImage\ProductImageConfig;
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

use Pyz\Shared\CalculationCheckoutConnector\CalculationCheckoutConnectorConfig;
use PavFeature\Shared\OmsMailQueueConnector\OmsMailQueueConnectorConfig;

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
$config[SystemConfig::ZED_DB_PORT] = 5432;

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
$config[YvesConfig::YVES_SSL_ENABLED]
    = $config[YvesConfig::YVES_COMPLETE_SSL_ENABLED]
    = false;
$config[YvesConfig::YVES_SSL_EXCLUDED] = ['/system/heartbeat'];

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

$config[SystemConfig::CLOUD_ENABLED]
    = $config[SystemConfig::CLOUD_OBJECT_STORAGE_ENABLED]
    = $config[SystemConfig::CLOUD_CDN_ENABLED]
    = true;

$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_PREFIX] = 'media';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = 's3.eu-central-1.amazonaws.com/pd-prod-assets';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 's3.eu-central-1.amazonaws.com/pd-prod-assets';

$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_PREFIX] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_HTTP] = '';
$config[SystemConfig::CLOUD_CDN_STATIC_ASSETS_HTTPS] = '';

$config[SystemConfig::CLOUD_CDN_PRODUCT_IMAGES_PATH_NAME]
    = $config[ProductImageConfig::PRODUCT_IMAGE_IMAGE_URL_PREFIX]
    = 'images/products';


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
    [
        'bundle' => 'adyen',
        'controller' => 'notification',
        'action' => '*',
        'type' => 'allow',
    ]
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
    [
        'bundle' => 'adyen',
        'controller' => 'notification',
        'action' => '*',
        'type' => 'allow',
    ]
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
    'raed.marji@project-a.com'
];
$config[AfterbuyExportConstantInterface::AFTERBUY_CONNECTION_TIMEOUT] = 120;

$config[GlossaryConfig::REMOTE_CSV_URL] = 'https://docs.google.com/spreadsheets/d/13InPAj1BWLFrvQX8h6uVIVJi-wNmTmUPd3cJXTfGp5U/pub?gid=0&single=true&output=csv';

$config[AdyenConfigConstants::ADYEN_PAYMENT_PROVIDER] = [

    AdyenConfigConstants::ADYEN_MODE => AdyenConfigConstants::ADYEN_MODE_TEST,

    AdyenConfigConstants::ADYEN_CREDENTIALS_AUTHENTICATION_WS_USER_LIVE => '****WS-LIVE-USER*****',
    AdyenConfigConstants::ADYEN_CREDENTIALS_AUTHENTICATION_WS_PASSWORD_LIVE => '****WS-LIVE-PASSWORD*****',
    AdyenConfigConstants::ADYEN_CREDENTIALS_AUTHENTICATION_WS_USER_TEST => 'ws_899164@Company.PetsDeliRoseneck',
    AdyenConfigConstants::ADYEN_CREDENTIALS_AUTHENTICATION_WS_PASSWORD_TEST => 'BfT9ikp?NZXe!pN4E*VfBH*cz',
    AdyenConfigConstants::ADYEN_CREDENTIALS_MERCHANT_ACCOUNT => 'PetsDeliRoseneckDE',
    AdyenConfigConstants::ADYEN_CREDENTIALS_HMAC_KEY_LIVE => '****LIVE-HMAC-KEY*****',
    AdyenConfigConstants::ADYEN_CREDENTIALS_HMAC_KEY_TEST => 'adb63da5f4cfc9eb4d4c80857271eff3',
    AdyenConfigConstants::ADYEN_CREDENTIALS_HMAC_ALGORITHM => 'sha1',
    AdyenConfigConstants::ADYEN_CREDENTIALS_SKIN_CODE => 'iCafuNnP',
    AdyenConfigConstants::ADYEN_CREDENTIALS_PUBLIC_KEY_CLIENT_SIDE_ENCRYPTION_LIVE => '****LIVE-CLIENT-SIDE-ENCRYPTION-PUBLIC-KEY*****',
    AdyenConfigConstants::ADYEN_CREDENTIALS_PUBLIC_KEY_CLIENT_SIDE_ENCRYPTION_TEST => '10001|A42880E96B17B390FF021CD926C2A64DD76C908BBF5B3D0D3F503CC90AC379EAAEDF77BDD9DE89553474987DA8B92B0DB097DDA7C3D51A15AC83B1E03D4F728326F071FAE427867A7C41DC7C486275AA1F5FB57F0863FC4164C02112ACAD88BFA8469F85E8FB2069F5BBA7ADCBDAE3C0265522D06F8EAD22D8410F725EC42A1D64949149326A4C7FE1C50B33336FFC4F46308C99D0751B983A6D8A7559C77E2067226C2C0798DFB2EA4E2CD7582AFE5D4B7209F6368995360D513C51E57E698B8FBF3387C8200D4FB9080AA153ECCFF0333BFC23B58941CB28D10FF7E3F766FE77E94EF711B681984D4B349FC2CF0B27C699C6B91A3B780F8FFDAC811E1D5B71',

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

$config[SystemConfig::ZED_ERROR_PAGE] = APPLICATION_ROOT_DIR . '/static/public/Zed/errorpage/error.html';

$config[SequenceNumberConstants::ENVIRONMENT_PREFIX] = "D";

$config[MailchimpClientConfig::MAILCHIMP_API_KEY] = '49eccb87d7ba7432cf574df60e3d910d-us11';
$config[MailchimpClientConfig::MAILCHIMP_SUBSCRIBER_LIST_ID] = 'fc2fd7191f';

$config[NewsletterDoiMailQueueConnectorConfig::DOI_CONFIRMATION_TEMPLATE_NAME] = 'newsletter-doi-test-template';
$config[NewsletterDoiMailQueueConnectorConfig::DOI_CONFIRMATION_EMAIL_SUBJECT] = 'DOI confirmation';
$config[NewsletterDoiMailQueueConnectorConfig::DOI_CONFIRMATION_URL] = $config[SystemConfig::HOST_YVES] . '/newsletter/confirmation/';

$config[ProductFeedConfig::PRODUCT_FEED_FILE_NAME] = 'products.csv';

$config[ProductFeedConfig::PRODUCT_FEED_CSV_PARAMETERS] = [
    'delimiter' => ';',
    'encoding' => 'UTF-8',
    'enclosure' => '"'
];

$config[CalculationCheckoutConnectorConfig::MINIMUM_CHECKOUT_CART_VALUE] = 1500; // 15€

$config[OmsMailQueueConnectorConfig::ORDER_SEPA_RECEIVED_TEMPLATE_NAME] = 'sepa-order-received-test-template';
$config[OmsMailQueueConnectorConfig::ORDER_SEPA_RECEIVED_EMAIL_SUBJECT] = 'Order received';

$config[OmsMailQueueConnectorConfig::ORDER_PREPAYMENT_RECEIVED_TEMPLATE_NAME] = 'prepayment-order-received-test-template';
$config[OmsMailQueueConnectorConfig::ORDER_PREPAYMENT_RECEIVED_EMAIL_SUBJECT] = 'Order received';

$config[OmsMailQueueConnectorConfig::ORDER_CONFIRMATION_TEMPLATE_NAME] = 'order-confirmation';
$config[OmsMailQueueConnectorConfig::ORDER_CONFIRMATION_EMAIL_SUBJECT] = 'Order confirmation';
