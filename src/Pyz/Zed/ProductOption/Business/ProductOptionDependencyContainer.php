<?php

namespace Pyz\Zed\ProductOption\Business;

use Spryker\Zed\ProductOption\Business\Model\ProductOptionReader;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Db\MysqlBatchStorageProvider;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\BatchProcessor\InMemoryBatchProcessor;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Decorator\InMemoryProductOptionQueryContainer;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Model\BatchedDataImportWriter;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\ProductOptionWriter;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\OptionWriter;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductOptionUsageImporterVisitor;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductOptionImporterVisitor;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLProductTransformer;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLOptionsTransformer;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\XMLProductReader;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\XMLOptionsReader;
use Spryker\Zed\ProductOption\Business\ProductOptionDependencyContainer as SprykerDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOption\ProductOptionConfig;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLTransformerInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\WriterInterface;
use Pyz\Zed\ProductOption\ProductOptionDependencyProvider;
use Spryker\Zed\ProductOption\Business\Model\DataImportWriterInterface;

/**
 * @method ProductOptionConfig getConfig()
 */
class ProductOptionDependencyContainer extends SprykerDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductOptionDataInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = new ProductOptionDataInstall(
            $this->createOptionsWriter(),
            $this->createProductOptionWriter()
        );

        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return OptionReaderInterface
     */
    public function createOptionsReader()
    {
        return new XMLOptionsReader(
            $this->getConfig()->getOptionsDemoDataPath(),
            $this->createXMLOptionsTransformer()
        );
    }

    /**
     * @return ProductReaderInterface
     */
    public function createProductOptionReader()
    {
        return new XMLProductReader(
            $this->getConfig()->getProductOptionDemoDataPath(),
            $this->createXMLProductTransformer()
        );
    }

    /**
     * @return XMLTransformerInterface
     */
    public function createXMLOptionsTransformer()
    {
        return new XMLOptionsTransformer();
    }

    /**
     * @return XMLTransformerInterface
     */
    public function createXMLProductTransformer()
    {
        return new XMLProductTransformer();
    }

    /**
     * @return OptionVisitorInterface
     */
    public function createOptionsVisitor()
    {
        return new ProductOptionImporterVisitor(
            $this->getProductOptionFacade()
        );
    }

    /**
     * @return ProductVisitorInterface
     */
    public function createProductVisitor()
    {
        return new ProductOptionUsageImporterVisitor(
            $this->getProductOptionFacade()
        );
    }

    /**
     * @return WriterInterface
     */
    public function createOptionsWriter()
    {
        return new OptionWriter(
            $this->createOptionsReader(),
            [$this->createOptionsVisitor()]
        );
    }

    /**
     * @return WriterInterface
     */
    public function createProductOptionWriter()
    {
        return new ProductOptionWriter(
            $this->createProductOptionReader(),
            [$this->createProductVisitor()]
        );
    }

    /**
     * @return ProductOptionFacade
     */
    public function getProductOptionFacade()
    {
        return $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT_OPTION);
    }

    /**
     * @return DataImportWriterInterface
     */
    public function getDataImportWriterModel()
    {
        $dbAdapter = $this->getConfig()->getDatabaseAdapter();

        if ($dbAdapter !== ProductOptionConfig::ADAPTER_MYSQL) {
            return parent::getDataImportWriterModel();
        }

        return new BatchedDataImportWriter(
            $this->createInMemoryProductOptionQueryContainer(),
            $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_PRODUCT),
            $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_LOCALE),
            $this->createInMemoryBatchProcessor()
        );
    }

    /**
     * @return InMemoryProductOptionQueryContainer
     */
    protected function createInMemoryProductOptionQueryContainer()
    {
        return new InMemoryProductOptionQueryContainer(
            $this->getQueryContainer()
        );
    }

    /**
     * @return ProductOptionReaderInterface
     */
    public function getProductOptionReaderModel()
    {
        return new ProductOptionReader(
            $this->getQueryContainer(),
            $this->getProvidedDependency(ProductOptionDependencyProvider::FACADE_LOCALE)
        );
    }

    /**
     * @return InMemoryBatchProcessor
     */
    protected function createInMemoryBatchProcessor()
    {
        return new InMemoryBatchProcessor(
            $this->createMySqlBatchStorageProvider()
        );
    }

    /**
     * @return MysqlBatchStorageProvider
     */
    protected function createMySqlBatchStorageProvider()
    {
        return new MysqlBatchStorageProvider();
    }

}
