<?php

namespace Pyz\Zed\Category\Business;

use SprykerFeature\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use SprykerFeature\Zed\ProductCategory\Dependency\Facade\ProductCategoryToCategoryInterface;
use Psr\Log\LoggerInterface;

class CategoryFacade extends SprykerCategoryFacade implements ProductCategoryToCategoryInterface
{

    /**
     * @var CategoryDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }
}
