<?php

namespace Pyz\Zed\ProductOptions\Business;

use SprykerFeature\Zed\ProductOptions\Business\ProductOptionsFacade as SprykerProductOptionsFacade;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\ProductOptionsDataInstall;

/**
 * @method ProductOptionsDependencyContainer getDependencyContainer()
 */
class ProductOptionsFacade extends SprykerProductOptionsFacade
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductOptionsDataInstall
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }
}
