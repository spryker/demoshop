<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Client\ProductNew;

use Spryker\Client\Kernel\AbstractFactory;

class ProductNewFactory extends AbstractFactory
{
    /**
     * @param array $requestParameters
     *
     * @return \Spryker\Client\Search\Dependency\Plugin\QueryInterface
     */
    public function getNewProductsQueryPlugin(array $requestParameters = [])
    {
        $newProductsQueryPlugin = $this->getProvidedDependency(ProductNewDependencyProvider::NEW_PRODUCTS_QUERY_PLUGIN);

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
     * @return \Spryker\Shared\Kernel\Store
     */
    public function getStore()
    {
        return $this->getProvidedDependency(ProductNewDependencyProvider::STORE);
    }

    /**
     * @return \Spryker\Client\Kernel\AbstractBundleConfig|\Pyz\Client\ProductNew\ProductNewConfig
     */
    public function getConfig()
    {
        return parent::getConfig();
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
