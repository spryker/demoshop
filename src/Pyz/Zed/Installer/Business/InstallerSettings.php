<?php

namespace Pyz\Zed\Installer\Business;

use ProjectA\Zed\Installer\Business\InstallerSettings as SprykerInstallerSettings;

class InstallerSettings extends SprykerInstallerSettings
{

    public function getInstallerStack()
    {
        return [
            $this->locator->acl()->pluginInstaller(),
            $this->locator->frontendExporter()->pluginInstaller(),
            $this->locator->product()->pluginInstaller(),
            $this->locator->productSearch()->pluginInstaller(),
            $this->locator->price()->pluginInstaller(),
            $this->locator->locale()->pluginInstaller(),
            // TODO check after re-integration of customer2 bundle
//            $this->locator->customer()->pluginInstaller(),
            // TODO check after refactoring cms bundle
//            $this->locator->cms()->pluginInstaller(),
            $this->locator->misc()->pluginInstaller(),
            $this->locator->sales()->pluginInstaller(),
            $this->locator->productImage()->pluginInstaller(),
            $this->locator->document()->pluginInstaller(),
            $this->locator->payone()->pluginInstaller(),
        ];
    }
}
