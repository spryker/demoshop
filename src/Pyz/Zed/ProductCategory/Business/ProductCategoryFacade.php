<?php

namespace Pyz\Zed\ProductCategory\Business;

use Spryker\Zed\ProductCategory\Business\ProductCategoryFacade as SprykerProductCategoryFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\ProductCategory\Business\ProductCategoryBusinessFactory getFactory()
 */
class ProductCategoryFacade extends SprykerProductCategoryFacade
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
