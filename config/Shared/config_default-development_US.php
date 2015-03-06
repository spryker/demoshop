<?php

use ProjectA\Shared\Mail\MailConfig;
use ProjectA\Shared\Setup\SetupConfig;
use ProjectA\Shared\System\SystemConfig;

$config[SystemConfig::ZED_MYSQL_USERNAME] = 'development';
$config[SystemConfig::ZED_MYSQL_PASSWORD] = 'mate20mg';
$config[SystemConfig::ZED_MYSQL_DATABASE] = 'US_development_zed';
$config[SystemConfig::ZED_MYSQL_HOST] = 'localhost';
$config[SystemConfig::ZED_MYSQL_PORT] = 3306;

$yvesHost = 'www.com.spryker.dev';
$config[SystemConfig::HOST_YVES]
    = $config[SystemConfig::HOST_STATIC_ASSETS]
    = $config[SystemConfig::HOST_STATIC_MEDIA]
    = 'http://' . $yvesHost;
$config[SystemConfig::HOST_SSL_YVES]
    = $config[SystemConfig::HOST_SSL_STATIC_ASSETS]
    = $config[SystemConfig::HOST_SSL_STATIC_MEDIA]
    = 'https://' . $yvesHost;

$zedHost = 'zed.com.spryker.dev';
$config[SystemConfig::HOST_ZED_GUI]
    = $config[SystemConfig::HOST_ZED_API]
    = 'http://' . $zedHost;
$config[SystemConfig::HOST_SSL_ZED_GUI]
    = $config[SystemConfig::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.com.spryker.dev';
$config[SystemConfig::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.com.spryker.dev';

$config[SetupConfig::JENKINS_BASE_URL] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':10007/jenkins';
$config[MailConfig::MAILCATCHER_GUI] = 'http://' . $config[SystemConfig::HOST_ZED_GUI] . ':1080';