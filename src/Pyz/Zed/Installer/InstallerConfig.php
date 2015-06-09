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
            $locator->frontendExporter()->pluginInstaller(),
            $locator->product()->pluginInstaller(),
            $locator->productSearch()->pluginInstaller(),
            $locator->price()->pluginInstaller(),
            $locator->locale()->pluginInstaller(),
            $locator->country()->pluginInstaller(),
            $locator->user()->pluginInstaller(),
            $locator->acl()->pluginInstaller(),
//            $locator->searchPage()->pluginTemplateInstaller(),
//            $locator->searchPage()->pluginDocumentAttributeInstaller(),
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
            $locator->product()->pluginDemoDataInstaller(),
            $locator->productCategory()->pluginDemoDataInstaller(),
            $locator->price()->pluginDemoDataInstaller(),
            $locator->productSearch()->pluginDemoDataInstaller(),
            $locator->stock()->pluginDemoDataInstaller(),
            $locator->productOption()->pluginDemoDataInstaller()
        ];
    }
}
