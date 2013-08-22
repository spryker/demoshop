<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Newsletter_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Newsletter_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Newsletter_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Newsletter_Component_Model_Newsletter
     */
    public function getModelNewsletter()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Model_Newsletter');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Newsletter_Component_Model_Provider_Api_MailChimp
     */
    public function getModelProviderApiMailChimp()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Model_Provider_Api_MailChimp');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Newsletter_Component_Model_Provider_Internal
     */
    public function getModelProviderInternal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Model_Provider_Internal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Newsletter_Component_Model_Provider_MailChimp
     */
    public function getModelProviderMailChimp()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Model_Provider_MailChimp');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Newsletter_Component_Model_Provider_Response
     */
    public function getModelProviderResponse()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Model_Provider_Response');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Newsletter_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Newsletter_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
