<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductNew;

use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \Pyz\Client\ProductNew\ProductNewFactory getFactory()
 */
class ProductNewClient extends AbstractClient implements ProductNewClientInterface
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
    public function findNewProducts(array $requestParameters = [])
    {
        $searchQuery = $this->getFactory()->createNewProductsQueryPlugin($requestParameters);
        $resultFormatters = $this->getFactory()->getNewProductsSearchResultFormatterPlugins();

        return $this->getFactory()
            ->getSearchClient()
            ->search($searchQuery, $resultFormatters, $requestParameters);
    }

}
