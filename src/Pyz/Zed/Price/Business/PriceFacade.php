<?php

namespace Pyz\Zed\Price\Business;

use SprykerFeature\Zed\Price\Business\PriceFacade as SprykerPriceFacade;
use Psr\Log\LoggerInterface;

/**
 * @method PriceDependencyContainer getDependencyContainer()
 */
class PriceFacade extends SprykerPriceFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->getDemoDataInstaller($messenger)->install();
    }

}
