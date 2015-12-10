<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Product\Plugin;

use Pyz\Yves\Product\ProductDependencyContainer;
use SprykerEngine\Yves\Kernel\AbstractPlugin;

/**
 * @method ProductDependencyContainer getDependencyContainer()
 */
class ProductResourceCreator extends AbstractPlugin
{

    /**
     * @return ProductResourceCreator
     */
    public function createProductResourceCreator()
    {
        return $this->getDependencyContainer()->createProductResourceCreator();
    }

}
