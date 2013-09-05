<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Payment_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Payment_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $options (optional) default: null
     * @return ProjectA_Zed_Payment_Component_Gui_Form_ManualAdjustmentAccounting
     */
    public function getGuiFormManualAdjustmentAccounting($options = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Gui_Form_ManualAdjustmentAccounting');
        $model = new $class($options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Payment_Component_Model_Account
     */
    public function getModelAccount()
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Account');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $amount
     * @param mixed $action
     * @return
     * ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_AbsoluteCredit
     */
    public function getModelAccountingTransactionAbsoluteCredit($amount, $action)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_AbsoluteCredit');
        $model = new $class($amount, $action);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $amount
     * @param mixed $action
     * @return
     * ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_AbsoluteDebit
     */
    public function getModelAccountingTransactionAbsoluteDebit($amount, $action)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_AbsoluteDebit');
        $model = new $class($amount, $action);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $amount
     * @param mixed $action
     * @return ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_DeltaCredit
     */
    public function getModelAccountingTransactionDeltaCredit($amount, $action)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_DeltaCredit');
        $model = new $class($amount, $action);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $amount
     * @param mixed $action
     * @return ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_DeltaDebit
     */
    public function getModelAccountingTransactionDeltaDebit($amount, $action)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_DeltaDebit');
        $model = new $class($amount, $action);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $amount
     * @param mixed $isAbsoluteAmount
     * @param mixed $type
     * @param mixed $message (optional) default: null
     * @return
     * ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_ManualAdjustment
     */
    public function getModelAccountingTransactionManualAdjustment($amount, $isAbsoluteAmount, $type, $message = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Accounting_Transaction_ManualAdjustment');
        $model = new $class($amount, $isAbsoluteAmount, $type, $message);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Traversable $iterator
     * @return ProjectA_Zed_Payment_Component_Model_Gui_View_Account
     */
    public function getModelGuiViewAccount(Traversable $iterator)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Gui_View_Account');
        $model = new $class($iterator);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Payment_Persistence_PacPaymentAccount $accountEntity
     * @return ProjectA_Zed_Payment_Component_Model_Gui_View_AccountDecorator
     */
    public function getModelGuiViewAccountDecorator(ProjectA_Zed_Payment_Persistence_PacPaymentAccount $accountEntity)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Gui_View_AccountDecorator');
        $model = new $class($accountEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Traversable $iterator
     * @return ProjectA_Zed_Payment_Component_Model_Gui_View_Transaction
     */
    public function getModelGuiViewTransaction(Traversable $iterator)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Gui_View_Transaction');
        $model = new $class($iterator);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Payment_Persistence_PacPaymentTransaction $transactionEntity
     * @return ProjectA_Zed_Payment_Component_Model_Gui_View_TransactionDecorator
     */
    public function getModelGuiViewTransactionDecorator(ProjectA_Zed_Payment_Persistence_PacPaymentTransaction $transactionEntity)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Gui_View_TransactionDecorator');
        $model = new $class($transactionEntity);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Payment_Component_Model_Payment
     */
    public function getModelPayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Payment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Payment_Component_Model_PaymentStorageContainer
     */
    public function getModelPaymentStorageContainer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_PaymentStorageContainer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $isSuccess
     * @return ProjectA_Zed_Payment_Component_Model_Response
     */
    public function getModelResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Response');
        $model = new $class($isSuccess);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Payment_Component_Model_Transaction
     */
    public function getModelTransaction()
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_Transaction');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Payment_Component_Model_TransactionStorageContainer
     */
    public function getModelTransactionStorageContainer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Model_TransactionStorageContainer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Payment_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Payment_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
