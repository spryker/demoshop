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
            $this->locator->acl()->pluginInstaller(),
            $this->locator->frontendExporter()->pluginInstaller(),
            $this->locator->product()->pluginInstaller(),
            $this->locator->productSearch()->pluginInstaller(),
            $this->locator->price()->pluginInstaller(),
            $this->locator->locale()->pluginInstaller(),
            $this->locator->misc()->pluginInstaller(),
        ];
    }

    /**
     * @return AbstractInstaller[]
     */
    public function getDemoDataInstallerStack()
    {
        return [
//            $this->locator->category()->pluginDemoDataInstaller(),
            $this->locator->glossary()->pluginDemoDataInstaller(),
            // ProductData
            // ProductCategory
            // Price
            // ProductAttributeMappingInstall
            // StockInstall
        ];
    }
}
