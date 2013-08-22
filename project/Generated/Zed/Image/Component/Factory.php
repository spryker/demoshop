<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Image_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Image_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Image_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $path 
     * @return ProjectA_Zed_Image_Component_Model_Filesystem
     */
    public function getModelFilesystem($path)
    {
        $class = $this->transformClassName('ProjectA_Zed_Image_Component_Model_Filesystem');
        $model = new $class($path);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Image_Component_Model_Filter_Postprocessing_Background
     */
    public function getModelFilterPostprocessingBackground()
    {
        $class = $this->transformClassName('ProjectA_Zed_Image_Component_Model_Filter_Postprocessing_Background');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Image_Component_Model_Image
     */
    public function getModelImage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Image_Component_Model_Image');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
