<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Auth_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Auth_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Auth_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Auth_Component_Gui_Form_Login
     */
    public function getGuiFormLogin($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Auth_Component_Gui_Form_Login');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Auth_Component_Model_Auth
     */
    public function getModelAuth()
    {
        $class = $this->transformClassName('ProjectA_Zed_Auth_Component_Model_Auth');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Auth_Component_Model_HeaderLogin
     */
    public function getModelHeaderLogin()
    {
        $class = $this->transformClassName('ProjectA_Zed_Auth_Component_Model_HeaderLogin');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
