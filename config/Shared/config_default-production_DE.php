<?php

/**
 * This is the global runtime configuration for Yves and Generated_Yves_Zed in a production environment.
 */

use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Search\SearchConstants;

// ---------- Elasticsearch
$ELASTICA_INDEX_NAME = 'de_search';
$config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
