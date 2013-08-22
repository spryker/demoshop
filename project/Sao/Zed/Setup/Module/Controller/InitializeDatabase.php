<?php

/**
 * @property Sao_Zed_Installer_Component_Facade $facadeInstaller
 */
class Sao_Zed_Setup_Module_Controller_InitializeDatabase extends ProjectA_Zed_Library_Controller_Action
    implements ProjectA_Zed_Installer_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Installer_Component_Dependency_Facade_Trait;

    public function indexAction()
    {
        set_time_limit(0);
        $queries = $this->facadeInstaller->install();
        ProjectA_Zed_Library_Setup::renderAndExit(implode('<br />', $queries));
        echo "2";
    }
}