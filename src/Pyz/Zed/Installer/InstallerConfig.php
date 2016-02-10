<?php

namespace Pyz\Zed\Installer;

use Spryker\Zed\Installer\InstallerConfig as SprykerInstallerConfig;

class InstallerConfig extends SprykerInstallerConfig
{

    const CATEGORY_RESOURCE = 'category';
    const LOCALE_RESOURCE = 'locale';
    const PRODUCT_RESOURCE = 'product';

    /**
     * @return string
     */
    public function getIcecatDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/Icecat/';
    }

}
