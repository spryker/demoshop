<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\ProductSet\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\ProductSet\ProductSetFactory getFactory()
 */
class ProductSetResourceCreatorPlugin extends AbstractPlugin
{
    /**
     * @return \Pyz\Yves\Collector\Creator\ResourceCreatorInterface
     */
    public function createProductSetResourceCreator()
    {
        return $this->getFactory()->createProductSetResourceCreator();
    }
}
