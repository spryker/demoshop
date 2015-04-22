<?php

namespace Pyz\Zed\Installer\Business;

use ProjectA\Zed\Installer\Business\InstallerSettings as SprykerInstallerSettings;
use ProjectA\Zed\Installer\Business\Model\AbstractInstaller;

class InstallerSettings extends SprykerInstallerSettings
{

    /**
     * @return AbstractInstaller[]
     */
    public function getInstallerStack()
    {
        return [
            $this->locator->frontendExporter()->pluginInstaller(),
            $this->locator->product()->pluginInstaller(),
            $this->locator->productSearch()->pluginInstaller(),
            $this->locator->price()->pluginInstaller(),
            $this->locator->locale()->pluginInstaller(),
            $this->locator->country()->pluginInstaller(),
            $this->locator->user()->pluginInstaller(),
            $this->locator->acl()->pluginInstaller()
        ];
    }

    /**
     * @return AbstractInstaller[]
     */
    public function getDemoDataInstallerStack()
    {
        return [
            $this->locator->installer()->pluginCategoryTreeDemoDataInstaller(),
            $this->locator->glossary()->pluginDemoDataInstaller(),
            $this->locator->installer()->pluginProductDemoDataInstaller(),
            $this->locator->installer()->pluginProductCategoryDemoDataInstaller(),
            $this->locator->installer()->pluginPriceDemoDataInstaller(),
            $this->locator->productSearch()->pluginDemoDataInstaller(),
            $this->locator->installer()->pluginStockDemoDataInstaller()
        ];
    }

    /**
     * @return string
     */
    public function getDemoDataProductCSVPath()
    {
        return __DIR__ . '/DemoData/Data/demo-products.csv';
    }

    /**
     * @return string
     */
    public function getDemoDataCategoryTreeCSVPath()
    {
        return __DIR__ . '/DemoData/Data/demo-category-tree.csv';
    }

}
