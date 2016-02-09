<?php

namespace Pyz\Zed\Installer;

use Spryker\Zed\Installer\InstallerConfig as SprykerInstallerConfig;

class InstallerConfig extends SprykerInstallerConfig
{
    /**
     * @return string
     */
    public function getIcecatDataPath()
    {
        return __DIR__ . '/Business/Internal/DemoData/Icecat/';
    }
}
