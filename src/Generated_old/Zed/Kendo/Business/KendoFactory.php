<?php 

namespace Generated\Zed\Kendo\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class KendoFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Kendo\Business\KendoFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Kendo\Business\KendoFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Kendo\Business\Model\State
     */
    public function createModelState()
    {
        $class = $this->transformClassName('ProjectA\Zed\Kendo\Business\Model\State');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
