<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ProductSearch\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall;
use Spryker\Shared\Library\Storage\StorageInstanceBuilder;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\ProductSearch\Business\Builder\ProductResourceKeyBuilder;
use Spryker\Zed\ProductSearch\Business\Internal\InstallProductSearch;
use Spryker\Zed\ProductSearch\Business\Operation\DefaultOperation;
use Spryker\Zed\ProductSearch\Business\Operation\OperationManager;
use Spryker\Zed\ProductSearch\Business\Processor\ProductSearchProcessor;
use Spryker\Zed\ProductSearch\Business\ProductSearchBusinessFactory as SprykerProductSearchBusinessFactory;
use Spryker\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformer;
use Spryker\Zed\ProductSearch\ProductSearchDependencyProvider;

class ProductSearchBusinessFactory extends SprykerProductSearchBusinessFactory
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\ProductSearch\Business\Internal\DemoData\ProductAttributeMappingInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
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
     * @return \Spryker\Zed\ProductSearch\Business\Transformer\ProductAttributesTransformerInterface
     */
    public function createProductAttributesTransformer()
    {
        return new ProductAttributesTransformer(
            $this->getQueryContainer(),
            $this->createOperationLocator(),
            $this->createDefaultOperation()
        );
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\Processor\ProductSearchProcessorInterface
     */
    public function createProductSearchProcessor()
    {
        return new ProductSearchProcessor(
            $this->createKeyBuilder(),
            $this->getStoreName()
        );
    }

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Spryker\Zed\ProductSearch\Business\Internal\InstallProductSearch
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
     * @throws \Spryker\Zed\Kernel\Exception\Container\ContainerKeyNotFoundException
     *
     * @return \Pyz\Zed\Collector\Business\CollectorFacade
     */
    protected function getCollectorFacade()
    {
        return $this->getProvidedDependency(ProductSearchDependencyProvider::FACADE_COLLECTOR);
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\Operation\OperationInterface
     */
    protected function createDefaultOperation()
    {
        return new DefaultOperation();
    }

    /**
     * @return \Spryker\Zed\ProductSearch\Business\Operation\OperationManagerInterface
     */
    protected function createOperationManager()
    {
        return new OperationManager(
            $this->getQueryContainer()
        );
    }

    /**
     * @return \Spryker\Shared\Collector\Code\KeyBuilder\KeyBuilderInterface
     */
    public function createKeyBuilder()
    {
        return new ProductResourceKeyBuilder();
    }

}
