<?php

namespace Pyz\Zed\ProductOptions\Business;

use Generated\Zed\Ide\FactoryAutoCompletion\ProductOptionsBusiness;
use SprykerFeature\Zed\ProductOptions\Business\ProductOptionsDependencyContainer as SprykerDependencyContainer;
use Psr\Log\LoggerInterface;
use Pyz\Zed\ProductOptions\ProductOptionsConfig;
use Pyz\Zed\ProductOptions\Business\ProductOptionsFacade;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\ProductOptionsDataInstall;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\OptionsVisitorInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Reader\OptionReaderInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Visitor\ProductVisitorInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Reader\ProductReaderInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Transformer\XMLTransformerInterface;
use Pyz\Zed\ProductOptions\Business\Internal\DemoData\Importer\Writer\WriterInterface;

/**
 * @method ProductOptionsBusiness getFactory()
 * @method ProductOptionsConfig getConfig()
 */
class ProductOptionsDependencyContainer extends SprykerDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductOptionsDataInstall
     */
    public function createDemoDataInstaller(LoggerInterface $messenger)
    {
        $installer = $this->getFactory()->createInternalDemoDataProductOptionsDataInstall(
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
            $this->getConfig()->getProductOptionsDemoDataPath(),
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
        return $this->getFactory()->createInternalDemoDataImporterVisitorDbOptionsVisitor(
            $this->getLocator()->productOptions()->facade()
        );
    }

    /**
     * @return ProductVisitorInterface
     */
    public function createProductVisitor()
    {
        return $this->getFactory()->createInternalDemoDataImporterVisitorDbProductVisitor(
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

