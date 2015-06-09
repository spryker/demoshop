<?php

namespace Pyz\Zed\ProductOption\Business;

use SprykerFeature\Zed\ProductOption\Business\ProductOptionFacade as SprykerProductOptionFacade;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall;

/**
 * @method ProductOptionDependencyContainer getDependencyContainer()
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
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
