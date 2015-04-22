<?php

namespace Pyz\Zed\Installer\Business;

use ProjectA\Zed\Installer\Business\InstallerFacade as SprykerInstallerFacade;
use Psr\Log\LoggerInterface;

class InstallerFacade extends SprykerInstallerFacade
{

    /**
     * @var InstallerDependencyContainer
     */
    protected $dependencyContainer;

    /**
     * @param LoggerInterface $messenger
     */
    public function installCategoryTreeDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->createDemoDataCategoryTreeInstaller($messenger)->install();
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installProductDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->createDemoDataProductInstaller($messenger)->install();
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installProductCategoryDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->createDemoDataProductCategoryInstaller($messenger)->install();
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installPriceDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->createDemoDataPriceInstaller($messenger)->install();
    }

    /**
     * @param LoggerInterface $messenger
     */
    public function installStockDemoData(LoggerInterface $messenger)
    {
        $this->dependencyContainer->createDemoDataStockInstaller($messenger)->install();
    }
}
