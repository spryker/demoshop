<?php

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\PropelQueryBuilder\PropelQueryBuilderConstants;
use Spryker\Shared\Queue\QueueConstants;
use Spryker\Shared\RabbitMq\RabbitMqConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

$config[PropelConstants::ZED_DB_USERNAME] = 'development';
$config[PropelConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_development_zed';
$config[PropelConstants::ZED_DB_HOST] = '127.0.0.1';
$config[PropelConstants::ZED_DB_PORT] = 5432;
$config[PropelConstants::ZED_DB_ENGINE]
    = $config[PropelQueryBuilderConstants::ZED_DB_ENGINE]
    = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];

$yvesHost = 'www.de.project.local';
$config[ApplicationConstants::HOST_YVES]
    = $config[PayolutionConstants::HOST_YVES]
    = $config[NewsletterConstants::HOST_YVES] = 'http://' . $yvesHost;
$config[ApplicationConstants::HOST_STATIC_ASSETS] = $config[ApplicationConstants::HOST_STATIC_MEDIA] = $yvesHost;
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;
$config[CustomerConstants::BASE_URL_YVES] = 'http://' . $yvesHost;

$config[ApplicationConstants::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[ApplicationConstants::HOST_SSL_STATIC_ASSETS] = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.de.project.local';
$config[ApplicationConstants::HOST_ZED_GUI]
    = 'http://' . $zedHost;
$config[ApplicationConstants::HOST_ZED_API]
    = $config[ZedRequestConstants::HOST_ZED_API] = $zedHost;
$config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $zedHost;
$config[SessionConstants::ZED_SESSION_COOKIE_SECURE] = false;

$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.project.local';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.project.local';

$config[SetupConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';
$config[MailConstants::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':1080';

/* Elasticsearch */
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = 'de_search';

/* RabbitMQ */
$config[ApplicationConstants::ZED_RABBITMQ_HOST] = 'localhost';
$config[ApplicationConstants::ZED_RABBITMQ_PORT] = '5672';
$config[ApplicationConstants::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[ApplicationConstants::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] = '/DE_development_zed';

$config[QueueConstants::QUEUE_WORKER_OUTPUT_FILE_NAME] = 'data/DE/logs/ZED/queue.log';

$config[RabbitMqConstants::RABBITMQ_HOST] = 'localhost';
$config[RabbitMqConstants::RABBITMQ_PORT] = '5672';
$config[RabbitMqConstants::RABBITMQ_USERNAME] = 'DE_development';
$config[RabbitMqConstants::RABBITMQ_PASSWORD] = 'mate20mg';
$config[RabbitMqConstants::RABBITMQ_VIRTUAL_HOST] = '/DE_development_zed';

$config[EventJournalConstants::WRITER_OPTIONS] = [
    '\\Spryker\\Shared\\EventJournal\\Model\\Writer\\File' => ['log_path' => APPLICATION_ROOT_DIR . '/data/DE/logs/'],
];
