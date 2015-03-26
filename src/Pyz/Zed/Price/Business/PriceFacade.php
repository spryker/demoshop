<?php

namespace Pyz\Zed\Price\Business;

use ProjectA\Zed\Kernel\Business\AbstractFacade;
use ProjectA\Zed\Price\Business\PriceFacade as SprykerPriceFacade;
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
    public function installDemoData(LoggerInterface $messenger = null)
    {
        $this->dependencyContainer->getDemoDataInstaller($messenger)->install();
    }

}
