<?php

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Setup\SetupConstants;


// ---------- Propel
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_development_zed';


// ---------- Jenkins
$config[SetupConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';


// ---------- Email
$config[MailConstants::MAILCATCHER_GUI] = sprintf('http://%s:1080', $config[ApplicationConstants::HOST_ZED]);


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


// ---------- RabbitMQ
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] = '/DE_development_zed';
