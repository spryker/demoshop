<?php

namespace Pyz\Zed\Category\Business;

use ProjectA\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use ProjectA\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use Psr\Log\LoggerInterface;

/**
 * @method CategoryDependencyContainer getDependencyContainer()
 */
class CategoryFacade extends SprykerCategoryFacade implements ProductCategoryToCategoryInterface
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->getDemoDataInstaller($messenger)->install();
    }
}
