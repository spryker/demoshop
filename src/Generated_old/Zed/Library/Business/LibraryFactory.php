<?php 

namespace Generated\Zed\Library\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class LibraryFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \BaseObject $entity (optional) default: null
     * @return \ProjectA\Zed\Library\Business\ComponentModelResult
     */
    public function createComponentModelResult(\BaseObject $entity = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Library\Business\ComponentModelResult');
        $model = new $class($entity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Library_Business_Model_Dependency
     */
    public function createModelDependency()
    {
        $class = $this->transformClassName('ProjectA_Zed_Library_Business_Model_Dependency');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Library_Business_Model_Graph_Dependency
     */
    public function createModelGraphDependency()
    {
        $class = $this->transformClassName('ProjectA_Zed_Library_Business_Model_Graph_Dependency');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Library_Business_Model_Installer_Composite
     */
    public function createModelInstallerComposite()
    {
        $class = $this->transformClassName('ProjectA_Zed_Library_Business_Model_Installer_Composite');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
