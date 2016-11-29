<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\Mapper\AttributeVariantMapper;
use Pyz\Yves\Product\Mapper\StorageImageMapper;
use Pyz\Yves\Product\Mapper\StorageProductCategoryMapper;
use Pyz\Yves\Product\Mapper\StorageProductMapper;
use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
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
        return new ProductResourceCreator(
            $this->createStorageProductMapper(),
            $this->createStorageImageMapper(),
            $this->createStorageProductCategoryMapper()
        );
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\StorageProductMapperInterface
     */
    protected function createStorageProductMapper()
    {
        return new StorageProductMapper($this->createAttributeVariantMapper());
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\AttributeVariantMapperInterface
     */
    protected function createAttributeVariantMapper()
    {
        return new AttributeVariantMapper($this->getClient());
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\StorageImageMapperInterface
     */
    protected function createStorageImageMapper()
    {
        return new StorageImageMapper();
    }

    /**
     * @return \Pyz\Yves\Product\Mapper\StorageProductCategoryMapperInterface
     */
    protected function createStorageProductCategoryMapper()
    {
        return new StorageProductCategoryMapper();
    }

    /**
     * @return \Spryker\Client\ProductOption\ProductOptionClientInterface
     */
    public function getProductOptionClient()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::CLIENT_PRODUCT_OPTION);
    }

    /**
     * @return \Spryker\Client\Availability\AvailabilityClient
     */
    public function getAvailabilityClient()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::CLIENT_AVAILABILITY);
    }

}
