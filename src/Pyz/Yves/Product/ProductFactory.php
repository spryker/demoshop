<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\Mapper\AttributeVariantMapper;
use Pyz\Yves\Product\Mapper\StorageImageMapper;
use Pyz\Yves\Product\Mapper\StorageProductAvailabilityMapper;
use Pyz\Yves\Product\Mapper\StorageProductCategoryMapper;
use Pyz\Yves\Product\Mapper\StorageProductMapper;
use Pyz\Yves\Product\Plugin\StorageProductMapperPlugin;
use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
use Spryker\Shared\Kernel\ContainerInterface;
use Spryker\Yves\Kernel\AbstractFactory;

/**
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 */
class ProductFactory extends AbstractFactory
{
    /**
     * @return ResourceCreator\ProductResourceCreator
     */
    public function createProductResourceCreator()
    {
        return new ProductResourceCreator($this->createStorageProductMapperPlugin());
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    public function createStorageProductMapper()
    {
        return new StorageProductMapper(
            $this->createAttributeVariantMapper(),
            $this->getPriceProductClient()
        );
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\AttributeVariantMapperInterface
     */
    public function createAttributeVariantMapper()
    {
        return new AttributeVariantMapper($this->getClient());
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\StorageImageMapperInterface
     */
    public function createStorageImageMapper()
    {
        return new StorageImageMapper();
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\StorageProductCategoryMapperInterface
     */
    public function createStorageProductCategoryMapper()
    {
        return new StorageProductCategoryMapper();
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\StorageProductAvailabilityMapperInterface
     */
    public function createStorageProductAvailabilityMapper()
    {
        return new StorageProductAvailabilityMapper($this->getAvailabilityClient());
    }

    /**
     * @return \Spryker\Client\ProductOption\ProductOptionClientInterface
     */
    public function getProductOptionClient()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::CLIENT_PRODUCT_OPTION);
    }

    /**
     * @return \Spryker\Client\Availability\AvailabilityClientInterface
     */
    public function getAvailabilityClient()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::CLIENT_AVAILABILITY);
    }

    /**
     * @return \Spryker\Client\ProductGroup\ProductGroupClientInterface
     */
    public function getProductGroupClient()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::CLIENT_PRODUCT_GROUP);
    }

    /**
     * @return \Spryker\Client\PriceProduct\PriceProductClientInterface
     */
    protected function getPriceProductClient()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::CLIENT_PRICE_PRODUCT);
    }

    /**
     * @return \Pyz\Yves\Product\Dependency\Plugin\StorageProductMapperPluginInterface
     */
    public function createStorageProductMapperPlugin()
    {
        return new StorageProductMapperPlugin();
    }
}
