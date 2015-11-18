<?php

namespace Pyz\Zed\Tax\Business;

use Psr\Log\LoggerInterface;
use SprykerFeature\Zed\Tax\Business\TaxFacade as SprykerTaxFacade;

/**
 * @method TaxDependencyContainer getDependencyContainer()
 */
class TaxFacade extends SprykerTaxFacade
{

    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }


}