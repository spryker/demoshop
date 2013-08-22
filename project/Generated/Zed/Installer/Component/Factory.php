<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Installer_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_Installer_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Installer_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Installer_Component_Model_Installer
     */
    public function getModelInstaller()
    {
        $class = $this->transformClassName('Sao_Zed_Installer_Component_Model_Installer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
