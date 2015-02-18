<?php 

namespace Generated\Zed\Setup\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class SetupFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA_Zed_Setup_Business_Model_Cronjobs
     */
    public function createModelCronjobs()
    {
        $class = $this->transformClassName('ProjectA_Zed_Setup_Business_Model_Cronjobs');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Setup_Business_Model_System
     */
    public function createModelSystem()
    {
        $class = $this->transformClassName('ProjectA_Zed_Setup_Business_Model_System');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Setup\Business\SetupFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Setup\Business\SetupFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Setup\Business\SetupSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Setup\Business\SetupSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
