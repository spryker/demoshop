<?php

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Search\SearchConstants;

// ---------- Elasticsearch
$ELASTICA_INDEX_NAME = 'de_search';
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
$config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME] = $ELASTICA_INDEX_NAME;
