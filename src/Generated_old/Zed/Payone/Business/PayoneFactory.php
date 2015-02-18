<?php 

namespace Generated\Zed\Payone\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class PayoneFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @return \ProjectA\Zed\Payone\Business\Facade\SimulationFacade
     */
    public function createFacadeSimulationFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Facade\SimulationFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Facade\StateMachineFacade
     */
    public function createFacadeStateMachineFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Facade\StateMachineFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Internal\Install
     */
    public function createInternalInstall()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Internal\Install');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @return \ProjectA\Zed\Payone\Business\Model\AbstractRequest
     */
    public function createModelAbstractRequest(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\AbstractRequest');
        $model = new $class($order);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Adapter\Http\Curl
     */
    public function createModelApiAdapterHttpCurl()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Adapter\Http\Curl');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Adapter\Http\Simulator
     */
    public function createModelApiAdapterHttpSimulator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Adapter\Http\Simulator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\ApiHelper
     */
    public function createModelApiApiHelper()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\ApiHelper');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\AbstractRequest
     */
    public function createModelApiRequestAbstractRequest(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\AbstractRequest');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\AddressCheckContainer
     */
    public function createModelApiRequestContainerAddressCheckContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\AddressCheckContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\BusinessContainer
     */
    public function createModelApiRequestContainerAuthorizationBusinessContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\BusinessContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\CashOnDeliveryContainer
     */
    public function createModelApiRequestContainerAuthorizationPaymentMethodCashOnDeliveryContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\CashOnDeliveryContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\CreditCardContainer
     */
    public function createModelApiRequestContainerAuthorizationPaymentMethodCreditCardContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\CreditCardContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\DirectDebitContainer
     */
    public function createModelApiRequestContainerAuthorizationPaymentMethodDirectDebitContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\DirectDebitContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\EWalletContainer
     */
    public function createModelApiRequestContainerAuthorizationPaymentMethodEWalletContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\EWalletContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\FinancingContainer
     */
    public function createModelApiRequestContainerAuthorizationPaymentMethodFinancingContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\FinancingContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\OnlineBankTransferContainer
     */
    public function createModelApiRequestContainerAuthorizationPaymentMethodOnlineBankTransferContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\OnlineBankTransferContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\PrePaymentContainer
     */
    public function createModelApiRequestContainerAuthorizationPaymentMethodPrePaymentContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PaymentMethod\PrePaymentContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PersonalContainer
     */
    public function createModelApiRequestContainerAuthorizationPersonalContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\PersonalContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\RedirectContainer
     */
    public function createModelApiRequestContainerAuthorizationRedirectContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\RedirectContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\ShippingContainer
     */
    public function createModelApiRequestContainerAuthorizationShippingContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\ShippingContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\ThreeDSecureContainer
     */
    public function createModelApiRequestContainerAuthorizationThreeDSecureContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Authorization\ThreeDSecureContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\AuthorizationContainer
     */
    public function createModelApiRequestContainerAuthorizationContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\AuthorizationContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\BankAccountCheckContainer
     */
    public function createModelApiRequestContainerBankAccountCheckContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\BankAccountCheckContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Capture\BusinessContainer
     */
    public function createModelApiRequestContainerCaptureBusinessContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Capture\BusinessContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\CaptureContainer
     */
    public function createModelApiRequestContainerCaptureContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\CaptureContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\ConsumerScoreContainer
     */
    public function createModelApiRequestContainerConsumerScoreContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\ConsumerScoreContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\CreditCardCheckContainer
     */
    public function createModelApiRequestContainerCreditCardCheckContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\CreditCardCheckContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Debit\BusinessContainer
     */
    public function createModelApiRequestContainerDebitBusinessContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Debit\BusinessContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Debit\PaymentMethod\BankAccountContainer
     */
    public function createModelApiRequestContainerDebitPaymentMethodBankAccountContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Debit\PaymentMethod\BankAccountContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Debit\PaymentMethod\CreditCardContainer
     */
    public function createModelApiRequestContainerDebitPaymentMethodCreditCardContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Debit\PaymentMethod\CreditCardContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\DebitContainer
     */
    public function createModelApiRequestContainerDebitContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\DebitContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\GetInvoiceContainer
     */
    public function createModelApiRequestContainerGetInvoiceContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\GetInvoiceContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Invoicing\ItemContainer
     */
    public function createModelApiRequestContainerInvoicingItemContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Invoicing\ItemContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Invoicing\TransactionContainer
     */
    public function createModelApiRequestContainerInvoicingTransactionContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Invoicing\TransactionContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\PreAuthorizationContainer
     */
    public function createModelApiRequestContainerPreAuthorizationContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\PreAuthorizationContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Refund\PaymentMethod\BankAccountContainer
     */
    public function createModelApiRequestContainerRefundPaymentMethodBankAccountContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\Refund\PaymentMethod\BankAccountContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\RefundContainer
     */
    public function createModelApiRequestContainerRefundContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\RefundContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Container\ThreeDSecureCheckContainer
     */
    public function createModelApiRequestContainerThreeDSecureCheckContainer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Container\ThreeDSecureCheckContainer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Management\GetInvoice
     */
    public function createModelApiRequestManagementGetInvoice(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Management\GetInvoice');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Authorization
     */
    public function createModelApiRequestPaymentAuthorization(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Authorization');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Capture
     */
    public function createModelApiRequestPaymentCapture(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Capture');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Debit
     */
    public function createModelApiRequestPaymentDebit(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Debit');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\PreAuthorization
     */
    public function createModelApiRequestPaymentPreAuthorization(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\PreAuthorization');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Refund
     */
    public function createModelApiRequestPaymentRefund(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Payment\Refund');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\AddressCheck
     */
    public function createModelApiRequestVerificationAddressCheck(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\AddressCheck');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\BankAccountCheck
     */
    public function createModelApiRequestVerificationBankAccountCheck(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\BankAccountCheck');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\ConsumerScore
     */
    public function createModelApiRequestVerificationConsumerScore(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\ConsumerScore');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\CreditCardCheck
     */
    public function createModelApiRequestVerificationCreditCardCheck(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\CreditCardCheck');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\ThreeDSecureCheck
     */
    public function createModelApiRequestVerificationThreeDSecureCheck(\ProjectA\Zed\Payone\Business\Model\Api\Adapter\AdapterInterface $executeAdapter)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Request\Verification\ThreeDSecureCheck');
        $model = new $class($executeAdapter);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\AddressCheckResponseContainer
     */
    public function createModelApiResponseContainerAddressCheckResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\AddressCheckResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\AuthorizationResponseContainer
     */
    public function createModelApiResponseContainerAuthorizationResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\AuthorizationResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\BankAccountCheckResponseContainer
     */
    public function createModelApiResponseContainerBankAccountCheckResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\BankAccountCheckResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\CaptureResponseContainer
     */
    public function createModelApiResponseContainerCaptureResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\CaptureResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\ConsumerScoreResponseContainer
     */
    public function createModelApiResponseContainerConsumerScoreResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\ConsumerScoreResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\CreditCardCheckResponseContainer
     */
    public function createModelApiResponseContainerCreditCardCheckResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\CreditCardCheckResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\DebitResponseContainer
     */
    public function createModelApiResponseContainerDebitResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\DebitResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\GetInvoiceResponseContainer
     */
    public function createModelApiResponseContainerGetInvoiceResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\GetInvoiceResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\PreAuthorizationResponseContainer
     */
    public function createModelApiResponseContainerPreAuthorizationResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\PreAuthorizationResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\RefundResponseContainer
     */
    public function createModelApiResponseContainerRefundResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\RefundResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Response\Container\ThreeDSecureCheckResponseContainer
     */
    public function createModelApiResponseContainerThreeDSecureCheckResponseContainer($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Response\Container\ThreeDSecureCheckResponseContainer');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Api\Service
     */
    public function createModelApiService()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Api\Service');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $paymentTransfer
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Authorize
     */
    public function createModelAuthorize(\ProjectA\Shared\Payone\Transfer\PaymentPayone $paymentTransfer, \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Authorize');
        $model = new $class($paymentTransfer, $order, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Capture
     */
    public function createModelCapture(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Capture');
        $model = new $class($order, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Debit
     */
    public function createModelDebit(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Debit');
        $model = new $class($order, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $paymentTransfer
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\PreAuthorize
     */
    public function createModelPreAuthorize(\ProjectA\Shared\Payone\Transfer\PaymentPayone $paymentTransfer, \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\PreAuthorize');
        $model = new $class($paymentTransfer, $order, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Refund
     */
    public function createModelRefund(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Refund');
        $model = new $class($order, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\TransactionStatus\AbstractRequest
     */
    public function createModelTransactionStatusAbstractRequest($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\TransactionStatus\AbstractRequest');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $params (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\Payone\Business\Model\TransactionStatus\TransactionStatusRequest
     */
    public function createModelTransactionStatusTransactionStatusRequest($params = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\TransactionStatus\TransactionStatusRequest');
        $model = new $class($params);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $isSuccess
     * @return \ProjectA\Zed\Payone\Business\Model\TransactionStatus\TransactionStatusResponse
     */
    public function createModelTransactionStatusTransactionStatusResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\TransactionStatus\TransactionStatusResponse');
        $model = new $class($isSuccess);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $isSuccess
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\PaymentResponse
     */
    public function createModelZedPaymentResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\PaymentResponse');
        $model = new $class($isSuccess);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param $amount
     * @param \ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumberProviderInterface $sequenceNumberProvider
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Capture
     */
    public function createModelZedRequestCapture(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, $amount, \ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumberProviderInterface $sequenceNumberProvider)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Capture');
        $model = new $class($order, $amount, $sequenceNumberProvider);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param $amount
     * @param \ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumberProviderInterface $sequenceNumberProvider
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Debit
     */
    public function createModelZedRequestDebit(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, $amount, \ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumberProviderInterface $sequenceNumberProvider)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Debit');
        $model = new $class($order, $amount, $sequenceNumberProvider);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Amount
     */
    public function createModelZedRequestMapperAmount($amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Amount');
        $model = new $class($amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $param (optional) default: null
     * @param $narrativeText (optional) default: null
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\AuthorizationAdditionalParams
     */
    public function createModelZedRequestMapperAuthorizationAuthorizationAdditionalParams($param = null, $narrativeText = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\AuthorizationAdditionalParams');
        $model = new $class($param, $narrativeText);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $referenceNumber
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\AuthorizationDefault
     */
    public function createModelZedRequestMapperAuthorizationAuthorizationDefault($referenceNumber)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\AuthorizationDefault');
        $model = new $class($referenceNumber);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\CreditCard
     */
    public function createModelZedRequestMapperAuthorizationCreditCard(\ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\CreditCard');
        $model = new $class($transferPayment);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\CreditCardPseudo
     */
    public function createModelZedRequestMapperAuthorizationCreditCardPseudo(\ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\CreditCardPseudo');
        $model = new $class($transferPayment);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\DirectDebit
     */
    public function createModelZedRequestMapperAuthorizationDirectDebit(\ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\DirectDebit');
        $model = new $class($transferPayment);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $walletType
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\EWallet
     */
    public function createModelZedRequestMapperAuthorizationEWallet($walletType)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\EWallet');
        $model = new $class($walletType);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $onlineBankTransferType
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\OnlineBankTransfer
     */
    public function createModelZedRequestMapperAuthorizationOnlineBankTransfer(\ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $onlineBankTransferType)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\OnlineBankTransfer');
        $model = new $class($transferPayment, $onlineBankTransferType);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\Personal
     */
    public function createModelZedRequestMapperAuthorizationPersonal(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\Personal');
        $model = new $class($order);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $clearingBankAccountData
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\PrePayment
     */
    public function createModelZedRequestMapperAuthorizationPrePayment($clearingBankAccountData)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\PrePayment');
        $model = new $class($clearingBankAccountData);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\Shipping
     */
    public function createModelZedRequestMapperAuthorizationShipping(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Authorization\Shipping');
        $model = new $class($order);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Capture\Business
     */
    public function createModelZedRequestMapperCaptureBusiness()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Capture\Business');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $txId
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Capture\CaptureDefault
     */
    public function createModelZedRequestMapperCaptureCaptureDefault($txId)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Capture\CaptureDefault');
        $model = new $class($txId);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $clearingType
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\ClearingType
     */
    public function createModelZedRequestMapperClearingType($clearingType)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\ClearingType');
        $model = new $class($clearingType);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Debit\Business
     */
    public function createModelZedRequestMapperDebitBusiness()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Debit\Business');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $txId
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Debit\DebitDefault
     */
    public function createModelZedRequestMapperDebitDebitDefault($txId)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Debit\DebitDefault');
        $model = new $class($txId);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Mode
     */
    public function createModelZedRequestMapperMode(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Mode');
        $model = new $class($order);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\NullMapper
     */
    public function createModelZedRequestMapperNullMapper()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\NullMapper');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Redirect
     */
    public function createModelZedRequestMapperRedirect()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Redirect');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumberProviderInterface $sequenceNumberProvider
     * @param \ProjectA_Zed_Payment_Persistence_Propel_PacPayment $payment
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\SequenceNumber
     */
    public function createModelZedRequestMapperSequenceNumber(\ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumberProviderInterface $sequenceNumberProvider, \ProjectA_Zed_Payment_Persistence_Propel_PacPayment $payment)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\SequenceNumber');
        $model = new $class($sequenceNumberProvider, $payment);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Standard
     */
    public function createModelZedRequestMapperStandard()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\Mapper\Standard');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\MapperFactory
     */
    public function createModelZedRequestMapperFactory()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\MapperFactory');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\MapperStack
     */
    public function createModelZedRequestMapperStack()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\MapperStack');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\CreditCard
     */
    public function createModelZedRequestPaymentMethodCreditCard(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\CreditCard');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\CreditCardPseudo
     */
    public function createModelZedRequestPaymentMethodCreditCardPseudo(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\CreditCardPseudo');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\DirectDebit
     */
    public function createModelZedRequestPaymentMethodDirectDebit(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\DirectDebit');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Eps
     */
    public function createModelZedRequestPaymentMethodEps(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Eps');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Giropay
     */
    public function createModelZedRequestPaymentMethodGiropay(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Giropay');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Ideal
     */
    public function createModelZedRequestPaymentMethodIdeal(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Ideal');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Invoice
     */
    public function createModelZedRequestPaymentMethodInvoice(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Invoice');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Paypal
     */
    public function createModelZedRequestPaymentMethodPaypal(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\Paypal');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\PrePayment
     */
    public function createModelZedRequestPaymentMethodPrePayment(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\PrePayment');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order
     * @param \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment
     * @param $amount
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\SofortUeberweisung
     */
    public function createModelZedRequestPaymentMethodSofortUeberweisung(\ProjectA_Zed_Sales_Persistence_Propel_PacSalesOrder $order, \ProjectA\Shared\Payone\Transfer\PaymentPayone $transferPayment, $amount)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Request\PaymentMethod\SofortUeberweisung');
        $model = new $class($order, $transferPayment, $amount);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumber
     */
    public function createModelZedSequenceNumber()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\SequenceNumber');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\Storage
     */
    public function createModelZedStorage()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\Storage');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\CheckPaymentExists
     */
    public function createModelZedTransactionStatusHandlerCheckPaymentExists()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\CheckPaymentExists');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\CheckSystem
     */
    public function createModelZedTransactionStatusHandlerCheckSystem()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\CheckSystem');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\CheckTransactionStatusAlreadyExists
     */
    public function createModelZedTransactionStatusHandlerCheckTransactionStatusAlreadyExists()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\CheckTransactionStatusAlreadyExists');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\NullHandler
     */
    public function createModelZedTransactionStatusHandlerNullHandler()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\NullHandler');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\StatemachineDirectTrigger
     */
    public function createModelZedTransactionStatusHandlerStatemachineDirectTrigger()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\StatemachineDirectTrigger');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\StoreTransaction
     */
    public function createModelZedTransactionStatusHandlerStoreTransaction()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\StoreTransaction');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TransformCurrency
     */
    public function createModelZedTransactionStatusHandlerTransformCurrency()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TransformCurrency');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Appointed
     */
    public function createModelZedTransactionStatusHandlerTxActionAppointed()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Appointed');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Cancelation
     */
    public function createModelZedTransactionStatusHandlerTxActionCancelation()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Cancelation');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Capture
     */
    public function createModelZedTransactionStatusHandlerTxActionCapture()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Capture');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Debit
     */
    public function createModelZedTransactionStatusHandlerTxActionDebit()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Debit');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Invoice
     */
    public function createModelZedTransactionStatusHandlerTxActionInvoice()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Invoice');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Paid
     */
    public function createModelZedTransactionStatusHandlerTxActionPaid()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Paid');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Refund
     */
    public function createModelZedTransactionStatusHandlerTxActionRefund()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Refund');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Reminder
     */
    public function createModelZedTransactionStatusHandlerTxActionReminder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Reminder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Transfer
     */
    public function createModelZedTransactionStatusHandlerTxActionTransfer()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Transfer');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Underpaid
     */
    public function createModelZedTransactionStatusHandlerTxActionUnderpaid()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Underpaid');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Vauthorization
     */
    public function createModelZedTransactionStatusHandlerTxActionVauthorization()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\Vauthorization');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\VSettlement
     */
    public function createModelZedTransactionStatusHandlerTxActionVSettlement()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Handler\TxAction\VSettlement');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Simulator
     */
    public function createModelZedTransactionStatusSimulator()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\Simulator');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\Payone\Business\Model\TransactionStatus\TransactionStatusRequest $request
     * @param $isLive
     * @param \ProjectA_Zed_Payment_Persistence_Propel_PacPayment $payment (optional) default: null
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusContext
     */
    public function createModelZedTransactionStatusTransactionStatusContext(\ProjectA\Zed\Payone\Business\Model\TransactionStatus\TransactionStatusRequest $request, $isLive, \ProjectA_Zed_Payment_Persistence_Propel_PacPayment $payment = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusContext');
        $model = new $class($request, $isLive, $payment);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusFactory
     */
    public function createModelZedTransactionStatusTransactionStatusFactory()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusFactory');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $handlerStack
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusProcessor
     */
    public function createModelZedTransactionStatusTransactionStatusProcessor($handlerStack)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusProcessor');
        $model = new $class($handlerStack);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusStateMachineTrigger
     */
    public function createModelZedTransactionStatusTransactionStatusStateMachineTrigger()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\TransactionStatusStateMachineTrigger');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $isSuccess
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\ZedTransactionStatusResponse
     */
    public function createModelZedTransactionStatusZedTransactionStatusResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatus\ZedTransactionStatusResponse');
        $model = new $class($isSuccess);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatusFinder
     */
    public function createModelZedTransactionStatusFinder()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\Model\Zed\TransactionStatusFinder');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\Payone\Business\PayoneFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\Payone\Business\PayoneFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Payone\Business\PayoneSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\Payone\Business\PayoneSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\Payone\Business\Internal\DemoData\ActivatePaymentInstall
     */
    public function createInternalDemoDataActivatePaymentInstall()
    {
        $class = $this->transformClassName('Pyz\Zed\Payone\Business\Internal\DemoData\ActivatePaymentInstall');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
