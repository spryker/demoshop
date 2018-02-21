<?php

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Shared\RabbitMq\RabbitMqEnv;
use Spryker\Shared\Search\SearchConstants;

// ---------- Propel
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_development_zed';

// ---------- MailCatcher
$config[MailConstants::MAILCATCHER_GUI] = sprintf('http://%s:1080', $config[ApplicationConstants::HOST_ZED]);

// ---------- Elasticsearch
$ELASTICA_INDEX_NAME = 'de_search';
$config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;

// ---------- Queue
$config[QueueConstants::QUEUE_WORKER_INTERVAL_MILLISECONDS] = 1000;
$config[QueueConstants::QUEUE_WORKER_LOG_ACTIVE] = false;
$config[QueueConstants::QUEUE_WORKER_OUTPUT_FILE_NAME] = 'data/DE/logs/ZED/queue.out';

// ---------- RabbitMQ
$config[RabbitMqEnv::RABBITMQ_CONNECTIONS]['DE'][RabbitMqEnv::RABBITMQ_DEFAULT_CONNECTION] = true;
$config[RabbitMqEnv::RABBITMQ_API_VIRTUAL_HOST] = '/DE_development_zed';
