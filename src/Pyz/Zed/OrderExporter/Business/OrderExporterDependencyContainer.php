<?php

namespace Pyz\Zed\OrderExporter\Business;

use Pyz\Zed\OrderExporter\OrderExporterDependencyProvider;
use SprykerEngine\Zed\Kernel\Business\AbstractBusinessDependencyContainer;
use Generated\Zed\Ide\FactoryAutoCompletion\OrderExporterBusiness;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesFacade;
use Pyz\Zed\OrderExporter\OrderExporterConfig;
use Pyz\Zed\OrderExporter\Business\Model\MailSenderInterface;
use Pyz\Zed\OrderExporter\Business\Model\AbstractAfterbuyResponseWriter;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToUrlFacade;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToProductFacade;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToAdyenFacade;

/**
 * @method OrderExporterConfig getConfig()
 * @method OrderExporterBusiness getFactory()
 */
class OrderExporterDependencyContainer extends AbstractBusinessDependencyContainer
{

    /**
     * @return OrderExporterToSalesFacade
     * @throws \ErrorException
     */
    public function getSalesFacade()
    {
        return $this->getProvidedDependency(OrderExporterDependencyProvider::FACADE_SALES);
    }

    /**
     * @return Model\OrderExportManager
     */
    public function createOrderExportManager()
    {
        return $this->getFactory()->createModelOrderExportManager(
            $this->getQueryContainer()
        );
    }

    /**
     * @return Model\AfterbuyExportManager
     */
    public function createAfterbuyExportManager()
    {
        return $this->getFactory()->createModelAfterbuyExportManager(
            $this->getConfig(),
            $this->getAfterbuyConnector(),
            $this->getSalesFacade(),
            $this->getUrlFacade(),
            $this->getProductFacade(),
            $this->getAdyenFacade()
        );
    }

    /**
     * @return Model\AbstractAfterbuyConnector
     */
    public function createAfterbuyConnector()
    {
        return $this->getFactory()->createModelAfterbuyConnector(
            $this->getConfig(),
            $this->createAfterbuyResponseWriter()
        );
    }

    /**
     * @return Model\AbstractAfterbuyConnector
     */
    public function createAfterbuyConnectorProduction()
    {
        return $this->getFactory()->createModelAfterbuyConnectorProduction(
            $this->getConfig(),
            $this->createAfterbuyResponseWriterProduction()
        );
    }

    /**
     * @return MailSenderInterface
     */
    public function createMailSender()
    {
        return $this->getFactory()->createModelMailSender(
            $this->getConfig()
        );
    }

    /**
     * @return AbstractAfterbuyResponseWriter
     */
    public function createAfterbuyResponseWriter()
    {
        return $this->getFactory()->createModelAfterbuyResponseWriter();
    }

    /**
     * @return AbstractAfterbuyResponseWriter
     */
    public function createAfterbuyResponseWriterProduction()
    {
        return $this->getFactory()->createModelAfterbuyResponseWriterProduction(
            $this->createMailSender()
        );
    }

    /**
     * @return Model\AbstractAfterbuyConnector
     */
    protected function getAfterbuyConnector()
    {
        if ($this->getConfig()->getIsExportEnabled()) {
            return $this->createAfterbuyConnectorProduction();
        }

        return $this->createAfterbuyConnector();
    }

    /**
     * @return OrderExporterToUrlFacade
     * @throws \ErrorException
     */
    protected function getUrlFacade()
    {
        return $this->getProvidedDependency(OrderExporterDependencyProvider::FACADE_URL);
    }

    /**
     * @return OrderExporterToProductFacade
     * @throws \ErrorException
     */
    protected function getProductFacade()
    {
        return $this->getProvidedDependency(OrderExporterDependencyProvider::FACADE_PRODUCT);
    }

    /**
     * @return OrderExporterToAdyenFacade
     * @throws \ErrorException
     */
    protected function getAdyenFacade()
    {
        return $this->getProvidedDependency(OrderExporterDependencyProvider::FACADE_ADYEN);
    }

}
