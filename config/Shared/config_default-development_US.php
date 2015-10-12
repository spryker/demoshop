<?php

use SprykerFeature\Shared\Mail\MailConfig;
use SprykerFeature\Shared\System\SystemConfig;

$yvesHost = 'www.com.spryker.dev';
$config[SystemConfig::HOST_YVES] = 'http://' . $yvesHost;
$config[SystemConfig::HOST_STATIC_ASSETS] = $config[SystemConfig::HOST_STATIC_MEDIA] = $yvesHost;

$config[SystemConfig::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[SystemConfig::HOST_SSL_STATIC_ASSETS] = $config[SystemConfig::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.com.spryker.dev';
$config[SystemConfig::HOST_ZED_GUI]
    = $config[SystemConfig::HOST_ZED_API]
    = 'http://' . $zedHost;
$config[SystemConfig::HOST_SSL_ZED_GUI]
    = $config[SystemConfig::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.com.spryker.dev';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.com.spryker.dev';

$config[MailConfig::MAILCATCHER_GUI] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':1080';

/* RabbitMQ */
$config[SystemConfig::ZED_RABBITMQ_HOST] = 'localhost';
$config[SystemConfig::ZED_RABBITMQ_PORT] = '5672';
$config[SystemConfig::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[SystemConfig::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_RABBITMQ_VHOST] = '/DE_development_zed';
