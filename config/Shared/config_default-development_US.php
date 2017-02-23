<?php

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\Mail\MailConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Search\SearchConstants;

$yvesHost = 'www.com.project.local';
$config[ApplicationConstants::HOST_YVES]
    = $config[ProductManagementConstants::HOST_YVES]
    = $config[PayoneConstants::HOST_YVES]
    = $config[PayolutionConstants::HOST_YVES]
    = $config[NewsletterConstants::HOST_YVES]
    = $config[CustomerConstants::HOST_YVES] = 'http://' . $yvesHost;
$config[ApplicationConstants::HOST_STATIC_ASSETS] = $config[ApplicationConstants::HOST_STATIC_MEDIA] = $yvesHost;

$config[ApplicationConstants::HOST_SSL_YVES] = 'https://' . $yvesHost;
$config[ApplicationConstants::HOST_SSL_STATIC_ASSETS] = $config[ApplicationConstants::HOST_SSL_STATIC_MEDIA] = $yvesHost;

$zedHost = 'zed.com.project.local';
$config[ApplicationConstants::HOST_ZED_GUI]
    = $config[ApplicationConstants::HOST_ZED_API]
    = 'http://' . $zedHost;
$config[ApplicationConstants::HOST_SSL_ZED_GUI]
    = $config[ApplicationConstants::HOST_SSL_ZED_API]
    = 'https://' . $zedHost;

$config[ApplicationConstants::YVES_TRUSTED_HOSTS] = [];

$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTP] = 'http://static.project.local';
$config[ApplicationConstants::CLOUD_CDN_STATIC_MEDIA_HTTPS] = 'https://static.project.local';

$config[MailConstants::MAILCATCHER_GUI] = 'http://' . $config[ApplicationConstants::HOST_ZED_GUI] . ':1080';

/* RabbitMQ */
$config[ApplicationConstants::ZED_RABBITMQ_HOST] = 'localhost';
$config[ApplicationConstants::ZED_RABBITMQ_PORT] = '5672';
$config[ApplicationConstants::ZED_RABBITMQ_USERNAME] = 'US_development';
$config[ApplicationConstants::ZED_RABBITMQ_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_RABBITMQ_VHOST] = '/US_development_zed';

/* Elasticsearch */
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = 'us_search';
