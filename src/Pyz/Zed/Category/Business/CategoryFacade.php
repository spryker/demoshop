<?php

namespace Pyz\Zed\Category\Business;

use Spryker\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use Spryker\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use Psr\Log\LoggerInterface;

/**
 * @method CategoryBusinessFactory getFactory()
 */
class CategoryFacade extends SprykerCategoryFacade implements ProductCategoryToCategoryInterface
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
