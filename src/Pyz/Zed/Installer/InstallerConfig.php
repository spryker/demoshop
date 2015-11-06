<?php

namespace Pyz\Zed\Installer;

use SprykerFeature\Zed\Installer\InstallerConfig as SprykerInstallerConfig;
use SprykerFeature\Zed\Installer\Business\Model\AbstractInstaller;

class InstallerConfig extends SprykerInstallerConfig
{

    /**
     * @return AbstractInstaller[]
     */
    public function getInstallerStack()
    {
        $locator = $this->getLocator();

        return [
            $locator->collector()->pluginInstaller(),
            $locator->locale()->pluginInstaller(),
            $locator->tax()->pluginInstaller(),
            $locator->product()->pluginInstaller(),
            $locator->country()->pluginInstaller(),
            $locator->user()->pluginInstaller(),
            $locator->acl()->pluginInstaller(),
        ];
    }

    /**
     * @return AbstractInstaller[]
     */
    public function getDemoDataInstallerStack()
    {
        $locator = $this->getLocator();

        return [
            $locator->category()->pluginDemoDataInstaller(),
            $locator->glossary()->pluginDemoDataInstaller(),
            $locator->cms()->pluginDemoDataInstaller(),
            $locator->cmsBlock(),
            $locator->product()->pluginDemoDataInstaller(),
            $locator->productCategory()->pluginDemoDataInstaller(),
            $locator->productGroup()->pluginDemoDataInstaller(),
            $locator->price()->pluginDemoDataInstaller(),
            $locator->stock()->pluginDemoDataInstaller(),
            $locator->productSearch()->pluginDemoDataInstaller(),
            $locator->shipment()->pluginDemoDataInstaller(),
        ];
    }

}
