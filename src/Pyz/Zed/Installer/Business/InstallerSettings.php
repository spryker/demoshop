<?php

namespace Pyz\Zed\Installer\Business;

use SprykerFeature\Zed\Installer\Business\InstallerSettings as SprykerInstallerSettings;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

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
            $this->locator->category()->pluginDemoDataInstaller(),
            $this->locator->glossary()->pluginDemoDataInstaller(),
            $this->locator->product()->pluginDemoDataInstaller(),
            $this->locator->productCategory()->pluginDemoDataInstaller(),
            $this->locator->price()->pluginDemoDataInstaller(),
            $this->locator->productSearch()->pluginDemoDataInstaller(),
            $this->locator->stock()->pluginDemoDataInstaller()
        ];
    }
}
