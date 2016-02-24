<?php

namespace Pyz\Zed\ProductOption\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\InMemoryBatchProcessor;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Db\MysqlBatchStorageProvider;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Decorator\InMemoryProductOptionQueryContainer;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Model\BatchedDataImportWriter;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\XMLOptionsReader;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\XMLProductReader;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLOptionsTransformer;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLProductTransformer;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductOptionImporterVisitor;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductOptionUsageImporterVisitor;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\OptionWriter;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\ProductOptionWriter;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall;
use Pyz\Zed\ProductOption\ProductOptionConfig;
use Pyz\Zed\ProductOption\ProductOptionDependencyProvider;
use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\ProductOption\Business\Model\ProductOptionReader;
use Spryker\Zed\ProductOption\Business\ProductOptionBusinessFactory as SprykerBusinessFactory;

/**
 * @method \Pyz\Zed\ProductOption\ProductOptionConfig getConfig()
 */
class ProductOptionBusinessFactory extends SprykerBusinessFactory
{

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installer = new ProductOptionDataInstall(
            $this->createOptionsWriter(),
            $this->createProductOptionWriter()
        );

        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface
     */
    public function createOptionsReader()
    {
        return new XMLOptionsReader(
            $this->getConfig()->getOptionsDemoDataPath(),
            $this->createXMLOptionsTransformer()
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface
     */
    public function createProductOptionReader()
    {
        return new XMLProductReader(
            $this->getConfig()->getProductOptionDemoDataPath(),
            $this->createXMLProductTransformer()
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLTransformerInterface
     */
    public function createXMLOptionsTransformer()
    {
        return new XMLOptionsTransformer();
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLTransformerInterface
     */
    public function createXMLProductTransformer()
    {
        return new XMLProductTransformer();
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface
     */
    public function createOptionsVisitor()
    {
        return new ProductOptionImporterVisitor(
            $this->getProductOptionFacade()
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface
     */
    public function createProductVisitor()
    {
        return new ProductOptionUsageImporterVisitor(
            $this->getProductOptionFacade()
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\WriterInterface
     */
    public function createOptionsWriter()
    {
        return new OptionWriter(
            $this->createOptionsReader(),
            [$this->createOptionsVisitor()]
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\WriterInterface
     */
    public function createProductOptionWriter()
    {
        return new ProductOptionWriter(
            $this->createProductOptionReader(),
            [$this->createProductVisitor()]
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\ProductOptionFacade
     */
    public function getProductOptionFacade()
    {
        return $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT_OPTION);
    }

    /**
     * @return \Spryker\Zed\ProductOption\Business\Model\DataImportWriterInterface
     */
    public function createDataImportWriterModel()
    {
        $dbAdapter = $this->getConfig()->getDatabaseAdapter();

        if ($dbAdapter !== ProductOptionConfig::ADAPTER_MYSQL) {
            return parent::createDataImportWriterModel();
        }

        return new BatchedDataImportWriter(
            $this->createInMemoryProductOptionQueryContainer(),
            $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT),
            $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_LOCALE),
            $this->createInMemoryBatchProcessor()
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Decorator\InMemoryProductOptionQueryContainer
     */
    protected function createInMemoryProductOptionQueryContainer()
    {
        return new InMemoryProductOptionQueryContainer(
            $this->getQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\ProductOption\Business\Model\ProductOptionReaderInterface
     */
    public function createProductOptionReaderModel()
    {
        return new ProductOptionReader(
            $this->getQueryContainer(),
            $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_LOCALE)
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\InMemoryBatchProcessor
     */
    protected function createInMemoryBatchProcessor()
    {
        return new InMemoryBatchProcessor(
            $this->createMySqlBatchStorageProvider()
        );
    }

    /**
     * @return \Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Db\MysqlBatchStorageProvider
     */
    protected function createMySqlBatchStorageProvider()
    {
        return new MysqlBatchStorageProvider();
    }

}
