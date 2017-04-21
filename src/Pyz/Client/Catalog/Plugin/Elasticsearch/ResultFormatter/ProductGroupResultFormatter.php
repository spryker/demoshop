<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\Catalog\Plugin\Elasticsearch\ResultFormatter;

use Elastica\ResultSet;
use Generated\Shared\Search\PageIndexMap;
use Spryker\Client\Search\Plugin\Elasticsearch\ResultFormatter\AbstractElasticsearchResultFormatterPlugin;
use Spryker\Shared\Kernel\Store;

/**
 * @method \Pyz\Client\Catalog\CatalogFactory getFactory()
 */
class ProductGroupResultFormatter extends AbstractElasticsearchResultFormatterPlugin
{

    /**
     * @api
     *
     * @return string
     */
    public function getName()
    {
        return 'productGroups';
    }

    /**
     * @param \Elastica\ResultSet $searchResult
     * @param array $requestParameters
     *
     * @return array
     */
    protected function formatSearchResult(ResultSet $searchResult, array $requestParameters)
    {
        $localeName = Store::getInstance()->getCurrentLocale();
        $productGroups = [];
        foreach ($searchResult->getResults() as $document) {
            $product = $document->getSource()[PageIndexMap::SEARCH_RESULT_DATA];
            $idProductAbstract = $product['id_product_abstract'];

            $productGroups[$idProductAbstract] = $this->getFactory()
                ->getProductGroupClient()
                ->findProductGroupItemsByIdProductAbstract($idProductAbstract, $localeName);
        }

        return $productGroups;
    }

}
