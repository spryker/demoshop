<?php

class Sao_Zed_Installer_Component_Facade extends ProjectA_Zed_Installer_Component_Facade
{



    public function install()
    {
        return $this->factory->getModelInstaller()->install();
    }

}
