<?php

namespace Pyz\Yves\Category\Plugin;

use Spryker\Yves\Kernel\AbstractPlugin;

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
