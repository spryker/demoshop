<?php

namespace Pyz\Zed\Installer;

use Spryker\Zed\Installer\InstallerConfig as SprykerInstallerConfig;

class InstallerConfig extends SprykerInstallerConfig
{

    const RESOURCE_CATEGORY = 'category';
    const RESOURCE_PRODUCT = 'product';
    const RESOURCE_PRODUCT_STOCK = 'product stock';
    const RESOURCE_PRODUCT_CATEGORY = 'product category';
    const RESOURCE_NAVIGATION = 'navigation';

    /**
     * @return string
     */
    public function getIcecatDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/';
    }

}
