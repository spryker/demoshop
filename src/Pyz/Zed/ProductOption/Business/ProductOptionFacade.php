<?php

namespace Pyz\Zed\ProductOption\Business;

use Spryker\Zed\ProductOption\Business\ProductOptionFacade as SprykerProductOptionFacade;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall;

/**
 * @method ProductOptionBusinessFactory getFactory()
 */
class ProductOptionFacade extends SprykerProductOptionFacade
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductOptionDataInstall
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
