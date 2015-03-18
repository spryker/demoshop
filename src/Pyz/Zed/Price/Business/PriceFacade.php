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
     * @param LoggerInterface $logger
     */
    public function installDemoData(LoggerInterface $logger = null)
    {
        $this->dependencyContainer->getDemoDataInstaller($logger)->install();
    }

}
