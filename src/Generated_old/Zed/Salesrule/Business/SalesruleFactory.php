<?php 

namespace Generated\Zed\Salesrule\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class SalesruleFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Calculator\SalesruleCalculator
     */
    public function createCalculatorSalesruleCalculator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Calculator\SalesruleCalculator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $order
     * @param \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule
     * @param $usedCodes (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Action\Fixed
     */
    public function createModelActionFixed(\ProjectA\Shared\Sales\Transfer\Order $order, \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule, $usedCodes = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Action\Fixed');
        $model = new $class($order, $salesrule, $usedCodes);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $order
     * @param \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule
     * @param $usedCodes (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Action\MaxShipping
     */
    public function createModelActionMaxShipping(\ProjectA\Shared\Sales\Transfer\Order $order, \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule, $usedCodes = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Action\MaxShipping');
        $model = new $class($order, $salesrule, $usedCodes);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $order
     * @param \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule
     * @param $usedCodes (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Action\Percent
     */
    public function createModelActionPercent(\ProjectA\Shared\Sales\Transfer\Order $order, \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule, $usedCodes = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Action\Percent');
        $model = new $class($order, $salesrule, $usedCodes);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $order
     * @param \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule
     * @param $usedCodes (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Action\PercentShipping
     */
    public function createModelActionPercentShipping(\ProjectA\Shared\Sales\Transfer\Order $order, \ProjectA_Zed_Salesrule_Persistence_Propel_PacSalesrule $salesrule, $usedCodes = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Action\PercentShipping');
        $model = new $class($order, $salesrule, $usedCodes);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Model\Code
     */
    public function createModelCode()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Code');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Model\Codepool
     */
    public function createModelCodepool()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Codepool');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Model\CodeUsage
     */
    public function createModelCodeUsage()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\CodeUsage');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $configuration (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition\DateBetween
     */
    public function createModelConditionDateBetween($configuration = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition\DateBetween');
        $model = new $class($configuration);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $configuration (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition\MinimumOrderSubtotal
     */
    public function createModelConditionMinimumOrderSubtotal($configuration = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition\MinimumOrderSubtotal');
        $model = new $class($configuration);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $configuration (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition\SimpleFalse
     */
    public function createModelConditionSimpleFalse($configuration = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition\SimpleFalse');
        $model = new $class($configuration);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $configuration (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition\SimpleTrue
     */
    public function createModelConditionSimpleTrue($configuration = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition\SimpleTrue');
        $model = new $class($configuration);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $configuration (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition\ValidFrom
     */
    public function createModelConditionValidFrom($configuration = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition\ValidFrom');
        $model = new $class($configuration);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $configuration (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition\ValidTo
     */
    public function createModelConditionValidTo($configuration = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition\ValidTo');
        $model = new $class($configuration);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $configuration (optional) default: null
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition\VoucherCodeInPool
     */
    public function createModelConditionVoucherCodeInPool($configuration = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition\VoucherCodeInPool');
        $model = new $class($configuration);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Model\Condition
     */
    public function createModelCondition()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Condition');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $order
     * @return \ProjectA\Zed\Salesrule\Business\Model\ConditionStack
     */
    public function createModelConditionStack(\ProjectA\Shared\Sales\Transfer\Order $order)
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\ConditionStack');
        $model = new $class($order);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Model\Finder
     */
    public function createModelFinder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Finder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Model\Logger
     */
    public function createModelLogger()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Logger');
        $model = $class::getInstance();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\Model\Salesrule
     */
    public function createModelSalesrule()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\Model\Salesrule');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\SalesruleFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\SalesruleFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Salesrule\Business\SalesruleSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Salesrule\Business\SalesruleSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
