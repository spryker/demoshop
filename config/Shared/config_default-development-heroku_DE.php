<?php

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\EventJournal\EventJournalConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Search\SearchConstants;
use Spryker\Shared\Session\SessionConstants;

$schema = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$dbopts = parse_url(getenv(getenv('DATABASE_URL_NAME') ?: 'DATABASE_URL'));
switch ($dbopts['scheme']) {
    case 'postgres':
        $schema = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
        break;
}

$config[PropelConstants::ZED_DB_ENGINE] = $config[PropelConstants::ZED_DB_ENGINE_PGSQL];
$config[PropelConstants::ZED_DB_USERNAME] = $dbopts['user'];
$config[PropelConstants::ZED_DB_PASSWORD] = $dbopts['pass'];
$config[PropelConstants::ZED_DB_DATABASE] = ltrim($dbopts['path'], '/');
$config[PropelConstants::ZED_DB_HOST] = $dbopts['host'];
$config[PropelConstants::ZED_DB_PORT] = isset($dbopts['port']) ? $dbopts['port'] : 5432;

$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = 'de_search';

$yvesHost = getenv('YVES_HOST');
$yvesProtocol = getenv('YVES_HOST_PROTOCOL'); //'http://'

$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;
$config[ApplicationConstants::HOST_YVES] = $yvesProtocol . $yvesHost;
$config[ApplicationConstants::HOST_STATIC_ASSETS] = $config[ApplicationConstants::HOST_STATIC_MEDIA] = $yvesHost;
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;

$config[ApplicationConstants::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[ApplicationConstants::HOST_SSL_STATIC_ASSETS] = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = getenv('ZED_HOST');
$zedProtocol = getenv('ZED_HOST_PROTOCOL'); //'http://'

$config[ApplicationConstants::HOST_ZED_GUI]
    = $zedProtocol . $zedHost;
$config[ApplicationConstants::HOST_ZED_API] = $zedHost;
$config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $zedHost;
$config[SessionConstants::ZED_SESSION_COOKIE_SECURE] = false;

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

$config[EventJournalConstants::WRITER_OPTIONS] = [
    \Spryker\Shared\EventJournal\Model\Writer\File::class => ['log_path' => APPLICATION_ROOT_DIR . '/data/DE/logs/'],
];
