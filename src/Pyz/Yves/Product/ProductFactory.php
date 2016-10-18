<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
use Spryker\Yves\Product\ProductFactory as SprykerProductFactory;
use Spryker\Yves\ProductImage\Builder\StorageImageBuilder;

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
            $this->createStorageProductBuilder(),
            $this->createStorageImageBuilder(),
            $this->getLocator()
        );
    }

    /**
     * @return \Spryker\Yves\ProductImage\Builder\StorageImageBuilder
     */
    protected function createStorageImageBuilder()
    {
        return new StorageImageBuilder();
    }

}
