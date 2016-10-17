<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\Builder\AttributeVariantBuilder;
use Pyz\Yves\Product\Builder\ImageSetBuilder;
use Pyz\Yves\Product\Builder\StorageProductBuilder;
use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
use Spryker\Yves\Kernel\AbstractFactory;

/**
 * Class ProductExportFactory
 *
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
            $this->createStorageProductBuilder(),
            $this->getLocator()
        );
    }

    /**
     * @return Builder\StorageProductBuilder
     */
    protected function createStorageProductBuilder()
    {
        return new StorageProductBuilder(
            $this->createAttributeVariantBuilder(),
            $this->creteImageSetBuilder()
        );
    }

    /**
     * @return \Pyz\Yves\Product\Builder\AttributeVariantBuilder
     */
    protected function createAttributeVariantBuilder()
    {
        return new AttributeVariantBuilder(
            $this->getClient(),
            $this->creteImageSetBuilder()
        );
    }

    /**
     * @return \Pyz\Yves\Product\Builder\ImageSetBuilder
     */
    protected function creteImageSetBuilder()
    {
        return new ImageSetBuilder();
    }

}
