<?php

namespace Pyz\Zed\Product\Business;

use SprykerFeature\Zed\Product\Business\Product\ProductManager;
use SprykerFeature\Zed\Product\Business\Attribute\AttributeManager;
use SprykerFeature\Zed\Product\Business\Internal\Install;
use SprykerFeature\Zed\Product\Business\Model\ProductBatchResult;
use SprykerFeature\Zed\Product\Business\Importer\Writer\Db\ConcreteProductWriter;
use SprykerFeature\Zed\Product\Business\Importer\Writer\Db\AbstractProductWriter;
use SprykerFeature\Zed\Product\Business\Importer\Writer\ProductWriter;
use SprykerFeature\Zed\Product\Business\Importer\Builder\ProductBuilder;
use SprykerFeature\Zed\Product\Business\Importer\Reader\File\CsvReader;
use SprykerFeature\Zed\Product\Business\Importer\Validator\ImportProductValidator;
use SprykerFeature\Zed\Product\Business\Importer\FileImporter;
use SprykerFeature\Zed\Product\Business\Importer\Upload\UploadedFileImporter;
use Generated\Zed\Ide\FactoryAutoCompletion\ProductBusiness;
use SprykerFeature\Zed\Product\Business\Builder\SimpleAttributeMergeBuilder;
use SprykerFeature\Zed\Product\Business\ProductDependencyContainer as SprykerDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Product\Business\Internal\DemoData\ProductDataInstall;
use Pyz\Zed\Product\ProductConfig;

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
        return new SimpleAttributeMergeBuilder();
    }

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductDataInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
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
     * @return UploadedFileImporter
     */
    public function createHttpFileImporter()
    {
        return new UploadedFileImporter(
                    $this->getConfig()->getDestinationDirectoryForUploads()
                );
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
                    $this->createAbstractProductWriter(),
                    $this->createConcreteProductWriter()
                );
    }

    /**
     * @return AbstractProductWriterInterface
     */
    protected function createAbstractProductWriter()
    {
        return new AbstractProductWriter(
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
    public function createInstaller(\SprykerEngine\Shared\Kernel\Messenger\MessengerInterface $messenger)
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
