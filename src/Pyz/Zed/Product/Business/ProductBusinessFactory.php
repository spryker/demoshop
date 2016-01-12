<?php

namespace Pyz\Zed\Product\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface;
use Spryker\Zed\Product\Business\Builder\ProductBuilderInterface;
use Spryker\Zed\Product\Business\Importer\Reader\File\IteratorReaderInterface;
use Spryker\Zed\Product\Business\Importer\Writer\ProductAbstractWriterInterface;
use Spryker\Zed\Product\Business\Importer\Writer\ConcreteProductWriterInterface;
use Spryker\Zed\Product\Business\Importer\Writer\ProductWriterInterface;
use Spryker\Zed\Product\Business\Model\ProductBatchResultInterface;
use Spryker\Zed\Product\Business\Product\ProductManager;
use Spryker\Zed\Product\Business\Attribute\AttributeManager;
use Spryker\Zed\Product\Business\Internal\Install;
use Spryker\Zed\Product\Business\Model\ProductBatchResult;
use Spryker\Zed\Product\Business\Importer\Writer\Db\ConcreteProductWriter;
use Spryker\Zed\Product\Business\Importer\Writer\Db\ProductAbstractWriter;
use Spryker\Zed\Product\Business\Importer\Writer\ProductWriter;
use Spryker\Zed\Product\Business\Importer\Builder\ProductBuilder;
use Spryker\Zed\Product\Business\Importer\Reader\File\CsvReader;
use Spryker\Zed\Product\Business\Importer\Validator\ImportProductValidator;
use Spryker\Zed\Product\Business\Importer\FileImporter;
use Spryker\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use Spryker\Zed\Product\Business\Product\ProductManagerInterface;
use Spryker\Zed\Product\Business\ProductBusinessFactory as SprykerBusinessFactory;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;
use Pyz\Zed\Product\ProductConfig;

/**
 * @method ProductConfig getConfig()
 */
class ProductBusinessFactory extends SprykerBusinessFactory
{

    /**
     * @return SimpleAttributeMergeBuilder
     */
    public function createProductBuilder()
    {
        return new SimpleAttributeMergeBuilder();
    }

    /**
     * @param MessengerInterface $messenger
     *
     * @return ProductDataInstall
     */
    public function createDemoDataInstaller(MessengerInterface $messenger)
    {
        $installer = new ProductDataInstall(
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
     * @return FileImporter
     */
    public function createProductImporter()
    {
        $importer = new FileImporter(
            $this->createImportProductValidator(),
            $this->createCSVReader(),
            $this->createImportProductBuilder(),
            $this->createProductWriter(),
            $this->createProductBatchResult()
        );

        return $importer;
    }

    /**
     * @return ImportProductValidator
     */
    protected function createImportProductValidator()
    {
        return new ImportProductValidator();
    }

    /**
     * @return IteratorReaderInterface
     */
    protected function createCSVReader()
    {
        return new CsvReader();
    }

    /**
     * @return ProductBuilderInterface
     */
    protected function createImportProductBuilder()
    {
        return new ProductBuilder();
    }

    /**
     * @return ProductWriterInterface
     */
    protected function createProductWriter()
    {
        return new ProductWriter(
            $this->createProductAbstractWriter(),
            $this->createConcreteProductWriter()
        );
    }

    /**
     * @return ProductAbstractWriterInterface
     */
    protected function createProductAbstractWriter()
    {
        return new ProductAbstractWriter(
            $this->getCurrentLocale()
        );
    }

    /**
     * @return ConcreteProductWriterInterface
     */
    protected function createConcreteProductWriter()
    {
        return new ConcreteProductWriter(
            $this->getCurrentLocale()
        );
    }

    /**
     * @return ProductBatchResultInterface
     */
    protected function createProductBatchResult()
    {
        return new ProductBatchResult();
    }

    /**
     * @param MessengerInterface $messenger
     *
     * @return Install
     */
    public function createInstaller(MessengerInterface $messenger)
    {
        $installer = new Install(
            $this->createAttributeManager()
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return AttributeManagerInterface
     */
    public function createAttributeManager()
    {
        return new AttributeManager(
            $this->getQueryContainer()
        );
    }

    /**
     * @return ProductManagerInterface
     */
    public function createProductManager()
    {
        if ($this->productManager === null) {
            $this->productManager = new ProductManager(
                $this->getQueryContainer(),
                $this->getTouchFacade(),
                $this->getUrlFacade(),
                $this->getLocaleFacade()
            );
        }

        return $this->productManager;
    }

}
