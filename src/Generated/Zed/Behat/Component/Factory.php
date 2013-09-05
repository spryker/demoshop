<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Behat_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Behat_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Behat_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Behat_Component_Model_Config_List
     */
    public function getModelConfigList()
    {
        $class = $this->transformClassName('ProjectA_Zed_Behat_Component_Model_Config_List');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $path
     * @return ProjectA_Zed_Behat_Component_Model_Config
     */
    public function getModelConfig($path)
    {
        $class = $this->transformClassName('ProjectA_Zed_Behat_Component_Model_Config');
        $model = new $class($path);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Behat_Component_Model_Feature_List
     */
    public function getModelFeatureList()
    {
        $class = $this->transformClassName('ProjectA_Zed_Behat_Component_Model_Feature_List');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $featureFileName
     * @return ProjectA_Zed_Behat_Component_Model_Feature
     */
    public function getModelFeature($featureFileName)
    {
        $class = $this->transformClassName('ProjectA_Zed_Behat_Component_Model_Feature');
        $model = new $class($featureFileName);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Behat_Component_Model_TestRunner
     */
    public function getModelTestRunner()
    {
        $class = $this->transformClassName('ProjectA_Zed_Behat_Component_Model_TestRunner');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
