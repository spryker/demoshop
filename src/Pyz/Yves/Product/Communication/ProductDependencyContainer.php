<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product\Communication;

use Pyz\Yves\Product\Communication\Builder\FrontendProductBuilder;
use Pyz\Yves\Product\Communication\ResourceCreator\ProductResourceCreator;
use SprykerEngine\Yves\Kernel\Communication\AbstractCommunicationDependencyContainer;

/**
 * Class ProductExportDependencyContainer
 */
class ProductDependencyContainer extends AbstractCommunicationDependencyContainer
{

    /**
     * @var Product
     */
    protected $factory;

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
