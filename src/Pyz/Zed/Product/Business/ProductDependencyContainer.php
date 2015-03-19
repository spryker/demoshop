<?php

namespace Pyz\Zed\Product\Business;

use ProjectA\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use ProjectA\Zed\Product\Business\ProductDependencyContainer as CoreDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;

class ProductDependencyContainer extends CoreDependencyContainer
{
    /**
     * @return SimpleAttributeMergeBuilder
     */
    public function getProductBuilder()
    {
        return $this->factory->createBuilderSimpleAttributeMergeBuilder();
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return ProductDataInstall
     */
    public function getDemoDataInstaller(LoggerInterface $logger = null)
    {
        $installer = $this->factory->createInternalDemoDataProductDataInstall(
            $this->getAttributeManager(),
            $this->getProductManager(),
            $this->getLocaleFacade(),
            $this->getCSVReader(),
            $this->getCSVPath()
        );
        $installer->setLogger($logger);

        return $installer;
    }

    /**
     * @return string
     */
    protected function getCSVPath()
    {
        return __DIR__ . '/Internal/DemoData/demo-product-data.csv';
    }
}
