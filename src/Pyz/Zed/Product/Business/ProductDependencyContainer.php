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
            $this->createAttributeManager(),
            $this->createProductManager(),
            $this->createLocaleFacade(),
            $this->createCSVReader(),
            $this->createSettings()->getDemoDataPath()
        );
        $installer->setLogger($logger);

        return $installer;
    }

    /**
     * @return ProductSettings
     */
    public function createSettings()
    {
        return $this->factory->createProductSettings();
    }
}
