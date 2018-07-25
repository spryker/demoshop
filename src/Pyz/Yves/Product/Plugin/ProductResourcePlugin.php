<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Product\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Product\ProductFactory getFactory()
 */
class ProductResourcePlugin extends AbstractPlugin
{
    /**
     * @return \Pyz\Yves\Collector\Creator\ResourceCreatorInterface
     */
    public function createProductResourceCreator()
    {
        return $this->getFactory()->createProductResourceCreator();
    }
}
