<?php 

namespace Generated\Zed\PaymentControl\Business;

use ProjectA\Zed\Library\Dependency\DependencyInjector;

/**
 *
 */
class PaymentControlFactory extends \ProjectA_Shared_Library_Architecture_Store implements \ProjectA\Zed\Library\Business\FactoryInterface
{

    /**
     * @param $attributes (optional) default: array(
     *     
     * )
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\AttributeVector
     */
    public function createModelAttributeAttributeVector($attributes = array())
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\AttributeVector');
        $model = new $class($attributes);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\AddressLowercaseExtractor
     */
    public function createModelAttributeExtractorAddressLowercaseExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\AddressLowercaseExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\AddressUppercaseExtractor
     */
    public function createModelAttributeExtractorAddressUppercaseExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\AddressUppercaseExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\BillingAddressExtractor
     */
    public function createModelAttributeExtractorBillingAddressExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\BillingAddressExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\BillingSameAsShippingExtractor
     */
    public function createModelAttributeExtractorBillingSameAsShippingExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\BillingSameAsShippingExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\CartValueExtractor
     */
    public function createModelAttributeExtractorCartValueExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\CartValueExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\CustomerNameExtractor
     */
    public function createModelAttributeExtractorCustomerNameExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\CustomerNameExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\EmailDomainExtractor
     */
    public function createModelAttributeExtractorEmailDomainExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\EmailDomainExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\EmailTopLevelDomainExtractor
     */
    public function createModelAttributeExtractorEmailTopLevelDomainExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\EmailTopLevelDomainExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\HourExtractor
     */
    public function createModelAttributeExtractorHourExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\HourExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\IpAddressExtractor
     */
    public function createModelAttributeExtractorIpAddressExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\IpAddressExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\NamesLowercaseExtractor
     */
    public function createModelAttributeExtractorNamesLowercaseExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\NamesLowercaseExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\NamesUppercaseExtractor
     */
    public function createModelAttributeExtractorNamesUppercaseExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\NamesUppercaseExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\OperatingSystemExtractor
     */
    public function createModelAttributeExtractorOperatingSystemExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\OperatingSystemExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\OrderTransferExtractor
     */
    public function createModelAttributeExtractorOrderTransferExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\OrderTransferExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\ShippingAddressExtractor
     */
    public function createModelAttributeExtractorShippingAddressExtractor()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Attribute\Extractor\ShippingAddressExtractor');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $items (optional) default: null
     * @param $flags
     * @param $iteratorClass (optional) default: 'ArrayIterator'
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Data\DataCollection
     */
    public function createModelDataDataCollection($items = null, $flags = 0, $iteratorClass = 'ArrayIterator')
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Data\DataCollection');
        $model = new $class($items, $flags, $iteratorClass);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Zed\PaymentControl\Business\Model\Data\RawData $rawData
     * @param \ProjectA\Zed\PaymentControl\Business\Model\Attribute\AttributeVector $attributes
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Data\DataContainer
     */
    public function createModelDataDataContainer(\ProjectA\Zed\PaymentControl\Business\Model\Data\RawData $rawData, \ProjectA\Zed\PaymentControl\Business\Model\Attribute\AttributeVector $attributes)
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Data\DataContainer');
        $model = new $class($rawData, $attributes);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $order
     * @param \ProjectA\Shared\Library\Communication\Request $request
     * @param \DateTime $timestamp (optional) default: null
     * @param $sessionId (optional) default: null
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Data\RawData
     */
    public function createModelDataRawData(\ProjectA\Shared\Sales\Transfer\Order $order, \ProjectA\Shared\Library\Communication\Request $request, \DateTime $timestamp = null, $sessionId = null)
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Data\RawData');
        $model = new $class($order, $request, $timestamp, $sessionId);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\AllowAllMethods
     */
    public function createModelEngineAllowAllMethods()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\AllowAllMethods');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $paymentMethod
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\EmailDomainFilter
     */
    public function createModelEnginePaymentMethodFilterEmailDomainFilter($paymentMethod)
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\EmailDomainFilter');
        $model = new $class($paymentMethod);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $paymentMethod
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\EmailTopLevelDomainFilter
     */
    public function createModelEnginePaymentMethodFilterEmailTopLevelDomainFilter($paymentMethod)
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\EmailTopLevelDomainFilter');
        $model = new $class($paymentMethod);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $paymentMethod
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\IpAddressFilter
     */
    public function createModelEnginePaymentMethodFilterIpAddressFilter($paymentMethod)
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\IpAddressFilter');
        $model = new $class($paymentMethod);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $paymentMethod
     * @param $maximumGrandTotal
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\MaximumGrandTotalFilter
     */
    public function createModelEnginePaymentMethodFilterMaximumGrandTotalFilter($paymentMethod, $maximumGrandTotal)
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\MaximumGrandTotalFilter');
        $model = new $class($paymentMethod, $maximumGrandTotal);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param $paymentMethod
     * @param $visibleFrom
     * @param $visibleTo
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\TimeBetweenFilter
     */
    public function createModelEnginePaymentMethodFilterTimeBetweenFilter($paymentMethod, $visibleFrom, $visibleTo)
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilter\TimeBetweenFilter');
        $model = new $class($paymentMethod, $visibleFrom, $visibleTo);
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilterEngine
     */
    public function createModelEnginePaymentMethodFilterEngine()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\PaymentMethodFilterEngine');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\Engine\SimpleManualCriteria
     */
    public function createModelEngineSimpleManualCriteria()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\Engine\SimpleManualCriteria');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\Model\PaymentControlManager
     */
    public function createModelPaymentControlManager()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\Model\PaymentControlManager');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \ProjectA\Zed\PaymentControl\Business\PaymentControlFacade
     */
    public function createFacade()
    {
        $class = $this->transformClassName('ProjectA\Zed\PaymentControl\Business\PaymentControlFacade');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return \Pyz\Zed\PaymentControl\Business\PaymentControlSettings
     */
    public function createSettings()
    {
        $class = $this->transformClassName('Pyz\Zed\PaymentControl\Business\PaymentControlSettings');
        $model = new $class();
        DependencyInjector::injectDependencies($model, $this);
        return $model;
    }


}
