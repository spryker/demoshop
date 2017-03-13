<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater\Business;

use Psr\Log\LoggerInterface;
use Pyz\Zed\Updater\Business\Console\UpdaterConsole;
use Pyz\Zed\Updater\Business\Installer\Product\ProductStockInstaller;
use Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater;
use Pyz\Zed\Updater\UpdaterConfig;
use Pyz\Zed\Updater\UpdaterDependencyProvider;
use Spryker\Zed\Installer\Business\InstallerBusinessFactory as SprykerInstallerBusinessFactory;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @method \Pyz\Zed\Updater\UpdaterConfig getConfig()
 */
class UpdaterBusinessFactory extends SprykerInstallerBusinessFactory
{

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Pyz\Zed\Updater\Business\Console\UpdaterConsole
     */
    public function createIcecatUpdater(OutputInterface $output, LoggerInterface $messenger)
    {
        return new UpdaterConsole(
            $output,
            $messenger,
            $this->getInstallerCollection()
        );
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Importer\ImporterInterface[]
     */
    public function getUpdaterProductStockCollection()
    {
        return [
            UpdaterConfig::RESOURCE_PRODUCT_STOCK => $this->createProductStockUpdater(),
        ];
    }

    /**
     * @return \Pyz\Zed\Updater\Business\Updater\Product\ProductStockUpdater
     */
    public function createProductStockUpdater()
    {
        $productStockUpdater = new ProductStockUpdater(
            $this->getUtilDataReaderService(),
            $this->getLocaleFacade(),
            $this->getStockFacade(),
            $this->getOmsFacade(),
            $this->getProductQueryContainer(),
            $this->getStockQueryContainer(),
            $this->getSalesQueryContainer(),
            $this->getConfig()->getImportDataDirectory()
        );

        return $productStockUpdater;
    }

    /**
     * @return \Pyz\Zed\Updater\Business\Installer\Product\ProductStockInstaller
     */
    public function createProductStockInstaller()
    {
        $productStockUpdater = new ProductStockInstaller(
            $this->getUtilDataReaderService(),
            $this->getUpdaterProductStockCollection(),
            $this->getConfig()->getImportDataDirectory(),
            $this->createProductStockUpdater()
        );

        return $productStockUpdater;
    }

    /**
     * @return \Pyz\Zed\Importer\Business\Installer\InstallerInterface[]
     */
    protected function getInstallerCollection()
    {
        return [
            UpdaterConfig::RESOURCE_PRODUCT_STOCK => $this->createProductStockInstaller(),
        ];
    }

    /**
     * @return \Spryker\Zed\Product\Persistence\ProductQueryContainerInterface
     */
    protected function getProductQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    /**
     * @return \Spryker\Zed\Stock\Persistence\StockQueryContainerInterface
     */
    protected function getStockQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_STOCK);
    }

    /**
     * @return \Spryker\Zed\Sales\Persistence\SalesQueryContainerInterface
     */
    protected function getSalesQueryContainer()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::QUERY_CONTAINER_SALES);
    }

    /**
     * @return \Spryker\Zed\Stock\Business\StockFacadeInterface
     */
    protected function getStockFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_STOCK);
    }

    /**
     * @return \Spryker\Zed\Oms\Business\OmsFacadeInterface
     */
    protected function getOmsFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_OMS);
    }

    /**
     * @return \Spryker\Zed\Locale\Business\LocaleFacadeInterface
     */
    protected function getLocaleFacade()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::FACADE_LOCALE);
    }

    /**
     * @return \Spryker\Service\UtilDataReader\UtilDataReaderServiceInterface
     */
    public function getUtilDataReaderService()
    {
        return $this->getProvidedDependency(UpdaterDependencyProvider::SERVICE_UTIL_DATA_READER);
    }

}
