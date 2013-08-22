<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Stripe_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Stripe_Component_Facade_StateMachine
     */
    public function getFacadeStateMachine()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Facade_StateMachine');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stripe_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stripe_Component_Model_Api_Customer
     */
    public function getModelApiCustomer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Model_Api_Customer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stripe_Component_Model_Api_Payment
     */
    public function getModelApiPayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Model_Api_Payment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $isSuccess 
     * @return ProjectA_Zed_Stripe_Component_Model_Api_Response
     */
    public function getModelApiResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Model_Api_Response');
        $model = new $class($isSuccess);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Stripe_Component_Model_StateMachine_Command_Payment_CaptureGrandTotal
     */
    public function getModelStateMachineCommandPaymentCaptureGrandTotal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Model_StateMachine_Command_Payment_CaptureGrandTotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Stripe_Component_Model_StateMachine_Command_Payment_ChargeGrandTotal
     */
    public function getModelStateMachineCommandPaymentChargeGrandTotal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Model_StateMachine_Command_Payment_ChargeGrandTotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Stripe_Component_Model_StateMachine_Rule_Payment_TransactionApproved
     */
    public function getModelStateMachineRulePaymentTransactionApproved()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Model_StateMachine_Rule_Payment_TransactionApproved');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Stripe_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Stripe_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
