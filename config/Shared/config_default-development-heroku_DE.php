<?php

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;
use SprykerEco\Shared\Payone\PayoneConstants;

// ---------- Yves host
$ENV_PROTOCOL_YVES = getenv('YVES_HOST_PROTOCOL'); //'http://'
$ENV_HOST_YVES = getenv('YVES_HOST');
$config[ApplicationConstants::HOST_YVES] = $ENV_HOST_YVES;
$config[ApplicationConstants::PORT_YVES] = '';
$config[ApplicationConstants::PORT_SSL_YVES] = '';
$config[ApplicationConstants::BASE_URL_YVES] = sprintf(
    '%s%s%s',
    $ENV_PROTOCOL_YVES,
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_YVES]
);
$config[ApplicationConstants::BASE_URL_SSL_YVES] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::PORT_SSL_YVES]
);
$config[ProductManagementConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
//$config[PayoneConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[PayolutionConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[NewsletterConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];
$config[CustomerConstants::BASE_URL_YVES] = $config[ApplicationConstants::BASE_URL_YVES];

// ---------- Zed host
$ENV_PROTOCOL_ZED = getenv('ZED_HOST_PROTOCOL'); //'http://'
$ENV_HOST_ZED = getenv('ZED_HOST');
$config[ApplicationConstants::HOST_ZED] = $ENV_HOST_ZED;
$config[ApplicationConstants::PORT_ZED] = '';
$config[ApplicationConstants::PORT_SSL_ZED] = '';
$config[ZedRequestConstants::HOST_ZED_API] = $ENV_HOST_ZED;
$config[ApplicationConstants::BASE_URL_ZED] = sprintf(
    '%s%s%s',
    $ENV_PROTOCOL_ZED,
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_ZED]
);
$config[ApplicationConstants::BASE_URL_SSL_ZED] = sprintf(
    'https://%s%s',
    $config[ApplicationConstants::HOST_ZED],
    $config[ApplicationConstants::PORT_SSL_ZED]
);
$config[ZedRequestConstants::BASE_URL_ZED_API] = $config[ApplicationConstants::BASE_URL_ZED];
$config[ZedRequestConstants::BASE_URL_SSL_ZED_API] = $config[ApplicationConstants::BASE_URL_SSL_ZED];

// ---------- Assets
$config[ApplicationConstants::BASE_URL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS] = $config[ApplicationConstants::BASE_URL_SSL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA] = $config[ApplicationConstants::BASE_URL_SSL_YVES];

// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];

// ---------- Jenkins
$config[SetupConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';

// ---------- Elasticsearch
$ELASTICA_INDEX_NAME = 'de_search';
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;

// ---------- Email
$config[MailConstants::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConstants::HOST_ZED] . ':1080';

// ---------- RabbitMQ
$config[ApplicationConstants::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[ApplicationConstants::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] = '/DE_development_zed';

// ---------- Event journal
$config[EventJournalConstants::WRITER_OPTIONS] = [
    \Spryker\Shared\EventJournal\Model\Writer\File::class => ['log_path' => APPLICATION_ROOT_DIR . '/data/DE/logs/'],
];
