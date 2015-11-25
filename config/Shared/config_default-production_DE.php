<?php

use Pyz\Shared\ProductFeed\ProductFeedConfig;
use SprykerEngine\Shared\Lumberjack\LumberjackConfig;
use SprykerFeature\Shared\System\SystemConfig;

/*
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

$config[SystemConfig::ELASTICA_PARAMETER__INDEX_NAME] = 'de_development_catalog';
$config[SystemConfig::ELASTICA_PARAMETER__DOCUMENT_TYPE] = 'page';

//@TODO add configuration for feed generation?

$config[LumberjackConfig::WRITER_OPTIONS] = [
    '\SprykerEngine\Shared\Lumberjack\Model\Writer\File' => ['log_path' => '/data/logs/production/DE/'],
];

$config[ProductFeedConfig::PRODUCT_FEED_FILE_LOCATION] = '/data/storage/production/static/feed/DE/';
