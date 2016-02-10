<?php

namespace Pyz\Zed\Product\Business;

use Spryker\Zed\Messenger\Business\Model\MessengerInterface;
use Spryker\Zed\Product\Business\Product\ProductManager;
use Spryker\Zed\Product\Business\Attribute\AttributeManager;
use Spryker\Zed\Product\Business\Internal\Install;
use Spryker\Zed\Product\Business\Model\ProductBatchResult;
use Spryker\Zed\Product\Business\Importer\Writer\Db\ProductConcreteWriter;
use Spryker\Zed\Product\Business\Importer\Writer\Db\ProductAbstractWriter;
use Spryker\Zed\Product\Business\Importer\Writer\ProductWriter;
use Spryker\Zed\Product\Business\Importer\Builder\ProductBuilder;
use Spryker\Zed\Product\Business\Importer\Reader\File\CsvReader;
use Spryker\Zed\Product\Business\Importer\Validator\ImportProductValidator;
use Spryker\Zed\Product\Business\Importer\FileImporter;
use Spryker\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use Spryker\Zed\Product\Business\ProductBusinessFactory as SprykerBusinessFactory;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;

/**
 * @method \Pyz\Zed\Product\ProductConfig getConfig()
 */
class ProductBusinessFactory extends SprykerBusinessFactory
{

    /**
     * @return \Spryker\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder
     */
    public function createProductBuilder()
    {
        return new SimpleAttributeMergeBuilder();
    }

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall
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
     * @return \Spryker\Zed\Product\Business\Importer\FileImporter
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
     * @return \Spryker\Zed\Product\Business\Importer\Validator\ImportProductValidator
     */
    protected function createImportProductValidator()
    {
        return new ImportProductValidator();
    }

    /**
     * @return \Spryker\Zed\Product\Business\Importer\Reader\File\IteratorReaderInterface
     */
    protected function createCSVReader()
    {
        return new CsvReader();
    }

    /**
     * @return \Spryker\Zed\Product\Business\Builder\ProductBuilderInterface
     */
    protected function createImportProductBuilder()
    {
        return new ProductBuilder();
    }

    /**
     * @return \Spryker\Zed\Product\Business\Importer\Writer\ProductWriterInterface
     */
    protected function createProductWriter()
    {
        return new ProductWriter(
            $this->createProductAbstractWriter(),
            $this->createProductConcreteWriter()
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\Importer\Writer\ProductAbstractWriterInterface
     */
    protected function createProductAbstractWriter()
    {
        return new ProductAbstractWriter(
            $this->getCurrentLocale()
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\Importer\Writer\ProductConcreteWriterInterface
     */
    protected function createProductConcreteWriter()
    {
        return new ProductConcreteWriter(
            $this->getCurrentLocale()
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\Model\ProductBatchResultInterface
     */
    protected function createProductBatchResult()
    {
        return new ProductBatchResult();
    }

    /**
     * @param \Spryker\Zed\Messenger\Business\Model\MessengerInterface $messenger
     *
     * @return \Spryker\Zed\Product\Business\Internal\Install
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
     * @return \Spryker\Zed\Product\Business\Attribute\AttributeManagerInterface
     */
    public function createAttributeManager()
    {
        return new AttributeManager(
            $this->getQueryContainer()
        );
    }

    /**
     * @return \Spryker\Zed\Product\Business\Product\ProductManagerInterface
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
