<?php

namespace Pyz\Zed\Installer\Component;

/**
 * Class Pyz_Zed_Installer_Component_Facade
 * @property \Generated\Zed\Installer\Component\InstallerFactory $factory
 */
class InstallerFacade extends \ProjectA\Zed\Installer\Component\InstallerFacade
{
    /**
     * @return array
     */
    public function install()
    {
        return $this->factory->createModelInstaller()->install();
    }
}
