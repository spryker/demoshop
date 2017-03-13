<?php

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;


// ---------- Yves host
$yvesHost = getenv('YVES_HOST');
$yvesProtocol = getenv('YVES_HOST_PROTOCOL'); //'http://'

$config[ApplicationConstants::HOST_YVES] = $yvesHost;

$config[ApplicationConstants::BASE_URL_YVES]
    = $config[ProductManagementConstants::BASE_URL_YVES]
    = $config[PayoneConstants::BASE_URL_YVES]
    = $config[PayolutionConstants::BASE_URL_YVES]
    = $config[NewsletterConstants::BASE_URL_YVES]
    = $config[CustomerConstants::BASE_URL_YVES]
    = sprintf(
    '%s%s%s',
    $yvesProtocol,
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_YVES]
);

$config[ApplicationConstants::BASE_URL_SSL_YVES]
    = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_SSL_YVES]
);


// ---------- Zed host
$zedHost = getenv('ZED_HOST');
$zedProtocol = getenv('ZED_HOST_PROTOCOL'); //'http://'

$config[ApplicationConstants::HOST_ZED]
    = $config[ZedRequestConstants::HOST_ZED_API]
    = $zedHost;

$config[ApplicationConstants::BASE_URL_ZED]
    = $config[ZedRequestConstants::BASE_URL_ZED_API]
    = sprintf(
    '%s%s%s',
    $zedProtocol,
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_ZED]
);

$config[ZedRequestConstants::BASE_URL_SSL_ZED_API]
    = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_SSL_ZED]
);


// ---------- Assets
$config[ApplicationConstants::BASE_URL_STATIC_ASSETS]
    = $config[ApplicationConstants::BASE_URL_STATIC_MEDIA]
    = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS]
    = $config[ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA]
    = $config[ApplicationConstants::BASE_URL_SSL_YVES];


// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];


// ---------- Jenkins
$config[SetupConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';


// ---------- Payone
$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_SUCCESS_URL] = sprintf(
    '%s/checkout/success/',
    $config[ApplicationConstants::BASE_URL_YVES]
);
$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_ERROR_URL] = sprintf(
    '%s/checkout/index/',
    $config[ApplicationConstants::BASE_URL_YVES]
);
$config[PayoneConstants::PAYONE][PayoneConstants::PAYONE_REDIRECT_BACK_URL] = sprintf(
    '%s/checkout/regular-redirect-payment-cancellation/',
    $config[ApplicationConstants::BASE_URL_YVES]
);


// ---------- Elasticsearch
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = 'de_search';


// ---------- Email
$config[MailConstants::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':1080';


// ---------- RabbitMQ
$config[ApplicationConstants::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[ApplicationConstants::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] = '/DE_development_zed';


// ---------- Event journal
$config[EventJournalConstants::WRITER_OPTIONS] = [
    \Spryker\Shared\EventJournal\Model\Writer\File::class => ['log_path' => APPLICATION_ROOT_DIR . '/data/DE/logs/'],
];
