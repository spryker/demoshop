<?php

namespace Pyz\Zed\Product\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductBusiness;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Business\Product\ProductManagerInterface;
use SprykerFeature\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use SprykerFeature\Zed\Product\Business\ProductDependencyContainer as SprykerDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;
use Pyz\Zed\Product\ProductConfig;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToLocaleInterface;
use SprykerFeature\Zed\Product\ProductDependencyProvider as SprykerProductDependencyProvider;

/**
 * @method ProductBusiness getFactory()
 * @method ProductConfig getConfig()
 */
class ProductDependencyContainer extends SprykerDependencyContainer
{

    /**
     * @return SimpleAttributeMergeBuilder
     */
    public function createProductBuilder()
    {
        return $this->getFactory()->createBuilderSimpleAttributeMergeBuilder();
    }

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductDataInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataProductDataInstall(
            $this->createAttributeManager(),
            $this->createProductManager(),
            $this->getLocaleFacade(),
            $this->createCSVReader(),
            $this->getConfig()->getDemoDataPath()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ProductManagerInterface
     */
    public function createProductManager()
    {
        return parent::createProductManager();
    }


    /**
     * @return LocaleFacade
     */
    protected function getLocaleFacade()
    {
        return $this->getProvidedDependency(SprykerProductDependencyProvider::FACADE_LOCALE);
    }

}
