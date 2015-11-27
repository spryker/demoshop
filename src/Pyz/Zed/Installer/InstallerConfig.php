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
            'glossary' => $locator->glossary()->pluginDemoDataInstaller(),
            'cms' => $locator->cms()->pluginDemoDataInstaller(),
            'cmsBlock' => $locator->cmsBlock()->pluginDemoDataInstaller(),
            'categoryCmsConnector' => $locator->categoryCmsConnector()->pluginDemoDataInstaller(),
            'category' => $locator->category()->pluginDemoDataInstaller(),
            'productGroup' => $locator->productGroup()->pluginDemoDataInstaller(),
            'price' => $locator->price()->pluginDemoDataInstaller(),
            'stock' => $locator->stock()->pluginDemoDataInstaller(),
            'product' => $locator->product()->pluginDemoDataInstaller(),
            'productSearch' => $locator->productSearch()->pluginDemoDataInstaller(),
            'shipment' => $locator->shipment()->pluginDemoDataInstaller(),
        ];
    }

}
