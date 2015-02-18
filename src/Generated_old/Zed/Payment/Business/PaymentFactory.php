<?php 

namespace Generated\Zed\Payment\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class PaymentFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Payment\Business\Model\Account
     */
    public function createModelAccount()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Account');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $receivable
     * @param $cash
     * @param $balance
     * @param $delta
     * @param $action
     * @return \ProjectA\Zed\Payment\Business\Model\Accounting\Transaction\AbsoluteAmounts
     */
    public function createModelAccountingTransactionAbsoluteAmounts($receivable, $cash, $balance, $delta, $action)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Accounting\Transaction\AbsoluteAmounts');
        $model = new $class($receivable, $cash, $balance, $delta, $action);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\Model\Config
     */
    public function createModelConfig()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Config');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Traversable $iterator
     * @return \ProjectA\Zed\Payment\Business\Model\Gui\View\Account
     */
    public function createModelGuiViewAccount(\Traversable $iterator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Gui\View\Account');
        $model = new $class($iterator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount $accountEntity
     * @return \ProjectA\Zed\Payment\Business\Model\Gui\View\AccountDecorator
     */
    public function createModelGuiViewAccountDecorator(\ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount $accountEntity)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Gui\View\AccountDecorator');
        $model = new $class($accountEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Traversable $iterator
     * @return \ProjectA\Zed\Payment\Business\Model\Gui\View\AccountJournal
     */
    public function createModelGuiViewAccountJournal(\Traversable $iterator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Gui\View\AccountJournal');
        $model = new $class($iterator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount $accountEntity
     * @return \ProjectA\Zed\Payment\Business\Model\Gui\View\AccountJournalDecorator
     */
    public function createModelGuiViewAccountJournalDecorator(\ProjectA_Zed_Payment_Persistence_Propel_PacPaymentAccount $accountEntity)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Gui\View\AccountJournalDecorator');
        $model = new $class($accountEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \Traversable $iterator
     * @return \ProjectA\Zed\Payment\Business\Model\Gui\View\Transaction
     */
    public function createModelGuiViewTransaction(\Traversable $iterator)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Gui\View\Transaction');
        $model = new $class($iterator);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction $transactionEntity
     * @return \ProjectA\Zed\Payment\Business\Model\Gui\View\TransactionDecorator
     */
    public function createModelGuiViewTransactionDecorator(\ProjectA_Zed_Payment_Persistence_Propel_PacPaymentTransaction $transactionEntity)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Gui\View\TransactionDecorator');
        $model = new $class($transactionEntity);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\Model\Payment
     */
    public function createModelPayment()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Payment');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\Model\PaymentMethod
     */
    public function createModelPaymentMethod()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\PaymentMethod');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $isSuccess
     * @return \ProjectA\Zed\Payment\Business\Model\PaymentResponse
     */
    public function createModelPaymentResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\PaymentResponse');
        $model = new $class($isSuccess);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\Model\PaymentStorageContainer
     */
    public function createModelPaymentStorageContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\PaymentStorageContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\Model\Transaction
     */
    public function createModelTransaction()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\Transaction');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\Model\TransactionStorageContainer
     */
    public function createModelTransactionStorageContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\Model\TransactionStorageContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\PaymentFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\PaymentFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payment\Business\PaymentSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payment\Business\PaymentSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
