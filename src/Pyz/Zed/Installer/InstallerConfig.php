<?php

namespace Pyz\Zed\Installer;

use Spryker\Zed\Installer\InstallerConfig as SprykerInstallerConfig;

class InstallerConfig extends SprykerInstallerConfig
{

    const CATEGORY_MAPPER = 'category';
    const PRODUCT_MAPPER = 'product';

    /**
     * @return string
     */
    public function getIcecatDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/Icecat/';
    }

}
