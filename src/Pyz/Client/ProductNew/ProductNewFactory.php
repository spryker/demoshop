<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductNew;

use Pyz\Client\ProductNew\Plugin\Elasticsearch\Query\NewProductsQueryPlugin;
use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Shared\Kernel\Store;
use Spryker\Shared\ProductNew\ProductNewConfig;

class ProductNewFactory extends AbstractFactory
{

    /**
     * @param array $requestParameters
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function createNewProductsQueryPlugin(array $requestParameters = [])
    {
        $newProductsQueryPlugin = new NewProductsQueryPlugin();

        return $this->getSearchClient()->expandQuery(
            $newProductsQueryPlugin,
            $this->getNewProductsSearchQueryExpanderPlugins(),
            $requestParameters
        );
    }

    /**
     * @return \Spryker\Client\ProductLabel\ProductLabelClientInterface
     */
    public function getProductLabelClient()
    {
        return $this->getProvidedDependency(ProductNewDependencyProvider::CLIENT_PRODUCT_LABEL);
    }

    /**
     * @return string
     */
    public function getCurrentLocale()
    {
        return Store::getInstance()->getCurrentLocale();
    }

    /**
     * @return \Spryker\Shared\ProductNew\ProductNewConfig
     */
    public function createProductNewConfig()
    {
        return new ProductNewConfig();
    }

    /**
     * @return \Spryker\Client\Search\SearchClientInterface
     */
    public function getSearchClient()
    {
        return $this->getProvidedDependency(ProductNewDependencyProvider::CLIENT_SEARCH);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryExpanderPluginInterface[]
     */
    protected function getNewProductsSearchQueryExpanderPlugins()
    {
        return $this->getProvidedDependency(ProductNewDependencyProvider::NEW_PRODUCTS_QUERY_EXPANDER_PLUGINS);
    }

    /**
     * @return \Spryker\Client\Search\Dependency\Plugin\ResultFormatterPluginInterface[]
     */
    public function getNewProductsSearchResultFormatterPlugins()
    {
        return $this->getProvidedDependency(ProductNewDependencyProvider::NEW_PRODUCTS_RESULT_FORMATTER_PLUGINS);
    }

}
