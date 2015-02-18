<?php 

namespace Generated\Zed\Checkout\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class CheckoutFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Checkout\Business\CheckoutFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\CheckoutFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\CheckoutSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\CheckoutSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $array
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Context
     */
    public function createModelWorkflowContext($array)
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Context');
        $model = new $class($array);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $transferOrder
     * @param \ProjectA\Shared\Library\Communication\Request $transferRequest
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Definition\SaveOrder
     */
    public function createModelWorkflowDefinitionSaveOrder(\ProjectA\Shared\Sales\Transfer\Order $transferOrder, \ProjectA\Shared\Library\Communication\Request $transferRequest)
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Definition\SaveOrder');
        $model = new $class($transferOrder, $transferRequest);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\AssignCountryToAddress
     */
    public function createModelWorkflowTaskAssignCountryToAddress()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\AssignCountryToAddress');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\EnsureNewSalesOrderAddresses
     */
    public function createModelWorkflowTaskEnsureNewSalesOrderAddresses()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\EnsureNewSalesOrderAddresses');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Kernel\AbstractLocatorLocator $transferLocator
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Helper\ItemGrouper
     */
    public function createModelWorkflowTaskHelperItemGrouper(\ProjectA\Shared\Kernel\AbstractLocatorLocator $transferLocator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Helper\ItemGrouper');
        $model = new $class($transferLocator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\CreatePaymentContext
     */
    public function createModelWorkflowTaskPaymentCreatePaymentContext()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\CreatePaymentContext');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\SetPaymentRedirectUrl
     */
    public function createModelWorkflowTaskPaymentSetPaymentRedirectUrl()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\SetPaymentRedirectUrl');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\ValidateHasPayment
     */
    public function createModelWorkflowTaskPaymentValidateHasPayment()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\ValidateHasPayment');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\ValidatePaymentMethods
     */
    public function createModelWorkflowTaskPaymentValidatePaymentMethods()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\ValidatePaymentMethods');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\ValidatePaymentResult
     */
    public function createModelWorkflowTaskPaymentValidatePaymentResult()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Payment\ValidatePaymentResult');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\PrepareBillingAddress
     */
    public function createModelWorkflowTaskPrepareBillingAddress()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\PrepareBillingAddress');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\PrepareShippingAddress
     */
    public function createModelWorkflowTaskPrepareShippingAddress()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\PrepareShippingAddress');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Propel\BeginTransaction
     */
    public function createModelWorkflowTaskPropelBeginTransaction()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Propel\BeginTransaction');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Propel\CommitTransaction
     */
    public function createModelWorkflowTaskPropelCommitTransaction()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\Propel\CommitTransaction');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\SaveCustomerIfNew
     */
    public function createModelWorkflowTaskSaveCustomerIfNew()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\SaveCustomerIfNew');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\SaveOrder
     */
    public function createModelWorkflowTaskSaveOrder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\SaveOrder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\StateMachine\StartStateMachine
     */
    public function createModelWorkflowTaskStateMachineStartStateMachine()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\StateMachine\StartStateMachine');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\SubscribeNewsletter
     */
    public function createModelWorkflowTaskSubscribeNewsletter()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\SubscribeNewsletter');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\ValidateOrderIsCalculated
     */
    public function createModelWorkflowTaskValidateOrderIsCalculated()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\ValidateOrderIsCalculated');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\ValidateOrderIsNew
     */
    public function createModelWorkflowTaskValidateOrderIsNew()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\ValidateOrderIsNew');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Code\AbstractItemGrouper $itemGrouper
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\Task\ValidateStock
     */
    public function createModelWorkflowTaskValidateStock(\ProjectA\Shared\Sales\Code\AbstractItemGrouper $itemGrouper)
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\Task\ValidateStock');
        $model = new $class($itemGrouper);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Checkout\Business\Model\Workflow\TaskInvoker
     */
    public function createModelWorkflowTaskInvoker()
    {
        $class = $this->transformClassName('ProjectA\Zed\Checkout\Business\Model\Workflow\TaskInvoker');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
