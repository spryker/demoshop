<?php

namespace Pyz\Yves\Category\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;
use Pyz\Yves\Category\CategoryFactory;

/**
 * @method \Pyz\Yves\Category\CategoryFactory getFactory()
 */
class CategoryResourceCreator extends AbstractPlugin
{

    /**
     * @return \Pyz\Yves\Category\Plugin\CategoryResourceCreator
     */
    public function createCategoryResourceCreator()
    {
        return $this->getFactory()->createCategoryResourceCreator();
    }

}
