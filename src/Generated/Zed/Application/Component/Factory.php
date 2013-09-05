<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Application_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_Application_Component_Model_Controller_Facade
     */
    public function getModelControllerFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Application_Component_Model_Controller_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Application_Component_Model_Controller_Factory
     */
    public function getModelControllerFactory()
    {
        $class = $this->transformClassName('Sao_Zed_Application_Component_Model_Controller_Factory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Application_Component_Model_Controller_Plugin_LocalDate
     */
    public function getModelControllerPluginLocalDate()
    {
        $class = $this->transformClassName('Sao_Zed_Application_Component_Model_Controller_Plugin_LocalDate');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
