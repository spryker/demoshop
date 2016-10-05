<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\Builder\AttributeVariantBuilder;
use Pyz\Yves\Product\Builder\FrontendProductBuilder;
use Pyz\Yves\Product\Model\ProductAbstract;
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
            $this->createFrontendProductBuilder(),
            $this->getLocator()
        );
    }

    /**
     * @return Builder\FrontendProductBuilder
     */
    protected function createFrontendProductBuilder()
    {
        return new FrontendProductBuilder(
            $this->createProductAbstract(),
            $this->createAttributeVariantBuilder()
        );
    }

    /**
     * @return \Pyz\Yves\Product\Builder\AttributeVariantBuilder
     */
    protected function createAttributeVariantBuilder()
    {
        return new AttributeVariantBuilder(
            $this->getClient()
        );
    }

    /**
     * @return \Pyz\Yves\Product\Model\ProductAbstract
     */
    protected function createProductAbstract()
    {
        return new ProductAbstract();
    }

}
