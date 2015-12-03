<?php

namespace Pyz\Zed\ProductSearch\Business;

use SprykerEngine\Shared\Kernel\Messenger\MessengerInterface;
use SprykerFeature\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface;
use SprykerFeature\Shared\Library\Storage\StorageInstanceBuilder;
use SprykerFeature\Zed\ProductSearch\Business\Builder\ProductResourceKeyBuilder;
use SprykerFeature\Zed\ProductSearch\Business\Locator\OperationLocatorInterface;
use SprykerFeature\Zed\ProductSearch\Business\Operation\OperationInterface;
use SprykerFeature\Zed\ProductSearch\Business\Operation\OperationManager;
use SprykerFeature\Zed\ProductSearch\Business\Locator\OperationLocator;
use SprykerFeature\Zed\ProductSearch\Business\Operation\DefaultOperation;
use SprykerFeature\Zed\ProductSearch\Business\Internal\InstallProductSearch;
use SprykerFeature\Zed\ProductSearch\Business\Operation\OperationManagerInterface;
use SprykerFeature\Zed\ProductSearch\Business\Processor\ProductSearchProcessor;
use SprykerFeature\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformer;
use SprykerFeature\Zed\ProductSearch\Business\ProductSearchDependencyContainer as SprykerProductSearchDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall;

class ProductSearchDependencyContainer extends SprykerProductSearchDependencyContainer
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
     * @return OperationLocatorInterface
     */
    protected function createOperationLocator()
    {
        $locator = new OperationLocator();
        $config = $this->getConfig();

        foreach ($config->getPossibleOperations() as $operation) {
            $locator->addOperation($operation);
        }

        return $locator;
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
