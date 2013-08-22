<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Em_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Em_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Em_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $apikey 
     * @param bool $secure (optional) default: false
     * @return ProjectA_Zed_Em_Component_Model_MailChimp_Api
     */
    public function getModelMailChimpApi($apikey, $secure = false)
    {
        $class = $this->transformClassName('ProjectA_Zed_Em_Component_Model_MailChimp_Api');
        $model = new $class($apikey, $secure);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Em_Component_Model_MailChimp_Download
     */
    public function getModelMailChimpDownload()
    {
        $class = $this->transformClassName('ProjectA_Zed_Em_Component_Model_MailChimp_Download');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Em_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Em_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
