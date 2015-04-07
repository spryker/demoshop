<?php

namespace Pyz\Zed\ProductCategory\Business;

use ProjectA\Zed\ProductCategory\Business\ProductCategoryFacade as SprykerProductCategoryFacade;
use Psr\Log\LoggerInterface;

class ProductCategoryFacade extends SprykerProductCategoryFacade
{

    /**
     * @var ProductCategoryDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param LoggerInterface $logger
     */
    public function installDemoData(LoggerInterface $logger = null)
    {
        $this->dependencyContainer->createDemoDataInstaller($logger)->install();
    }
}
