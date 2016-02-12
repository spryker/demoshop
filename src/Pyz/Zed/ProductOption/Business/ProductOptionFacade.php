<?php

namespace Pyz\Zed\ProductOption\Business;

use Spryker\Zed\ProductOption\Business\ProductOptionFacade as SprykerProductOptionFacade;
use Psr\Log\LoggerInterface;

/**
 * @method \Pyz\Zed\ProductOption\Business\ProductOptionBusinessFactory getFactory()
 */
class ProductOptionFacade extends SprykerProductOptionFacade implements ProductOptionFacadeInterface
{

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
