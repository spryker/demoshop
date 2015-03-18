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
     * @param LoggerInterface $logger
     */
    public function installDemoData(LoggerInterface $logger = null)
    {
        $this->dependencyContainer->getDemoDataInstaller($logger)->install();
    }
}
