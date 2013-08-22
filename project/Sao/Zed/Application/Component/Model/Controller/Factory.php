<?php

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Sao_Zed_Application_Component_Model_Controller_Factory implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_Application_Component_Model_Controller_Facade
     */
    public function getFacade()
    {
        $model = new Sao_Zed_Application_Component_Model_Controller_Facade();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Application_Component_Model_Controller_Plugin_LocalDate
     */
    public function getPluginLocalDate()
    {
        $model = new Sao_Zed_Application_Component_Model_Controller_Plugin_LocalDate();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

}
