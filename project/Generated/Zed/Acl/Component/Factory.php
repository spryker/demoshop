<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Acl_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Acl_Component_Facade_Gui
     */
    public function getFacadeGui()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Facade_Gui');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Gui_Crud_Role
     */
    public function getGuiCrudRole()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Gui_Crud_Role');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Gui_Crud_User
     */
    public function getGuiCrudUser()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Gui_Crud_User');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Acl_Component_Gui_Form_Role
     */
    public function getGuiFormRole($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Gui_Form_Role');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Acl_Component_Gui_Form_User
     */
    public function getGuiFormUser($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Acl_Component_Gui_Form_User');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Acl_Component_Gui_Grid_Role
     */
    public function getGuiGridRole($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Gui_Grid_Role');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Acl_Component_Gui_Grid_RolePrivileges
     */
    public function getGuiGridRolePrivileges($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Gui_Grid_RolePrivileges');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Acl_Component_Gui_Grid_RoleResources
     */
    public function getGuiGridRoleResources($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Gui_Grid_RoleResources');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $config (optional) default: null
     * @return ProjectA_Zed_Acl_Component_Gui_Grid_User
     */
    public function getGuiGridUser($config = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Gui_Grid_User');
        $model = new $class($config);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Acl_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Acl_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_AccessList
     */
    public function getModelAccessList()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_AccessList');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_Acl
     */
    public function getModelAcl()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_Acl');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_ControllerLoader
     */
    public function getModelControllerLoader()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_ControllerLoader');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_Privilege
     */
    public function getModelPrivilege()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_Privilege');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Zend_Controller_Request_Abstract $request 
     * @return ProjectA_Zed_Acl_Component_Model_Resource_Mvc
     */
    public function getModelResourceMvc(Zend_Controller_Request_Abstract $request)
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_Resource_Mvc');
        $model = new $class($request);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_Resource
     */
    public function getModelResource()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_Resource');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_Role
     */
    public function getModelRole()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_Role');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_RolePrivilege
     */
    public function getModelRolePrivilege()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_RolePrivilege');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_RoleResource
     */
    public function getModelRoleResource()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_RoleResource');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Model_User
     */
    public function getModelUser()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Model_User');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Acl_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Acl_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Acl_Component_Gui_Form_UserDummy
     */
    public function getGuiFormUserDummy($options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Acl_Component_Gui_Form_UserDummy');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
