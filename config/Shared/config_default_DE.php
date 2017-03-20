<?php

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

// ---------- Yves host
$config[ApplicationConstants::HOST_YVES] = 'www.de.project.local';
$config[ApplicationConstants::PORT_YVES] = '';
$config[ApplicationConstants::PORT_SSL_YVES] = '';
$config[ApplicationConstants::HOST_YVES] = 'www.de.project.local';
$config[ApplicationConstants::BASE_URL_YVES]
    = $config[ProductManagementConstants::BASE_URL_YVES]
    = $config[PayoneConstants::BASE_URL_YVES]
    = $config[PayolutionConstants::BASE_URL_YVES]
    = $config[NewsletterConstants::BASE_URL_YVES]
    = $config[CustomerConstants::BASE_URL_YVES]
    = sprintf(
        'http://%s%s',
        $config[ApplicationConstants::HOST_YVES],
        $config[ApplicationConstants::PORT_YVES]
    );
$config[ApplicationConstants::BASE_URL_SSL_YVES]
    = sprintf(
        'https://%s%s',
        $config[ApplicationConstants::HOST_YVES],
        $config[ApplicationConstants::PORT_SSL_YVES]
    );
$config[ApplicationConstants::YVES_TRUSTED_HOSTS] = [];

// ---------- Zed host
$config[ApplicationConstants::HOST_ZED] = 'zed.de.project.local';
$config[ApplicationConstants::PORT_ZED] = '';
$config[ApplicationConstants::PORT_SSL_ZED] = '';
$config[ApplicationConstants::HOST_ZED]
    = $config[ZedRequestConstants::HOST_ZED_API]
    = 'zed.de.project.local';
$config[ApplicationConstants::BASE_URL_ZED]
    = $config[ZedRequestConstants::BASE_URL_ZED_API]
    = sprintf(
        'http://%s%s',
        $config[ApplicationConstants::HOST_ZED],
        $config[ApplicationConstants::PORT_ZED]
    );
$config[ZedRequestConstants::BASE_URL_SSL_ZED_API]
    = sprintf(
        'https://%s%s',
        $config[ApplicationConstants::HOST_ZED],
        $config[ApplicationConstants::PORT_SSL_ZED]
    );

// ---------- Assets / Media
$config[ApplicationConstants::BASE_URL_STATIC_ASSETS]
    = $config[ApplicationConstants::BASE_URL_STATIC_MEDIA]
    = $config[ApplicationConstants::BASE_URL_YVES];
$config[ApplicationConstants::BASE_URL_SSL_STATIC_ASSETS]
    = $config[ApplicationConstants::BASE_URL_SSL_STATIC_MEDIA]
    = $config[ApplicationConstants::BASE_URL_SSL_YVES];

// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];
