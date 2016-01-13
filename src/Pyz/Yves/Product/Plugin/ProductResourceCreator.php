<?php

namespace Pyz\Yves\Product\Plugin;

use Pyz\Yves\Product\ProductFactory;
use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method ProductFactory getFactory()
 */
class ProductResourceCreator extends AbstractPlugin
{

    /**
     * @return ProductResourceCreator
     */
    public function createProductResourceCreator()
    {
        return $this->getFactory()->createProductResourceCreator();
    }

}
