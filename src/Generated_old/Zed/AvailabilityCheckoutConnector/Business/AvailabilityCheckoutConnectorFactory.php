<?php 

namespace Generated\Zed\AvailabilityCheckoutConnector\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class AvailabilityCheckoutConnectorFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\AvailabilityCheckoutConnector\Business\AvailabilityCheckoutConnectorDependencyContainer
     */
    public function createAvailabilityCheckoutConnectorDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\AvailabilityCheckoutConnector\Business\AvailabilityCheckoutConnectorDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
