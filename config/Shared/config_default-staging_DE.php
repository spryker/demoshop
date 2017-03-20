<?php

use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Shared\Collector\CollectorConstants;
use Spryker\Shared\Search\SearchConstants;

// ---------- Elasticsearch
$config[ApplicationConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[CollectorConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = $config[SearchConstants::ELASTICA_PARAMETER__INDEX_NAME]
    = 'de_search';
