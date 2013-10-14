<?php
/**
 * Class Pyz_Zed_Installer_Component_Facade
 * @property Generated_Zed_Installer_Component_Factory $factory
 */
class Pyz_Zed_Installer_Component_Facade extends ProjectA_Zed_Installer_Component_Facade
{
    /**
     * @return array
     */
    public function install()
    {
        return $this->factory->createModelInstaller()->install();
    }
}
