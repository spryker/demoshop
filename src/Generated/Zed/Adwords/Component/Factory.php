<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Adwords_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Adwords_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adwords_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adwords_Component_Gui_KeywordStatsTool
     */
    public function getGuiKeywordStatsTool()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adwords_Component_Gui_KeywordStatsTool');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adwords_Component_Model_Api
     */
    public function getModelApi()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adwords_Component_Model_Api');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adwords_Component_Model_Cost
     */
    public function getModelCost()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adwords_Component_Model_Cost');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adwords_Component_Model_Keywords
     */
    public function getModelKeywords()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adwords_Component_Model_Keywords');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adwords_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adwords_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
