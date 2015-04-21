<?php

namespace Pyz\Zed\Price\Business;

use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use SprykerFeature\Zed\Price\Business\PriceFacade as SprykerPriceFacade;
use Psr\Log\LoggerInterface;

class PriceFacade extends SprykerPriceFacade
{

    /**
     * @var PriceDependencyContainer
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
