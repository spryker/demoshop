<?php 

namespace Generated\Zed\Cart\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CartFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Cart\Business\CartFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cart\Business\CartFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cart\Business\CartSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cart\Business\CartSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Cart_Business_Model_CartStorage $cartStorage (optional) default: null
     * @return \ProjectA\Zed\Cart\Business\Model\Cart
     */
    public function createModelCart(\ProjectA_Zed_Cart_Business_Model_CartStorage $cartStorage = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Cart\Business\Model\Cart');
        $model = new $class($cartStorage);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Cart_Business_Model_CartStep
     */
    public function createModelCartStep()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Business_Model_CartStep');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Cart_Business_Model_CartStorage
     */
    public function createModelCartStorage()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Business_Model_CartStorage');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Cart\Business\Model\CouponCode
     */
    public function createModelCouponCode()
    {
        $class = $this->transformClassName('ProjectA\Zed\Cart\Business\Model\CouponCode');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Cart_Business_Model_Strategies_ClearStrategyDelete
     */
    public function createModelStrategiesClearStrategyDelete()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Business_Model_Strategies_ClearStrategyDelete');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Cart_Business_Model_Strategies_ClearStrategyMarkDelete
     */
    public function createModelStrategiesClearStrategyMarkDelete()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Business_Model_Strategies_ClearStrategyMarkDelete');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Cart_Business_Model_Strategies_MergeStrategyMax
     */
    public function createModelStrategiesMergeStrategyMax()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Business_Model_Strategies_MergeStrategyMax');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA_Zed_Cart_Business_Model_Strategies_MergeStrategySum
     */
    public function createModelStrategiesMergeStrategySum()
    {
        $class = $this->transformClassName('ProjectA_Zed_Cart_Business_Model_Strategies_MergeStrategySum');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
