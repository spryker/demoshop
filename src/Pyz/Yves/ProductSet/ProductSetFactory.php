<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet;

use Pyz\Yves\ProductSet\Mapper\ProductSetStorageMapper;
use Pyz\Yves\ProductSet\ResourceCreator\ProductSetResourceCreator;
use Spryker\Yves\Kernel\AbstractFactory;

class ProductSetFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Collector\Creator\ResourceCreatorInterface
     */
    public function createProductSetResourceCreator()
    {
        return new ProductSetResourceCreator(
            $this->getProductClient(),
            $this->createProductSetStorageMapper(),
            $this->getStorageProductMapperPlugin()
        );
    }

    /**
     * @return \Pyz\Yves\ProductSet\Mapper\ProductSetStorageMapperInterface
     */
    protected function createProductSetStorageMapper()
    {
        return new ProductSetStorageMapper();
    }

    /**
     * @return \Spryker\Client\Cart\CartClientInterface
     */
    public function getCartClient()
    {
        return $this->getProvidedDependency(ProductSetDependencyProvider::CLIENT_CART);
    }

    /**
     * @return \Spryker\Client\ProductSet\ProductSetClientInterface
     */
    public function getProductSetClient()
    {
        return $this->getProvidedDependency(ProductSetDependencyProvider::CLIENT_PRODUCT_SET);
    }

    /**
     * @return \Spryker\Client\Product\ProductClientInterface
     */
    protected function getProductClient()
    {
        return $this->getProvidedDependency(ProductSetDependencyProvider::CLIENT_PRODUCT);
    }

    /**
     * @return \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    protected function getStorageProductMapperPlugin()
    {
        return $this->getProvidedDependency(ProductSetDependencyProvider::PLUGIN_STORAGE_PRODUCT_MAPPER);
    }

}
