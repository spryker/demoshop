<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a devtest environment.
 */

use Pyz\Shared\Newsletter\NewsletterConstants;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Shared\Payolution\PayolutionConstants;
use Spryker\Shared\Payone\PayoneConstants;
use Spryker\Shared\ProductManagement\ProductManagementConstants;
use Spryker\Shared\Propel\PropelConstants;
use Spryker\Shared\Session\SessionConstants;
use Spryker\Shared\Setup\SetupConstants;
use Spryker\Shared\ZedRequest\ZedRequestConstants;

// ---------- Yves host
$config[ApplicationConstants::PORT_YVES] = '';
$config[ApplicationConstants::PORT_SSL_YVES] = '';
$config[ApplicationConstants::HOST_YVES] = 'www-test.de.project.local';
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

// ---------- Zed host
$config[ApplicationConstants::PORT_ZED] = '';
$config[ApplicationConstants::PORT_SSL_ZED] = '';
$config[ApplicationConstants::HOST_ZED]
    = $config[ZedRequestConstants::HOST_ZED_API]
    = 'zed-test.de.project.local';
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

// ---------- Trusted hosts
$config[ApplicationConstants::YVES_TRUSTED_HOSTS] = [
    $config[ApplicationConstants::HOST_YVES],
    $config[ApplicationConstants::HOST_ZED],
];

// ---------- Propel
$config[PropelConstants::ZED_DB_USERNAME] = 'devtest';
$config[PropelConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[PropelConstants::ZED_DB_DATABASE] = 'DE_devtest_zed';

// ---------- Elasticsearch
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = 'de_search_devtest';

// ---------- Session
$config[SessionConstants::YVES_SESSION_COOKIE_DOMAIN] = $config[ApplicationConstants::HOST_YVES];
$config[SessionConstants::ZED_SESSION_COOKIE_NAME] = $config[ApplicationConstants::HOST_ZED];
$config[SessionConstants::YVES_SESSION_REDIS_DATABASE] = 5;

// ---------- Jenkins
$config[SetupConstants::JENKINS_BASE_URL] = 'http://localhost:10007/';
