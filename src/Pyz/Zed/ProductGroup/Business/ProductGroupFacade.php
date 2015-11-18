<?php

namespace Pyz\Zed\ProductGroup\Business;

use PavFeature\Zed\ProductGroup\Business\ProductGroupFacade as PavProductGroupFacade;
use Psr\Log\LoggerInterface;

/**
 * @method ProductGroupDependencyContainer getDependencyContainer()
 */
class ProductGroupFacade extends PavProductGroupFacade
{



    /**
     * @param LoggerInterface $messenger
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

}