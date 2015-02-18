<?php 

namespace Generated\Zed\System\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class SystemFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param $environment (optional) default: null
     * @return \ProjectA_Zed_System_Business_Model_Loadbalancer_BigIP_IPv4
     */
    public function createModelLoadbalancerBigIPIPv4($environment = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_System_Business_Model_Loadbalancer_BigIP_IPv4');
        $model = new $class($environment);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\System\Business\SystemFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\System\Business\SystemFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\System\Business\SystemSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\System\Business\SystemSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
