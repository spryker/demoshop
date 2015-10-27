<?php
/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a staging environment.
 */

use SprykerFeature\Shared\Mail\MailConfig;
use SprykerFeature\Shared\System\SystemConfig;
use SprykerFeature\Shared\Yves\YvesConfig;
use SprykerEngine\Shared\Lumberjack\LumberjackConfig;
use PavFeature\Shared\FileUpload\FileUploadConfig;

$config[SystemConfig::ZED_DB_USERNAME] = 'staging';
$config[SystemConfig::ZED_DB_PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_DB_DATABASE] = 'DE_staging_zed';
$config[SystemConfig::ZED_DB_HOST] = '127.0.0.1';
$config[SystemConfig::ZED_DB_PORT] = 5432;

$config[SystemConfig::PROPEL]['database']['connections']['default']['dsn'] = 'pgsql:'
    . 'host=' . $config[SystemConfig::ZED_DB_HOST] . ';'
    . 'dbname=' . $config[SystemConfig::ZED_DB_DATABASE];


$config[SystemConfig::ELASTICA_PARAMETER__INDEX_NAME] = 'de_staging_catalog';
$config[SystemConfig::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

$config[SystemConfig::ELASTICA_PARAMETER__PORT] = '13005';

$yvesHost = 'www.de.staging.pd-pa.de';
$config[YvesConfig::YVES_SESSION_COOKIE_DOMAIN] = $yvesHost;
$config[SystemConfig::HOST_YVES] = 'http://' . $yvesHost;
$config[SystemConfig::HOST_STATIC_ASSETS] = $config[SystemConfig::HOST_STATIC_MEDIA] = $yvesHost;

$config[SystemConfig::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[SystemConfig::HOST_SSL_STATIC_ASSETS] = $config[SystemConfig::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.de.staging.pd-pa.de';
$config[SystemConfig::HOST_ZED_GUI]
    = 'http://' . $zedHost;
$config[SystemConfig::HOST_ZED_API] = $zedHost;
$config[SystemConfig::HOST_SSL_ZED_GUI]
    = $config[SystemConfig::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.de.staging.pd-pa.de';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.de.staging.pd-pa.de';

$config[SystemConfig::JENKINS_BASE_URL] = 'http://localhost:13007/';
$config[MailConfig::MAILCATCHER_GUI] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':1080';

/** RabbitMQ */
$config[SystemConfig::ZED_RABBITMQ_HOST] =                 'localhost';
$config[SystemConfig::ZED_RABBITMQ_PORT] =                 '5672';
$config[SystemConfig::ZED_RABBITMQ_USERNAME] =             'DE_staging';
$config[SystemConfig::ZED_RABBITMQ_PASSWORD] =             'mate20mg';
$config[SystemConfig::ZED_RABBITMQ_VHOST] =                '/DE_staging_zed';


$config[LumberjackConfig::WRITER_OPTIONS] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Writer\File' => ['log_path' => '/data/logs/staging/DE/'],
];

$config[FileUploadConfig::STORAGE] = [
    'cms' => [
            FileUploadConfig::CONFIG_TYPE => FileUploadConfig::ADAPTER_LOCAL,
            FileUploadConfig::CONFIG_CONFIG => [
                'path' => '/data/storage/staging/static',
                'mapping' => 'http://static.com.staging.pd-pa.de',
            ],
    ],
];
