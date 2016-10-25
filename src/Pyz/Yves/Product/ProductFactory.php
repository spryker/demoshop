<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
use Spryker\Yves\ProductCategory\Mapper\StorageProductCategoryMapper;
use Spryker\Yves\ProductImage\Mapper\StorageImageMapper;
use Spryker\Yves\Product\ProductFactory as SprykerProductFactory;

/**
 * Class ProductExportFactory
 *
 * @method \Spryker\Client\Product\ProductClientInterface getClient()
 */
class ProductFactory extends SprykerProductFactory
{

    /**
     * @return ResourceCreator\ProductResourceCreator
     */
    public function createProductResourceCreator()
    {
        return new ProductResourceCreator(
            $this->createStorageProductMapper(),
            $this->createStorageImageMapper(),
            $this->createStorageProductCategoryMapper(),
            $this->getLocator()
        );
    }

    /**
     * @return \Spryker\Yves\ProductImage\Mapper\StorageImageMapper
     */
    protected function createStorageImageMapper()
    {
        return new StorageImageMapper();
    }

    /**
     * @return \Spryker\Yves\ProductCategory\Mapper\StorageProductCategoryMapper
     */
    protected function createStorageProductCategoryMapper()
    {
        return new StorageProductCategoryMapper();
    }

}
