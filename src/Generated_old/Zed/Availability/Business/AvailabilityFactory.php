<?php 

namespace Generated\Zed\Availability\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class AvailabilityFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param \ProjectA\Zed\Kernel\Business\Factory $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Availability\Business\AvailabilityDependencyContainer
     */
    public function createAvailabilityDependencyContainer(\ProjectA\Zed\Kernel\Business\Factory $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Availability\Business\AvailabilityDependencyContainer');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\Factory\FactoryInterface $factory
     * @param \ProjectA\Zed\Kernel\Locator $locator
     * @return \ProjectA\Zed\Availability\Business\AvailabilityFacade
     */
    public function createFacade(\ProjectA\Shared\Kernel\Factory\FactoryInterface $factory, \ProjectA\Zed\Kernel\Locator $locator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Availability\Business\AvailabilityFacade');
        $model = new $class($factory, $locator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Availability\Persistence\AvailabilityQueryContainer $queryContainer
     * @param \ProjectA\Zed\Oms\Business\OmsFacade $omsFacade
     * @param \ProjectA\Zed\Stock\Business\StockFacade $stockFacade
     * @return \ProjectA\Zed\Availability\Business\Model\Sellable
     */
    public function createModelSellable(\ProjectA\Zed\Availability\Persistence\AvailabilityQueryContainer $queryContainer, \ProjectA\Zed\Oms\Business\OmsFacade $omsFacade, \ProjectA\Zed\Stock\Business\StockFacade $stockFacade)
    {
        $class = $this->transformClassName('ProjectA\Zed\Availability\Business\Model\Sellable');
        $model = new $class($queryContainer, $omsFacade, $stockFacade);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
