<?php

class Sao_Zed_Installer_Component_Facade extends ProjectA_Zed_Installer_Component_Facade
{

    /**
     * @var Generated_Zed_Installer_Component_Factory
     */
    protected $factory;

    public function install()
    {
        return $this->factory->getModelInstaller()->install();
    }

}