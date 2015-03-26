<?php

namespace Pyz\Zed\Category\Business;

use ProjectA\Zed\Category\Business\CategoryFacade as SprykerCategoryFacade;
use Psr\Log\LoggerInterface;

class CategoryFacade extends SprykerCategoryFacade
{

    /**
     * @var CategoryDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger = null)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }
}
