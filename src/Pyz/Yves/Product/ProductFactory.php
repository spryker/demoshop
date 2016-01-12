<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\Builder\FrontendProductBuilder;
use Pyz\Yves\Product\Model\ProductAbstract;
use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
use Spryker\Yves\Kernel\AbstractFactory;

/**
 * Class ProductExportFactory
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
            $this->createAbstractProduct()
        );
    }

    /**
     * @return ProductAbstract
     */
    protected function createAbstractProduct()
    {
        return new ProductAbstract();
    }

}
