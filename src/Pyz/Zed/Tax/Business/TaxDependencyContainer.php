<?php

namespace Pyz\Zed\Tax\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Tax\Business\Internal\DemoData\TaxDataInstall;
use Pyz\Zed\Tax\TaxDependencyProvider;
use SprykerFeature\Zed\Tax\Business\TaxDependencyContainer as SprykerTaxDependencyContainer;
use Generated\Zed\Ide\FactoryAutoCompletion\TaxBusiness;
use SprykerFeature\Zed\Tax\TaxConfig;

/**
 * @method TaxBusiness getFactory()
 * @method TaxConfig getConfig()
 */

class TaxDependencyContainer extends SprykerTaxDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return TaxDataInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataTaxDataInstall(
            $this->getProvidedDependency(TaxDependencyProvider::FACADE_TAX)
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

}