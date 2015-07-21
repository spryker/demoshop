<?php

namespace Pyz\Zed\ProductOption\Business;

use SprykerFeature\Zed\ProductOption\Business\ProductOptionFacade as SprykerProductOptionFacade;
use SprykerFeature\Zed\ProductOptionExporter\Dependency\Facade\ProductOptionExporterToProductOptionInterface;
use SprykerFeature\Zed\ProductOptionCartConnector\Dependency\Facade\ProductOptionCartConnectorToProductOptionInterface;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall;

/**
 * @method ProductOptionDependencyContainer getDependencyContainer()
 */
class ProductOptionFacade extends SprykerProductOptionFacade implements
    ProductOptionExporterToProductOptionInterface,
    ProductOptionCartConnectorToProductOptionInterface
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductOptionDataInstall
     */
    public function installDemoData(LoggerInterface $messenger)
    {
        $this->getDependencyContainer()->createDemoDataInstaller($messenger)->install();
    }

}
