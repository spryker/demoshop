<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\Builder\FrontendProductBuilder;
use Pyz\Yves\Product\Model\AbstractProduct;
use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
use Spryker\Yves\Kernel\AbstractDependencyContainer;

/**
 * Class ProductExportDependencyContainer
 */
class ProductDependencyContainer extends AbstractDependencyContainer
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
     * @return AbstractProduct
     */
    protected function createAbstractProduct()
    {
        return new AbstractProduct();
    }

}
