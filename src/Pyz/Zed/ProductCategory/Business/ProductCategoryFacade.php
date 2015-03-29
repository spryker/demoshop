<?php

namespace Pyz\Zed\ProductCategory\Business;

use ProjectA\Zed\Kernel\Business\AbstractFacade;
use Psr\Log\LoggerInterface;

class ProductCategoryFacade extends AbstractFacade
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
