<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Adyen_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_Adyen_Component_Facade_StateMachine
     */
    public function getFacadeStateMachine()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Facade_StateMachine');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_AbstractContainer
     */
    public function getModelApiContainerAbstractContainer()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_AbstractContainer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $wsdl 
     * @param mixed $encoding 
     * @param mixed $proxy_host (optional) default: null
     * @param mixed $proxy_port (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Generator
     */
    public function getModelApiContainerGenerator($wsdl, $encoding, $proxy_host = null, $proxy_port = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Generator');
        $model = new $class($wsdl, $encoding, $proxy_host, $proxy_port);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_Amount
     */
    public function getModelApiContainerNotificationAmount($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_Amount');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_AnyType2anyTypeMap
     */
    public function getModelApiContainerNotificationAnyType2anyTypeMap($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_AnyType2anyTypeMap');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ArrayOfNotificationRequestItem
     */
    public function getModelApiContainerNotificationArrayOfNotificationRequestItem($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ArrayOfNotificationRequestItem');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ArrayOfString
     */
    public function getModelApiContainerNotificationArrayOfString($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ArrayOfString');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_Entry
     */
    public function getModelApiContainerNotificationEntry($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_Entry');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequest
     */
    public function getModelApiContainerNotificationNotificationRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequestItem
     */
    public function getModelApiContainerNotificationNotificationRequestItem($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequestItem');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_SendNotification
     */
    public function getModelApiContainerNotificationSendNotification($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_SendNotification');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_SendNotificationResponse
     */
    public function getModelApiContainerNotificationSendNotificationResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_SendNotificationResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ServiceException
     */
    public function getModelApiContainerNotificationServiceException($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_ServiceException');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_NotificationSoapClient
     */
    public function getModelApiContainerNotificationSoapClient()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_NotificationSoapClient');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Address
     */
    public function getModelApiContainerPaymentAddress($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Address');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Amount
     */
    public function getModelApiContainerPaymentAmount($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Amount');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AnyType2anyTypeMap
     */
    public function getModelApiContainerPaymentAnyType2anyTypeMap($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AnyType2anyTypeMap');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ArrayOfFraudCheckResult
     */
    public function getModelApiContainerPaymentArrayOfFraudCheckResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ArrayOfFraudCheckResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Authorise
     */
    public function getModelApiContainerPaymentAuthorise($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Authorise');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Authorise3d
     */
    public function getModelApiContainerPaymentAuthorise3d($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Authorise3d');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Authorise3dResponse
     */
    public function getModelApiContainerPaymentAuthorise3dResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Authorise3dResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AuthoriseReferral
     */
    public function getModelApiContainerPaymentAuthoriseReferral($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AuthoriseReferral');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AuthoriseReferralResponse
     */
    public function getModelApiContainerPaymentAuthoriseReferralResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AuthoriseReferralResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AuthoriseResponse
     */
    public function getModelApiContainerPaymentAuthoriseResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_AuthoriseResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheck
     */
    public function getModelApiContainerPaymentBalanceCheck($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheck');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheckRequest
     */
    public function getModelApiContainerPaymentBalanceCheckRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheckRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheckResponse
     */
    public function getModelApiContainerPaymentBalanceCheckResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheckResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheckResult
     */
    public function getModelApiContainerPaymentBalanceCheckResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BalanceCheckResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BankAccount
     */
    public function getModelApiContainerPaymentBankAccount($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BankAccount');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BrowserInfo
     */
    public function getModelApiContainerPaymentBrowserInfo($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_BrowserInfo');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Cancel
     */
    public function getModelApiContainerPaymentCancel($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Cancel');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CancelOrRefund
     */
    public function getModelApiContainerPaymentCancelOrRefund($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CancelOrRefund');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CancelOrRefundResponse
     */
    public function getModelApiContainerPaymentCancelOrRefundResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CancelOrRefundResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CancelResponse
     */
    public function getModelApiContainerPaymentCancelResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CancelResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Capture
     */
    public function getModelApiContainerPaymentCapture($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Capture');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CaptureResponse
     */
    public function getModelApiContainerPaymentCaptureResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CaptureResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Card
     */
    public function getModelApiContainerPaymentCard($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Card');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CheckFraud
     */
    public function getModelApiContainerPaymentCheckFraud($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CheckFraud');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CheckFraudResponse
     */
    public function getModelApiContainerPaymentCheckFraudResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_CheckFraudResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Directdebit
     */
    public function getModelApiContainerPaymentDirectdebit($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Directdebit');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_DirectDebitRequest
     */
    public function getModelApiContainerPaymentDirectDebitRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_DirectDebitRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_DirectdebitResponse
     */
    public function getModelApiContainerPaymentDirectdebitResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_DirectdebitResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ELV
     */
    public function getModelApiContainerPaymentELV($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ELV');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Entry
     */
    public function getModelApiContainerPaymentEntry($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Entry');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ForexQuote
     */
    public function getModelApiContainerPaymentForexQuote($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ForexQuote');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FraudCheckResult
     */
    public function getModelApiContainerPaymentFraudCheckResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FraudCheckResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FraudResult
     */
    public function getModelApiContainerPaymentFraudResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FraudResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransfer
     */
    public function getModelApiContainerPaymentFundTransfer($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransfer');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransferRequest
     */
    public function getModelApiContainerPaymentFundTransferRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransferRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransferResponse
     */
    public function getModelApiContainerPaymentFundTransferResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransferResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransferResult
     */
    public function getModelApiContainerPaymentFundTransferResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_FundTransferResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ModificationRequest
     */
    public function getModelApiContainerPaymentModificationRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ModificationRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ModificationResult
     */
    public function getModelApiContainerPaymentModificationResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ModificationResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_PaymentRequest
     */
    public function getModelApiContainerPaymentPaymentRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_PaymentRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_PaymentRequest3d
     */
    public function getModelApiContainerPaymentPaymentRequest3d($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_PaymentRequest3d');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_PaymentResult
     */
    public function getModelApiContainerPaymentPaymentResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_PaymentResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Recurring
     */
    public function getModelApiContainerPaymentRecurring($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Recurring');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Refund
     */
    public function getModelApiContainerPaymentRefund($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_Refund');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_RefundResponse
     */
    public function getModelApiContainerPaymentRefundResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_RefundResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_RefundWithData
     */
    public function getModelApiContainerPaymentRefundWithData($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_RefundWithData');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_RefundWithDataResponse
     */
    public function getModelApiContainerPaymentRefundWithDataResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_RefundWithDataResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ServiceException
     */
    public function getModelApiContainerPaymentServiceException($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ServiceException');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ThreeDSecureData
     */
    public function getModelApiContainerPaymentThreeDSecureData($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Payment_ThreeDSecureData');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Address
     */
    public function getModelApiContainerRecurringAddress($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Address');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Amount
     */
    public function getModelApiContainerRecurringAmount($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Amount');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ArrayOfRecurringDetail
     */
    public function getModelApiContainerRecurringArrayOfRecurringDetail($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ArrayOfRecurringDetail');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_BankAccount
     */
    public function getModelApiContainerRecurringBankAccount($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_BankAccount');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Card
     */
    public function getModelApiContainerRecurringCard($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Card');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DeactivateRecurring
     */
    public function getModelApiContainerRecurringDeactivateRecurring($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DeactivateRecurring');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DeactivateRecurringResponse
     */
    public function getModelApiContainerRecurringDeactivateRecurringResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DeactivateRecurringResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Disable
     */
    public function getModelApiContainerRecurringDisable($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_Disable');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DisableRequest
     */
    public function getModelApiContainerRecurringDisableRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DisableRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DisableResponse
     */
    public function getModelApiContainerRecurringDisableResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DisableResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DisableResult
     */
    public function getModelApiContainerRecurringDisableResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_DisableResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ELV
     */
    public function getModelApiContainerRecurringELV($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ELV');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_InitialiseRecurring
     */
    public function getModelApiContainerRecurringInitialiseRecurring($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_InitialiseRecurring');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_InitialiseRecurringResponse
     */
    public function getModelApiContainerRecurringInitialiseRecurringResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_InitialiseRecurringResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ListRecurringDetails
     */
    public function getModelApiContainerRecurringListRecurringDetails($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ListRecurringDetails');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ListRecurringDetailsResponse
     */
    public function getModelApiContainerRecurringListRecurringDetailsResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ListRecurringDetailsResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringDetail
     */
    public function getModelApiContainerRecurringRecurringDetail($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringDetail');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringDetailsRequest
     */
    public function getModelApiContainerRecurringRecurringDetailsRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringDetailsRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringDetailsResult
     */
    public function getModelApiContainerRecurringRecurringDetailsResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringDetailsResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringRequest
     */
    public function getModelApiContainerRecurringRecurringRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringResult
     */
    public function getModelApiContainerRecurringRecurringResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_RecurringResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ServiceException
     */
    public function getModelApiContainerRecurringServiceException($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_ServiceException');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreToken
     */
    public function getModelApiContainerRecurringStoreToken($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreToken');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreTokenRequest
     */
    public function getModelApiContainerRecurringStoreTokenRequest($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreTokenRequest');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreTokenResponse
     */
    public function getModelApiContainerRecurringStoreTokenResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreTokenResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreTokenResult
     */
    public function getModelApiContainerRecurringStoreTokenResult($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_StoreTokenResult');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_SubmitRecurring
     */
    public function getModelApiContainerRecurringSubmitRecurring($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_SubmitRecurring');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_SubmitRecurringResponse
     */
    public function getModelApiContainerRecurringSubmitRecurringResponse($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring_SubmitRecurringResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring
     */
    public function getModelApiContainerRecurring($obj = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_Recurring');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Container_SoapClientGenerator
     */
    public function getModelApiContainerSoapClientGenerator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Container_SoapClientGenerator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Adyen_Component_Model_Api_SoapServerConfig $soapServerConfig
     *
     * @return ProjectA_Zed_Adyen_Component_Model_Api_NotificationSoapServer
     */
    public function getModelApiNotificationSoapServer(ProjectA_Zed_Adyen_Component_Model_Api_SoapServerConfig $soapServerConfig)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_NotificationSoapServer');
        $model = new $class($soapServerConfig);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Adyen_Component_Model_Api_SoapClientConfig $soapConfig 
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Request_DataFactory
     */
    public function getModelApiRequestDataFactory(ProjectA_Zed_Adyen_Component_Model_Api_SoapClientConfig $soapConfig)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_DataFactory');
        $model = new $class($soapConfig);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_AccountTransaction
     */
    public function getModelApiRequestNotificationHandlerAccountTransaction()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_AccountTransaction');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param
     * ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequestItem
     * $notificationItem 
     * @param mixed $isLive 
     * @param ProjectA_Zed_Payment_Persistence_PacPayment $payment (optional) default:
     * null
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_Context
     */
    public function getModelApiRequestNotificationHandlerContext(ProjectA_Zed_Adyen_Component_Model_Api_Container_Notification_NotificationRequestItem $notificationItem, $isLive, ProjectA_Zed_Payment_Persistence_PacPayment $payment = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_Context');
        $model = new $class($notificationItem, $isLive, $payment);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_CreatePayment
     */
    public function getModelApiRequestNotificationHandlerCreatePayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_CreatePayment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_LogToLumberjack
     */
    public function getModelApiRequestNotificationHandlerLogToLumberjack()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_LogToLumberjack');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_QueueNotificationItem
     */
    public function getModelApiRequestNotificationHandlerQueueNotificationItem()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_QueueNotificationItem');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_StateMachineDirectTrigger
     */
    public function getModelApiRequestNotificationHandlerStateMachineDirectTrigger()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_StateMachineDirectTrigger');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_StateMachineStoreTriggerToQueue
     */
    public function getModelApiRequestNotificationHandlerStateMachineStoreTriggerToQueue()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_StateMachineStoreTriggerToQueue');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_StoreTransaction
     */
    public function getModelApiRequestNotificationHandlerStoreTransaction()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification_Handler_StoreTransaction');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification
     */
    public function getModelApiRequestNotification()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Notification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Request_Payment
     */
    public function getModelApiRequestPayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Payment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Request_Recurring
     */
    public function getModelApiRequestRecurring()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Request_Recurring');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Response_Builder_Notification
     */
    public function getModelApiResponseBuilderNotification()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Response_Builder_Notification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Response_Builder_Payment
     */
    public function getModelApiResponseBuilderPayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Response_Builder_Payment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $isSuccess 
     * @return ProjectA_Zed_Adyen_Component_Model_Api_Response
     */
    public function getModelApiResponse($isSuccess)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_Response');
        $model = new $class($isSuccess);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_Adyen_Component_Model_Api_SoapClientConfig $soapConfig 
     * @return ProjectA_Zed_Adyen_Component_Model_Api_SoapClient
     */
    public function getModelApiSoapClient(ProjectA_Zed_Adyen_Component_Model_Api_SoapClientConfig $soapConfig)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_SoapClient');
        $model = new $class($soapConfig);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $wsdlUrl 
     * @param mixed $locationUrl 
     * @param mixed $account 
     * @param mixed $user 
     * @param mixed $password 
     * @return ProjectA_Zed_Adyen_Component_Model_Api_SoapClientConfig
     */
    public function getModelApiSoapClientConfig($wsdlUrl, $locationUrl, $account, $user, $password)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_SoapClientConfig');
        $model = new $class($wsdlUrl, $locationUrl, $account, $user, $password);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Api_SoapResponse
     */
    public function getModelApiSoapResponse()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_SoapResponse');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $wsdlUrl 
     * @param bool $notificationRawDataLoggingEnabled (optional) default: false
     * @return ProjectA_Zed_Adyen_Component_Model_Api_SoapServerConfig
     */
    public function getModelApiSoapServerConfig($wsdlUrl, $notificationRawDataLoggingEnabled = false)
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Api_SoapServerConfig');
        $model = new $class($wsdlUrl, $notificationRawDataLoggingEnabled);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_Development_NotificationRawDataProcessor
     */
    public function getModelDevelopmentNotificationRawDataProcessor()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Development_NotificationRawDataProcessor');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Development_NotificationSimulator
     */
    public function getModelDevelopmentNotificationSimulator()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Development_NotificationSimulator');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Helper
     */
    public function getModelHelper()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Helper');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_Hpp_Request_Payment
     */
    public function getModelHppRequestPayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_Hpp_Request_Payment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_NotificationQueue
     */
    public function getModelNotificationQueue()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_NotificationQueue');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Authorise
     */
    public function getModelStateMachineCommandPaymentAuthorise()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Authorise');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_AuthoriseGrandTotal
     */
    public function getModelStateMachineCommandPaymentAuthoriseGrandTotal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_AuthoriseGrandTotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Cancel
     */
    public function getModelStateMachineCommandPaymentCancel()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Cancel');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_CancelOrRefund
     */
    public function getModelStateMachineCommandPaymentCancelOrRefund()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_CancelOrRefund');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Capture
     */
    public function getModelStateMachineCommandPaymentCapture()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Capture');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_CaptureGrandTotal
     */
    public function getModelStateMachineCommandPaymentCaptureGrandTotal()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_CaptureGrandTotal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_PaypalHpp
     */
    public function getModelStateMachineCommandPaymentPaypalHpp()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_PaypalHpp');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Refund
     */
    public function getModelStateMachineCommandPaymentRefund()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Command_Payment_Refund');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_Adyen_Component_Model_StateMachine_Rule_Payment_TransactionApproved
     */
    public function getModelStateMachineRulePaymentTransactionApproved()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Model_StateMachine_Rule_Payment_TransactionApproved');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_Adyen_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('ProjectA_Zed_Adyen_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
