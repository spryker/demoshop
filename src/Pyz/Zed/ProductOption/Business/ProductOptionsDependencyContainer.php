<?php

namespace Pyz\Zed\ProductOption\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductOptionBusiness;
use SprykerFeature\Zed\ProductOption\Business\ProductOptionDependencyContainer as SprykerDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOption\ProductOptionConfig;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\ProductOptionDataInstall;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\OptionsVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Transformer\XMLTransformerInterface;
use Pyz\Zed\ProductOption\Business\Internal\DemoData\Importer\Writer\WriterInterface;

/**
 * @method ProductOptionBusiness getFactory()
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
        $installer = $this->getFactory()->createInternalDemoDataProductOptionDataInstall(
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
        return $this->getFactory()->createInternalDemoDataImporterReaderXMLOptionsReader(
            $this->getConfig()->getOptionsDemoDataPath(),
            $this->createXMLOptionsTransformer()
        );
    }

    /**
     * @return ProductReaderInterface
     */
    public function createProductOptionReader()
    {
        return $this->getFactory()->createInternalDemoDataImporterReaderXMLProductReader(
            $this->getConfig()->getProductOptionDemoDataPath(),
            $this->createXMLProductTransformer()
        );
    }

    /**
     * @return XMLTransformerInterface
     */
    public function createXMLOptionsTransformer()
    {
        return $this->getFactory()->createInternalDemoDataImporterTransformerXMLOptionsTransformer();
    }

    /**
     * @return XMLTransformerInterface
     */
    public function createXMLProductTransformer()
    {
        return $this->getFactory()->createInternalDemoDataImporterTransformerXMLProductTransformer();
    }

    /**
     * @return OptionsVisitorInterface
     */
    public function createOptionsVisitor()
    {
        return $this->getFactory()->createInternalDemoDataImporterVisitorOptionsImporterVisitor(
            $this->getLocator()->productOptions()->facade()
        );
    }

    /**
     * @return ProductVisitorInterface
     */
    public function createProductVisitor()
    {
        return $this->getFactory()->createInternalDemoDataImporterVisitorProductOptionImporterVisitor(
            $this->getLocator()->productOptions()->facade()
        );
    }

    /**
     * @return WriterInterface
     */
    public function createOptionsWriter()
    {
        return $this->getFactory()->createInternalDemoDataImporterWriterOptionWriter(
            $this->createOptionsReader(),
            [$this->createOptionsVisitor()]
        );
    }

    /**
     * @return WriterInterface
     */
    public function createProductOptionWriter()
    {
        return $this->getFactory()->createInternalDemoDataImporterWriterProductOptionWriter(
            $this->createProductOptionReader(),
            [$this->createProductVisitor()]
        );
    }
}

