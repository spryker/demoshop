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
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }
}
