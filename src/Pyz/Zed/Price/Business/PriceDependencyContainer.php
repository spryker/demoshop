<?php

namespace Pyz\Zed\Price\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\PriceBusiness;
use SprykerFeature\Zed\Price\Business\PriceDependencyContainer as SprykerPriceDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Price\Business\Internal\DemoData\PriceInstall;

/**
 * @method PriceBusiness getFactory()
 */
class PriceDependencyContainer extends SprykerPriceDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return PriceInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataPriceInstall(
            $this->getLocator()->price()->facade()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}
