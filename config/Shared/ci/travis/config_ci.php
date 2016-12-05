<?php

use Pyz\Shared\Mail\MailConstants;
use Pyz\Yves\Application\YvesBootstrap;
use Pyz\Zed\Application\Communication\ZedBootstrap;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Ratepay\RatepayConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Storage\StorageConstants;
use Spryker\Shared\Testify\TestifyConstants;

$config[PropelConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$config[PropelConstants::ZED_DB_USERNAME] = 'postgres';
$config[PropelConstants::ZED_DB_PASSWORD] = '';
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_test_zed';
$config[PropelConstants::ZED_DB_HOST] = '127.0.0.1';
$config[PropelConstants::ZED_DB_PORT] = 5432;
$config[PropelConstants::USE_SUDO_TO_MANAGE_DATABASE] = false;

$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = 'de_search_test';
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT] = '9200';
$config[ApplicationConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

$config[SearchConstants::SEARCH_INDEX_NAME_SUFFIX] = '_test';

$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = 'de_search';
$config[ApplicationConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE]
    = $config[CollectorConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE]
    = $config[SearchConstants::ELASTICA_PARAMETER__DOCUMENT_TYPE]
    = 'page';
$config[ApplicationConstants::ELASTICA_PARAMETER__PORT]
    = $config[SearchConstants::ELASTICA_PARAMETER__PORT]
    = '9200';

$yvesHost = 'www.de.spryker.dev';
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;
$config[ApplicationConstants::HOST_YVES] = 'http://' . $yvesHost;
$config[ApplicationConstants::HOST_STATIC_ASSETS] = $config[ApplicationConstants::HOST_STATIC_MEDIA] = $yvesHost;

$config[ApplicationConstants::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[ApplicationConstants::HOST_SSL_STATIC_ASSETS] = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.de.spryker.dev:80';
$config[ApplicationConstants::HOST_ZED_GUI]
    = 'http://' . $zedHost;
$config[ApplicationConstants::HOST_ZED_API] = $zedHost;
$config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.de.spryker.dev';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.de.spryker.dev';

$config[ApplicationConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';
$config[MailConstants::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':1080';

/* RabbitMQ */
$config[ApplicationConstants::ZED_RABBITMQ_HOST] = 'localhost';
$config[ApplicationConstants::ZED_RABBITMQ_PORT] = '5672';
$config[ApplicationConstants::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[ApplicationConstants::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] = '/DE_development_zed';

$config[ApplicationConstants::JENKINS_DIRECTORY] = APPLICATION_ROOT_DIR . '/shared/data/common/jenkins';

$config[StorageConstants::STORAGE_REDIS_PROTOCOL] = 'tcp';
$config[StorageConstants::STORAGE_REDIS_HOST] = '127.0.0.1';
$config[StorageConstants::STORAGE_REDIS_PORT] = '6379';
$config[StorageConstants::STORAGE_REDIS_PASSWORD] = '';
$config[StorageConstants::STORAGE_REDIS_DATABASE] = 3;

$config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL] = $config[StorageConstants::STORAGE_REDIS_PROTOCOL];
$config[SessionConstants::YVES_SESSION_REDIS_HOST] = $config[StorageConstants::STORAGE_REDIS_HOST];
$config[SessionConstants::YVES_SESSION_REDIS_PORT] = $config[StorageConstants::STORAGE_REDIS_PORT];
$config[SessionConstants::YVES_SESSION_REDIS_PASSWORD] = $config[StorageConstants::STORAGE_REDIS_PASSWORD];
$config[SessionConstants::YVES_SESSION_REDIS_DATABASE] = 1;

$config[SessionConstants::ZED_SESSION_REDIS_PROTOCOL] = $config[SessionConstants::YVES_SESSION_REDIS_PROTOCOL];
$config[SessionConstants::ZED_SESSION_REDIS_HOST] = $config[SessionConstants::YVES_SESSION_REDIS_HOST];
$config[SessionConstants::ZED_SESSION_REDIS_PORT] = $config[SessionConstants::YVES_SESSION_REDIS_PORT];
$config[SessionConstants::ZED_SESSION_REDIS_PASSWORD] = $config[SessionConstants::YVES_SESSION_REDIS_PASSWORD];
$config[SessionConstants::ZED_SESSION_REDIS_DATABASE] = 2;

$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_MODE => '',
];

$config[SessionConstants::SESSION_IS_TEST] = true;

$config[ApplicationConstants::APPLICATION_SPRYKER_ROOT] = APPLICATION_ROOT_DIR . '/vendor/spryker/spryker/Bundles';

$config[MailConstants::MAIL_PROVIDER_MANDRILL] = [
    'api-key' => getenv('MAIL_PROVIDER_MANDRILL_API_KEY'),
    'host' => 'smtp.mandrillapp.com',
    'port' => '587',
    'username' => 'John Doe',
    'from_mail' => 'john.doe@spryker.com',
    'from_name' => 'Spryker Demoshop',
];

$config[PayoneConstants::PAYONE] = [
    PayoneConstants::PAYONE_CREDENTIALS_ENCODING => 'UTF-8',
    PayoneConstants::PAYONE_CREDENTIALS_KEY => getenv('PAYONE_CREDENTIALS_KEY'),
    PayoneConstants::PAYONE_CREDENTIALS_MID => getenv('PAYONE_CREDENTIALS_MID'),
    PayoneConstants::PAYONE_CREDENTIALS_AID => getenv('PAYONE_CREDENTIALS_AID'),
    PayoneConstants::PAYONE_CREDENTIALS_PORTAL_ID => getenv('PAYONE_CREDENTIALS_PORTAL_ID'),
    PayoneConstants::PAYONE_PAYMENT_GATEWAY_URL => 'https://api.pay1.de/post-gateway/',
    PayoneConstants::PAYONE_REDIRECT_SUCCESS_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/success/',
    PayoneConstants::PAYONE_REDIRECT_ERROR_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/index/',
    PayoneConstants::PAYONE_REDIRECT_BACK_URL => $config[ApplicationConstants::HOST_YVES] . '/checkout/regular-redirect-payment-cancellation/',
    PayoneConstants::PAYONE_MODE => '',
];

$config[PayolutionConstants::TRANSACTION_GATEWAY_URL] = 'https://test.ctpe.net/frontend/payment.prc';
$config[PayolutionConstants::CALCULATION_GATEWAY_URL] = 'https://test-payment.payolution.com/payolution-payment/rest/request/v2';
$config[PayolutionConstants::TRANSACTION_SECURITY_SENDER] = '8a82941850cd6ba60150cdba275b0201';
$config[PayolutionConstants::TRANSACTION_USER_LOGIN] = '8a82941850cd6ba60150cdba275c0205';
$config[PayolutionConstants::TRANSACTION_USER_PASSWORD] = 'EANPb8wg';
$config[PayolutionConstants::CALCULATION_SENDER] = 'Spryker';
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

$config[RatepayConstants::PROFILE_ID] = '';
$config[RatepayConstants::SECURITY_CODE] = '';
$config[RatepayConstants::SNIPPET_ID] = 'ratepay';
$config[RatepayConstants::SHOP_ID] = '';
$config[RatepayConstants::SYSTEM_ID] = 'Spryker ' . $config[ApplicationConstants::HOST_YVES];
$config[RatepayConstants::API_URL] = 'https://gateway-int.ratepay.com/api/xml/1_0';

$config[TestifyConstants::BOOTSTRAP_CLASS_YVES] = YvesBootstrap::class;
$config[TestifyConstants::BOOTSTRAP_CLASS_ZED] = ZedBootstrap::class;
