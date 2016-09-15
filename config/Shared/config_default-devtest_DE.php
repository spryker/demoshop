<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a devtest environment.
 */

use Spryker\Shared\Application\ApplicationConstants;

$config[ApplicationConstants::ZED_DB_ENGINE] = $config[ApplicationConstants::ZED_DB_ENGINE_PGSQL];
$config[ApplicationConstants::ZED_DB_USERNAME] = 'devtest';
$config[ApplicationConstants::ZED_DB_PASSWORD] = 'mate20mg';
$config[ApplicationConstants::ZED_DB_DATABASE] = 'DE_devtest_zed';
$config[ApplicationConstants::ZED_DB_HOST] = '127.0.0.1';
$config[ApplicationConstants::ZED_DB_PORT] = 5432;

$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = 'de_search_devtest';


