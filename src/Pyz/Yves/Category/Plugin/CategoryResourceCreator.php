<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Category\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Category\CategoryDependencyContainer;

/**
 * @method CategoryDependencyContainer getDependencyContainer()
 */
class CategoryResourceCreator extends AbstractPlugin
{

    /**
     * @return CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return $this->getDependencyContainer()->createCategoryResourceCreator();
    }

}
