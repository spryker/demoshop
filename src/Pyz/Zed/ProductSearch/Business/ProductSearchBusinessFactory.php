<?php

namespace Pyz\Zed\ProductSearch\Business;

use Pyz\Zed\Collector\Business\CollectorFacade;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface;
use Spryker\Shared\Library\Storage\StorageInstanceBuilder;
use Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException;
use Spryker\Zed\ProductSearch\Business\Builder\ProductResourceKeyBuilder;
use Spryker\Zed\ProductSearch\Business\Operation\OperationInterface;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManager;
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
use Spryker\Zed\ProductSearch\ProductSearchDependencyProvider;

class ProductSearchBusinessFactory extends SprykerProductSearchBusinessFactory
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductAttributeMappingInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new ProductAttributeMappingInstall(
            $this->createOperationManager(),
            $this->getLocaleFacade(),
            $this->getTouchFacade()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ProductAttributesTransformerInterface
     */
    public function createProductAttributesTransformer()
    {
        return new ProductAttributesTransformer(
                    $this->getProductSearchQueryContainer(),
                    $this->createOperationLocator(),
                    $this->createDefaultOperation()
                );
    }

    /**
     * @return ProductSearchProcessorInterface
     */
    public function createProductSearchProcessor()
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
    public function createInstaller(MessengerInterface $messenger)
    {
        $collectorFacade = $this->getCollectorFacade();

        $installer = new InstallProductSearch(
            StorageInstanceBuilder::getElasticsearchInstance(),
            $collectorFacade->getSearchIndexName(),
            $collectorFacade->getSearchDocumentType()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @throws ContainerKeyNotFoundException
     *
     * @return CollectorFacade
     */
    protected function getCollectorFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_COLLECTOR);
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
            $this->getProductSearchQueryContainer()
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
