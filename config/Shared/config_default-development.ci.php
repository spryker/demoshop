<?php

use SprykerFeature\Shared\Mail\MailConfig;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerEngine\Shared\Lumberjack\LumberjackConfig;
use SprykerFeature\Shared\Payone\PayoneConfigConstants;
use SprykerFeature\Shared\Session\SessionConfig;

$config[SystemConfig::ZED_MYSQL_USERNAME] = 'ubuntu';
$config[SystemConfig::ZED_MYSQL_PASSWORD] = '';
$config[SystemConfig::ZED_MYSQL_DATABASE] = 'circle_test';
$config[SystemConfig::ZED_MYSQL_HOST] = '127.0.0.1';
$config[SystemConfig::ZED_MYSQL_PORT] = '3306';

$config[SystemConfig::ZED_DB_USERNAME] = 'ubuntu';
$config[SystemConfig::ZED_DB_PASSWORD] = '';
$config[SystemConfig::ZED_DB_DATABASE] = 'circle_test';
$config[SystemConfig::ZED_DB_HOST] = '127.0.0.1';
$config[SystemConfig::ZED_DB_PORT] = '3306';

$config[SystemConfig::PROPEL]['database']['connections']['default']['dsn'] = 'mysql:host=127.0.0.1;dbname=circle_test';
$config[SystemConfig::PROPEL]['database']['connections']['default']['user'] = 'ubuntu';
$config[SystemConfig::PROPEL]['database']['connections']['default']['password'] = '';

$config[SystemConfig::ELASTICA_PARAMETER__INDEX_NAME] = 'de_development_catalog';
$config[SystemConfig::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

$config[SystemConfig::ELASTICA_PARAMETER__PORT] = '9200';

$yvesHost = 'www.de.spryker.dev';
$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;
$config[SystemConfig::HOST_YVES] = 'http://' . $yvesHost;
$config[SystemConfig::HOST_STATIC_ASSETS] = $config[SystemConfig::HOST_STATIC_MEDIA] = $yvesHost;

$config[SystemConfig::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[SystemConfig::HOST_SSL_STATIC_ASSETS] = $config[SystemConfig::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.de.spryker.dev';
$config[SystemConfig::HOST_ZED_GUI]
    = 'http://' . $zedHost;
$config[SystemConfig::HOST_ZED_API] = $zedHost;
$config[SystemConfig::HOST_SSL_ZED_GUI]
    = $config[SystemConfig::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.de.spryker.dev';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.de.spryker.dev';

$config[SystemConfig::JENKINS_BASE_URL] = 'http://localhost:10007/';
$config[MailConfig::MAILCATCHER_GUI] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':1080';

/* RabbitMQ */
$config[SystemConfig::ZED_RABBITMQ_HOST] = 'localhost';
$config[SystemConfig::ZED_RABBITMQ_PORT] = '5672';
$config[SystemConfig::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[SystemConfig::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_RABBITMQ_VHOST] = '/DE_development_zed';

$config[SystemConfig::JENKINS_DIRECTORY] = APPLICATION_ROOT_DIR . '/shared/data/common/jenkins';

$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL] = 'tcp';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_HOST] = '127.0.0.1';
$config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT] = '6379';

$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PROTOCOL] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PROTOCOL];
$config[SystemConfig::ZED_STORAGE_SESSION_REDIS_PORT] = $config[SystemConfig::YVES_STORAGE_SESSION_REDIS_PORT];

$config[PayoneConfigConstants::PAYONE] = [
    PayoneConfigConstants::PAYONE_MODE => '',
];

$config[LumberjackConfig::WRITER_OPTIONS] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Writer\File' => ['log_path' => '/data/logs/development/DE/'],
];

$config[SessionConfig::SESSION_IS_TEST] = true;
