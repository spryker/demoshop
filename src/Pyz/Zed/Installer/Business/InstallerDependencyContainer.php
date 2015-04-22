<?php

namespace Pyz\Zed\Installer\Business;

use Pyz\Zed\Installer\Business\DemoData\CategoryTreeInstaller;
use ProjectA\Zed\Installer\Business\InstallerDependencyContainer as SprykerInstallerDependencyContainer;
use ProjectA\Zed\Library\Import\Reader\CsvFileReader;
use Psr\Log\LoggerInterface;
use Pyz\Zed\Installer\Business\DemoData\ProductCategoryInstaller;


class InstallerDependencyContainer extends SprykerInstallerDependencyContainer
{

    /**
     * @param LoggerInterface $messenger
     *
     * @return CategoryTreeInstaller
     */
    public function createDemoDataCategoryTreeInstaller(LoggerInterface $messenger)
    {
        $reader = $this->createCSVReader();
        $data = $reader->read($this->createSettings()->getDemoDataCategoryTreeCSVPath())->getData();
        $installer = $this->factory->createDemoDataCategoryTreeInstaller(
            $this->locator->category()->facade(),
            $this->locator->category()->queryContainer(),
            $this->locator->locale()->facade(),
            $this->locator,
            $data
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductDataInstaller
     */
    public function createDemoDataProductInstaller(LoggerInterface $messenger)
    {
        $reader = $this->createCSVReader();
        $data = $reader->read($this->createSettings()->getDemoDataProductCSVPath())->getData();
        $installer = $this->factory->createDemoDataProductInstaller(
            $this->locator->product()->facade(),
            $this->locator->locale()->facade(),
            $data
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @param LoggerInterface $messenger
     *
     * @return ProductCategoryInstaller
     */
    public function createDemoDataProductCategoryInstaller(LoggerInterface $messenger)
    {
        $reader = $this->createCSVReader();
        $data = $reader->read($this->createSettings()->getDemoDataProductCSVPath())->getData();
        $installer = $this->factory->createDemoDataProductCategoryInstaller(
            $this->locator->productCategory()->facade(),
            $this->locator->category()->facade(),
            $this->locator->product()->facade(),
            $this->locator->locale()->facade(),
            $data
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @param LoggerInterface $messenger
     *
     * @return PriceInstaller
     */
    public function createDemoDataPriceInstaller(LoggerInterface $messenger)
    {
        $reader = $this->createCSVReader();
        $data = $reader->read($this->createSettings()->getDemoDataProductCSVPath())->getData();
        $installer = $this->factory->createDemoDataPriceInstaller(
            $this->locator->price()->facade(),
            $data
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @param LoggerInterface $messenger
     *
     * @return StockInstaller
     */
    public function createDemoDataStockInstaller(LoggerInterface $messenger)
    {
        $reader = $this->createCSVReader();
        $data = $reader->read($this->createSettings()->getDemoDataProductCSVPath())->getData();
        $installer = $this->factory->createDemoDataStockInstaller(
            $this->locator,
            $data
        );
        $installer->setMessenger($messenger);

        return $installer;
    }

    /**
     * @return ReaderInterface
     */
    protected function createCSVReader()
    {
        return new CsvFileReader();
    }

    /**
     * @return InstallerSettings
     */
    protected function createSettings()
    {
        return $this->factory->createInstallerSettings($this->locator);
    }
}
