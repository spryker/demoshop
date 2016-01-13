<?php

namespace Pyz\Yves\Category\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Category\CategoryFactory;

/**
 * @method CategoryFactory getFactory()
 */
class CategoryResourceCreator extends AbstractPlugin
{

    /**
     * @return CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return $this->getFactory()->createCategoryResourceCreator();
    }

}
