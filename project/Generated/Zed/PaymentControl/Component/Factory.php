<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_PaymentControl_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return ProjectA_Zed_PaymentControl_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_PaymentControl_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $msg (optional) default: ''
     * @param int $code 
     * @param Exception $previous (optional) default: null
     * @return ProjectA_Zed_PaymentControl_Component_Model_Attribute_Exception
     */
    public function getModelAttributeException($msg = '', $code = 0, Exception $previous = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Exception');
        $model = new $class($msg, $code, $previous);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_AddressLowercase
     */
    public function getModelAttributeExtractorAddressLowercase()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_AddressLowercase');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_AddressUppercase
     */
    public function getModelAttributeExtractorAddressUppercase()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_AddressUppercase');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_BillingAddress
     */
    public function getModelAttributeExtractorBillingAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_BillingAddress');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_BillingSameAsShipping
     */
    public function getModelAttributeExtractorBillingSameAsShipping()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_BillingSameAsShipping');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_CartValue
     */
    public function getModelAttributeExtractorCartValue()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_CartValue');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_CustomerName
     */
    public function getModelAttributeExtractorCustomerName()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_CustomerName');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_EmailDomain
     */
    public function getModelAttributeExtractorEmailDomain()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_EmailDomain');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_EmailTopLevelDomain
     */
    public function getModelAttributeExtractorEmailTopLevelDomain()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_EmailTopLevelDomain');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_Hour
     */
    public function getModelAttributeExtractorHour()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_Hour');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_IpAddress
     */
    public function getModelAttributeExtractorIpAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_IpAddress');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_NamesLowercase
     */
    public function getModelAttributeExtractorNamesLowercase()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_NamesLowercase');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_NamesUppercase
     */
    public function getModelAttributeExtractorNamesUppercase()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_NamesUppercase');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_OperatingSystem
     */
    public function getModelAttributeExtractorOperatingSystem()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_OperatingSystem');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_OrderTransfer
     */
    public function getModelAttributeExtractorOrderTransfer()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_OrderTransfer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_ShippingAddress
     */
    public function getModelAttributeExtractorShippingAddress()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Extractor_ShippingAddress');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param array $attributes (optional) default: array()
     * @return ProjectA_Zed_PaymentControl_Component_Model_Attribute_Vector
     */
    public function getModelAttributeVector($attributes = array())
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Attribute_Vector');
        $model = new $class($attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $items (optional) default: null
     * @param int $flags 
     * @param string $iteratorClass (optional) default: 'ArrayIterator'
     * @return ProjectA_Zed_PaymentControl_Component_Model_Data_Collection
     */
    public function getModelDataCollection($items = null, $flags = 0, $iteratorClass = 'ArrayIterator')
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Data_Collection');
        $model = new $class($items, $flags, $iteratorClass);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Zed_PaymentControl_Component_Model_Data_Raw $rawData 
     * @param ProjectA_Zed_PaymentControl_Component_Model_Attribute_Vector $attributes 
     * @return ProjectA_Zed_PaymentControl_Component_Model_Data_Container
     */
    public function getModelDataContainer(ProjectA_Zed_PaymentControl_Component_Model_Data_Raw $rawData, ProjectA_Zed_PaymentControl_Component_Model_Attribute_Vector $attributes)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Data_Container');
        $model = new $class($rawData, $attributes);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param ProjectA_Shared_Sales_Transfer_Order $order 
     * @param DateTime $timestamp (optional) default: null
     * @param mixed $sessionId (optional) default: null
     * @return ProjectA_Zed_PaymentControl_Component_Model_Data_Raw
     */
    public function getModelDataRaw(ProjectA_Shared_Sales_Transfer_Order $order, DateTime $timestamp = null, $sessionId = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Data_Raw');
        $model = new $class($order, $timestamp, $sessionId);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_PaymentControl_Component_Model_Engine_AllowAllMethods
     */
    public function getModelEngineAllowAllMethods()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_AllowAllMethods');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Creditcard
     */
    public function getModelEnginePaymentMethodFilterCreditcard()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Creditcard');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Debit
     */
    public function getModelEnginePaymentMethodFilterDebit()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Debit');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $paymentMethod 
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_EmailDomain
     */
    public function getModelEnginePaymentMethodFilterEmailDomain($paymentMethod)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_EmailDomain');
        $model = new $class($paymentMethod);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $paymentMethod 
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_EmailTopLevelDomain
     */
    public function getModelEnginePaymentMethodFilterEmailTopLevelDomain($paymentMethod)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_EmailTopLevelDomain');
        $model = new $class($paymentMethod);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Eps
     */
    public function getModelEnginePaymentMethodFilterEps()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Eps');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param string $msg (optional) default: ''
     * @param int $code 
     * @param Exception $previous (optional) default: null
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Exception
     */
    public function getModelEnginePaymentMethodFilterException($msg = '', $code = 0, Exception $previous = null)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Exception');
        $model = new $class($msg, $code, $previous);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Ideal
     */
    public function getModelEnginePaymentMethodFilterIdeal()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Ideal');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Invoice
     */
    public function getModelEnginePaymentMethodFilterInvoice()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Invoice');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $paymentMethod 
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_IpAddress
     */
    public function getModelEnginePaymentMethodFilterIpAddress($paymentMethod)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_IpAddress');
        $model = new $class($paymentMethod);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $paymentMethod 
     * @param mixed $maximumGrandTotal 
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_MaximumGrandTotal
     */
    public function getModelEnginePaymentMethodFilterMaximumGrandTotal($paymentMethod, $maximumGrandTotal)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_MaximumGrandTotal');
        $model = new $class($paymentMethod, $maximumGrandTotal);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_PaymentInAdvanceAfterClarifyRiskyPayment
     */
    public function getModelEnginePaymentMethodFilterPaymentInAdvanceAfterClarifyRiskyPayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_PaymentInAdvanceAfterClarifyRiskyPayment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Paypalexpress
     */
    public function getModelEnginePaymentMethodFilterPaypalexpress()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Paypalexpress');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Prepayment
     */
    public function getModelEnginePaymentMethodFilterPrepayment()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_Prepayment');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_SofortBanking
     */
    public function getModelEnginePaymentMethodFilterSofortBanking()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_SofortBanking');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $paymentMethod 
     * @param mixed $visibleFrom 
     * @param mixed $visibleTo 
     * @return
     * ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_TimeBetween
     */
    public function getModelEnginePaymentMethodFilterTimeBetween($paymentMethod, $visibleFrom, $visibleTo)
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter_TimeBetween');
        $model = new $class($paymentMethod, $visibleFrom, $visibleTo);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter
     */
    public function getModelEnginePaymentMethodFilter()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_PaymentMethodFilter');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return ProjectA_Zed_PaymentControl_Component_Model_Engine_SimpleManualCriteria
     */
    public function getModelEngineSimpleManualCriteria()
    {
        $class = $this->transformClassName('ProjectA_Zed_PaymentControl_Component_Model_Engine_SimpleManualCriteria');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_PaymentControl_Component_Model_Manager
     */
    public function getModelManager()
    {
        $class = $this->transformClassName('Sao_Zed_PaymentControl_Component_Model_Manager');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_PaymentControl_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_PaymentControl_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
