<?php

namespace Pyz\Yves\Product\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 */
class ProductResourceCreator extends AbstractPlugin
{

    /**
     * @return \Pyz\Yves\Product\Plugin\ProductResourceCreator
     */
    public function createProductResourceCreator()
    {
        return $this->getFactory()->createProductResourceCreator();
    }

}
