<?php

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Shared\RabbitMq\RabbitMqConstants;
use Spryker\Shared\Search\SearchConstants;
use SprykerEco\Shared\Payone\PayoneConstants;

// ---------- Propel
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_development_zed';

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
$ELASTICA_INDEX_NAME = 'de_search';
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;

// ---------- Queue
$config[QueueConstants::QUEUE_WORKER_OUTPUT_FILE_NAME] = 'data/DE/logs/ZED/queue.out';

// ---------- RabbitMQ
$config[RabbitMqConstants::RABBITMQ_USERNAME] = 'DE_development';
$config[RabbitMqConstants::RABBITMQ_VIRTUAL_HOST] = '/DE_development_zed';

// ---------- MailCatcher
$config[MailConstants::MAILCATCHER_GUI] = sprintf('http://%s:1080', $config[ApplicationConstants::HOST_ZED]);
