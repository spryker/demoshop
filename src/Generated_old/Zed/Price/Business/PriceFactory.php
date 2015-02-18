<?php 

namespace Generated\Zed\Price\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class PriceFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA_Zed_Price_Business_Internal_Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_Price_Business_Internal_Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Price_Business_Model_Finder
     */
    public function createModelFinder()
    {
        $class = $this->transformClassName('ProjectA_Zed_Price_Business_Model_Finder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $name
     * @return \ProjectA_Zed_Price_Business_Model_Price
     */
    public function createModelPrice($name)
    {
        $class = $this->transformClassName('ProjectA_Zed_Price_Business_Model_Price');
        $model = new $class($name);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Price_Business_Model_PricingModelSelector
     */
    public function createModelPricingModelSelector()
    {
        $class = $this->transformClassName('ProjectA_Zed_Price_Business_Model_PricingModelSelector');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Price\Business\PriceFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Price\Business\PriceFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Price\Business\PriceSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Price\Business\PriceSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
