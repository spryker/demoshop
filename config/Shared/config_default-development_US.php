<?php

use SprykerFeature\Shared\Mail\MailConfig;
use SprykerFeature\Shared\Application\ApplicationConfig;

$yvesHost = 'www.com.spryker.dev';
$config[ApplicationConfig::HOST_YVES] = 'http://' . $yvesHost;
$config[ApplicationConfig::HOST_STATIC_ASSETS] = $config[ApplicationConfig::HOST_STATIC_MEDIA] = $yvesHost;

$config[ApplicationConfig::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[ApplicationConfig::HOST_SSL_STATIC_ASSETS] = $config[ApplicationConfig::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.com.spryker.dev';
$config[ApplicationConfig::HOST_ZED_GUI]
    = $config[ApplicationConfig::HOST_ZED_API]
    = 'http://' . $zedHost;
$config[ApplicationConfig::HOST_SSL_ZED_GUI]
    = $config[ApplicationConfig::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[ApplicationConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.com.spryker.dev';
$config[ApplicationConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.com.spryker.dev';

$config[MailConfig::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConfig::HOST_ZED_GUI] . ':1080';

/* RabbitMQ */
$config[ApplicationConfig::ZED_RABBITMQ_HOST] = 'localhost';
$config[ApplicationConfig::ZED_RABBITMQ_PORT] = '5672';
$config[ApplicationConfig::ZED_RABBITMQ_USERNAME] = 'DE_development';
$config[ApplicationConfig::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[ApplicationConfig::ZED_RABBITMQ_VHOST] = '/DE_development_zed';
