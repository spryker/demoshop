<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Category\Communication\Plugin;

use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Pyz\Yves\Category\Communication\CategoryDependencyContainer;

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
