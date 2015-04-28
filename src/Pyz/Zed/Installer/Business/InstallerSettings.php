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
            $this->getLocator()->frontendExporter()->pluginInstaller(),
            $this->getLocator()->product()->pluginInstaller(),
            $this->getLocator()->productSearch()->pluginInstaller(),
            $this->getLocator()->price()->pluginInstaller(),
            $this->getLocator()->locale()->pluginInstaller(),
            $this->getLocator()->country()->pluginInstaller(),
            $this->getLocator()->user()->pluginInstaller(),
            $this->getLocator()->acl()->pluginInstaller()
        ];
    }

    /**
     * @return AbstractInstaller[]
     */
    public function getDemoDataInstallerStack()
    {
        return [
            $this->getLocator()->category()->pluginDemoDataInstaller(),
            $this->getLocator()->glossary()->pluginDemoDataInstaller(),
            $this->getLocator()->product()->pluginDemoDataInstaller(),
            $this->getLocator()->productCategory()->pluginDemoDataInstaller(),
            $this->getLocator()->price()->pluginDemoDataInstaller(),
            $this->getLocator()->productSearch()->pluginDemoDataInstaller(),
            $this->getLocator()->stock()->pluginDemoDataInstaller()
        ];
    }
}
