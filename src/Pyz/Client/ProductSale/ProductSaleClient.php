<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductSale;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\ProductSale\ProductSaleFactory getFactory()
 */
class ProductSaleClient extends AbstractClient implements ProductSaleClientInterface
{

    /**
     * {@inheritdoc}
     *
     * @api
     *
     * @param array $requestParameters
     *
     * @return array
     */
    public function saleSearch(array $requestParameters = [])
    {
        $searchQuery = $this->getFactory()->getSaleSearchQueryPlugin($requestParameters);
        $resultFormatters = $this->getFactory()->getSaleSearchResultFormatterPlugins();

        return $this->getFactory()
            ->getSearchClient()
            ->search($searchQuery, $resultFormatters, $requestParameters);
    }

}
