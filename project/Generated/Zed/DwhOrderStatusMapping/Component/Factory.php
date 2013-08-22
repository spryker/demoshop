<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_DwhOrderStatusMapping_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_DwhOrderStatusMapping_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_DwhOrderStatusMapping_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_DwhOrderStatusMapping_Component_Model_Mapping
     */
    public function getModelMapping()
    {
        $class = $this->transformClassName('ProjectA_Zed_DwhOrderStatusMapping_Component_Model_Mapping');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_DwhOrderStatusMapping_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_DwhOrderStatusMapping_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
