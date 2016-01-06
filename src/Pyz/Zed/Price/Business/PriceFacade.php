<?php

namespace Pyz\Zed\Price\Business;

use Spryker\Zed\Price\Business\PriceFacade as SprykerPriceFacade;
use Psr\Log\LoggerInterface;

/**
 * @method PriceBusinessFactory getFactory()
 */
class PriceFacade extends SprykerPriceFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getFactory()->createDemoDataInstaller($messenger)->install();
    }

}
