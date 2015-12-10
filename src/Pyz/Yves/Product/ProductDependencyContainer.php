<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product;

use Pyz\Yves\Product\Builder\FrontendProductBuilder;
use Pyz\Yves\Product\ResourceCreator\ProductResourceCreator;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;

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
        return new FrontendProductBuilder($this->getFactory());
    }

}
