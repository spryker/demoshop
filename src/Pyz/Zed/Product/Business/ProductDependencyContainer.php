<?php

namespace Pyz\Zed\Product\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductBusiness;
use ProjectA\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use ProjectA\Zed\Product\Business\ProductDependencyContainer as SprykerDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;

class ProductDependencyContainer extends SprykerDependencyContainer
{
    /**
     * @var ProductBusiness
     */
    protected $factory;

    /**
     * @return SimpleAttributeMergeBuilder
     */
    public function createProductBuilder()
    {
        return $this->factory->createBuilderSimpleAttributeMergeBuilder();
    }

    /**
     * @param LoggerInterface $logger
     *
     * @return ProductDataInstall
     */
    public function createDemoDataInstaller(LoggerInterface $logger = null)
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
