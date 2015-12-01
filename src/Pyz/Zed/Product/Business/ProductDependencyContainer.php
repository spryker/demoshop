<?php

namespace Pyz\Zed\Product\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductBusiness;
use Pyz\Zed\Cms\Business\CmsFacade;
use Pyz\Zed\Locale\Business\LocaleFacade;
use Pyz\Zed\Product\Business\Product\ProductManagerInterface;
use Pyz\Zed\Product\Business\Attribute\AttributeConverterInterface;
use Pyz\Zed\Product\Business\Attribute\MediaAttributeSplitter;
use Pyz\Zed\Product\ProductDependencyProvider;
use SprykerFeature\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use SprykerFeature\Zed\Product\Business\ProductDependencyContainer as SprykerDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;
use Pyz\Zed\Product\ProductConfig;
use SprykerFeature\Zed\Product\ProductDependencyProvider as SprykerProductDependencyProvider;
use Pyz\Zed\Product\Business\Product\ProductBundleManagerInterface;

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
            $this->getProvidedDependency(ProductDependencyProvider::FACADE_PRODUCT_DYNAMIC_IMPORTER),
            $this->getConfig()->getDemoDataPath()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ProductBundleManagerInterface
     */
    public function createProductBundleManager()
    {
        return $this->getFactory()->createProductProductBundleManager(
            $this->getQueryContainer()
        );
    }

    /**
     * @return ProductManagerInterface
     */
    public function createProductManager()
    {
        if ($this->productManager === null) {
            $this->productManager = $this->getFactory()->createProductProductManager(
                $this->getQueryContainer(),
                $this->getTouchFacade(),
                $this->getUrlFacade(),
                $this->getLocaleFacade(),
                $this->getCmsFacade()
            );
        }

        return $this->productManager;
    }

    /**
     * @return LocaleFacade
     */
    protected function getLocaleFacade()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::FACADE_LOCALE);
    }
    /**
     * @return CmsFacade
     */
    protected function getCmsFacade()
    {
        return $this->getProvidedDependency(ProductDependencyProvider::FACADE_CMS);
    }

    /**
     * @return AttributeConverterInterface
     */
    public function createAttributeConverter()
    {
        return $this->getFactory()->createAttributeAttributeConverter();
    }

    /**
     * @return MediaAttributeSplitter
     */
    public function createMediaAttributeSplitter()
    {
        return $this->getFactory()->createAttributeMediaAttributeSplitter(
            $this->createAttributeConverter()
        );
    }
}
