<?php

namespace Pyz\Zed\ProductCategory\Business;

use SprykerFeature\Zed\ProductCategory\Business\ProductCategoryFacade as SprykerProductCategoryFacade;
use Psr\Log\LoggerInterface;

class ProductCategoryFacade extends SprykerProductCategoryFacade
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
        $this->dependencyContainer->createDemoDataInstaller($messenger)->install();
    }
}
