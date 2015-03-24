<?php

namespace Pyz\Zed\ProductCategory\Business;

use ProjectA\Zed\ProductCategory\Business\ProductCategoryFacade as CoreProductCategoryFacade;
use Psr\Log\LoggerInterface;

class ProductCategoryFacade extends CoreProductCategoryFacade
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
        $this->dependencyContainer->getDemoDataInstaller($logger)->install();
    }
}
