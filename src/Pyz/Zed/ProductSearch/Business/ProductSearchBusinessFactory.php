<?php

namespace Pyz\Zed\ProductSearch\Business;

use Spryker\Shared\Kernel\Messenger\MessengerInterface;
use Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface;
use Spryker\Shared\Library\Storage\StorageInstanceBuilder;
use Spryker\Zed\ProductSearch\Business\Builder\ProductResourceKeyBuilder;
use Spryker\Zed\ProductSearch\Business\Locator\OperationLocatorInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManager;
use Spryker\Zed\ProductSearch\Business\Locator\OperationLocator;
use Spryker\Zed\ProductSearch\Business\Operation\DefaultOperation;
use Spryker\Zed\ProductSearch\Business\Internal\InstallProductSearch;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use Spryker\Zed\ProductSearch\Business\Processor\ProductSearchProcessor;
use Spryker\Zed\ProductSearch\Business\Processor\ProductSearchProcessorInterface;
use Spryker\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformer;
use Spryker\Zed\ProductSearch\Business\ProductSearchBusinessFactory as SprykerProductSearchBusinessFactory;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall;
use Spryker\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformerInterface;

class ProductSearchBusinessFactory extends SprykerProductSearchBusinessFactory
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductAttributeMappingInstall
     */
    public function getDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new ProductAttributeMappingInstall(
            $this->createOperationManager(),
            $this->createLocaleFacade(),
            $this->createTouchFacade()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ProductAttributesTransformerInterface
     */
    public function getProductAttributesTransformer()
    {
        return new ProductAttributesTransformer(
                    $this->createProductSearchQueryContainer(),
                    $this->createOperationLocator(),
                    $this->createDefaultOperation()
                );
    }

    /**
     * @return ProductSearchProcessorInterface
     */
    public function getProductSearchProcessor()
    {
        return new ProductSearchProcessor(
                    $this->createKeyBuilder(),
                    $this->getStoreName()
                );
    }

    /**
     * @param MessengerInterface $messenger
     *
     * @return InstallProductSearch
     */
    public function getInstaller(MessengerInterface $messenger)
    {
        $collectorFacade = $this->getLocator()->collector()->facade();

        $installer = new InstallProductSearch(
            StorageInstanceBuilder::getElasticsearchInstance(),
            $collectorFacade->getSearchIndexName(),
            $collectorFacade->getSearchDocumentType()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return OperationInterface
     */
    protected function createDefaultOperation()
    {
        return new DefaultOperation();
    }

    /**
     * @return OperationManagerInterface
     */
    protected function createOperationManager()
    {
        return new OperationManager(
            $this->createProductSearchQueryContainer(),
            $this->getLocator()
        );
    }

    /**
     * @return KeyBuilderInterface
     */
    public function createKeyBuilder()
    {
        return new ProductResourceKeyBuilder();
    }

}
