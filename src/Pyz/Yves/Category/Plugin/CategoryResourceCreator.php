<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Category\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

/**
 * @method \Pyz\Yves\Category\CategoryFactory getFactory()
 */
class CategoryResourceCreator extends AbstractPlugin
{
    /**
     * @return $this
     */
    public function createCategoryResourceCreator()
    {
        return $this->getFactory()->createCategoryResourceCreator();
    }
}
