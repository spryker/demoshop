<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductSet\Plugin\Elasticsearch\ResultFormatter;

use Elastica\ResultSet;
use Generated\Shared\Search\PageIndexMap;
use Generated\Shared\Transfer\ProductSetStorageTransfer;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;

class ProductSetSearchResultFormatterPlugin extends AbstractElasticsearchResultFormatterPlugin
{

    const NAME = 'product_sets';

    /**
     * @api
     *
     * @return string
     */
    public function getName()
    {
        return self::NAME;
    }

    /**
     * @param \Elastica\ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return mixed
     */
    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters)
    {
        $productSets = [];
        foreach ($searchResult->getResults() as $document) {
            $productSetStorageData = $document->getSource()[PageIndexMap::SEARCH_RESULT_DATA];
            $productSetStorageTransfer = $this->mapToTransfer($productSetStorageData);

            $productSets[] = $productSetStorageTransfer;
        }

        return $productSets;
    }

    /**
     * @param array $productSetStorageData
     *
     * @return \Generated\Shared\Transfer\ProductSetStorageTransfer
     */
    protected function mapToTransfer(array $productSetStorageData)
    {
        $productSetStorageTransfer = new ProductSetStorageTransfer();
        $productSetStorageTransfer->fromArray($productSetStorageData, true);

        return $productSetStorageTransfer;
    }

}
