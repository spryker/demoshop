<?php

namespace Pyz\Zed\ProductCategory\Business;

use ProjectA\Zed\ProductCategory\Business\ProductCategoryFacade as SprykerProductCategoryFacade;
use Psr\Log\LoggerInterface;

/**
 * @method ProductCategoryDependencyContainer getDependencyContainer()
 */
class ProductCategoryFacade extends SprykerProductCategoryFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
