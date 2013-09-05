<?php 

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class Generated_Zed_Fulfillment_Component_Factory extends ProjectA_Shared_Library_Architecture_Store implements ProjectA_Zed_Library_Component_Interface_FactoryInterface
{

    /**
     * @return Sao_Zed_Fulfillment_Component_Facade
     */
    public function getFacade()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Facade');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Internal_Install
     */
    public function getInternalInstall()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Internal_Install');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Order_Response
     */
    public function getModelApiOrderResponse()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Api_Order_Response');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response
     */
    public function getModelApiQuoteResponse()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Api_Quote_Response');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate
     */
    public function getModelApiQuoteShippingRate()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Api_Quote_ShippingRate');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result_Collection
     */
    public function getModelApiTrackingResultCollection()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result_Collection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result
     */
    public function getModelApiTrackingResult()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Result');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Status
     */
    public function getModelApiTrackingStatus()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Api_Tracking_Status');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Finder
     */
    public function getModelFinder()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Finder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Api
     */
    public function getModelJondoApi()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Api');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Notification
     */
    public function getModelJondoMessageNotification()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Message_Notification');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $code
     * @param mixed $quantity
     * @param mixed $imageLocation (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item
     */
    public function getModelJondoRequestItem($code, $quantity, $imageLocation = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Item');
        $model = new $class($code, $quantity, $imageLocation);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order
     */
    public function getModelJondoRequestOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Order');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Quote
     */
    public function getModelJondoRequestQuote()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Quote');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Factory
     */
    public function getModelJondoRequestServiceFactory()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Factory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_InsertCard
     */
    public function getModelJondoRequestServiceInsertCard()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_InsertCard');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_KingSlip
     */
    public function getModelJondoRequestServiceKingSlip()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_KingSlip');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Sticker
     */
    public function getModelJondoRequestServiceSticker()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_Service_Sticker');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Request_ServiceManager
     */
    public function getModelJondoRequestServiceManager()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Request_ServiceManager');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Location
     */
    public function getModelJondoResponseLocation()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Location');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Order
     */
    public function getModelJondoResponseOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Order');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Quote
     */
    public function getModelJondoResponseQuote()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Response_Quote');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Fedex
     */
    public function getModelJondoShippingFedex()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Fedex');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate
     */
    public function getModelJondoShippingRate()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Rate');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Usps
     */
    public function getModelJondoShippingUsps()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Shipping_Usps');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $data
     * @return Sao_Zed_Fulfillment_Component_Model_Jondo_Tracking
     */
    public function getModelJondoTracking($data)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Jondo_Tracking');
        $model = new $class($data);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Api_Client
     */
    public function getModelMarcofineartsApiClient()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Api_Client');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Api
     */
    public function getModelMarcofineartsApi()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Api');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_BillingAddress
     */
    public function getModelMarcofineartsRequestPushOrderBillingAddress(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_BillingAddress');
        $model = new $class($address);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderData
     */
    public function getModelMarcofineartsRequestPushOrderOrderData()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderData');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Traversable $items
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfo
     */
    public function getModelMarcofineartsRequestPushOrderOrderInfo(Traversable $items)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfo');
        $model = new $class($items);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfoItem
     */
    public function getModelMarcofineartsRequestPushOrderOrderInfoItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_OrderInfoItem');
        $model = new $class($item);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_Shipping
     */
    public function getModelMarcofineartsRequestPushOrderShipping()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_Shipping');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_ShippingAddress
     */
    public function getModelMarcofineartsRequestPushOrderShippingAddress(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder_ShippingAddress');
        $model = new $class($address);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder
     */
    public function getModelMarcofineartsRequestPushOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_PushOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderData
     */
    public function getModelMarcofineartsRequestShippingRateOrderData()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderData');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Traversable $items
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderInfo
     */
    public function getModelMarcofineartsRequestShippingRateOrderInfo(Traversable $items)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderInfo');
        $model = new $class($items);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderInfoItem
     */
    public function getModelMarcofineartsRequestShippingRateOrderInfoItem(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_OrderInfoItem');
        $model = new $class($item);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $shippingData
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_Shipping
     */
    public function getModelMarcofineartsRequestShippingRateShipping($shippingData)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_Shipping');
        $model = new $class($shippingData);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Address $address
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_ShippingAddress
     */
    public function getModelMarcofineartsRequestShippingRateShippingAddress(Sao_Shared_Sales_Transfer_Order_Address $address)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate_ShippingAddress');
        $model = new $class($address);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate
     */
    public function getModelMarcofineartsRequestShippingRate()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Request_ShippingRate');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_PushOrder
     */
    public function getModelMarcofineartsResponsePushOrder()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_PushOrder');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $data
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_Rate
     */
    public function getModelMarcofineartsResponseShippingRateRate($data)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_Rate');
        $model = new $class($data);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_RateCollection
     */
    public function getModelMarcofineartsResponseShippingRateRateCollection()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate_RateCollection');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate
     */
    public function getModelMarcofineartsResponseShippingRate()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_ShippingRate');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Provider
     */
    public function getModelProvider()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Provider');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Quote
     */
    public function getModelQuote()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Quote');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Api
     */
    public function getModelSbaApi()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Api');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer
     */
    public function getModelSbaContainerAbstractContainer()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_AbstractContainer');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage
     */
    public function getModelSbaContainerRequestArrayOfPackage($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo
     */
    public function getModelSbaContainerRequestArrayOfPackageInfo($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString
     */
    public function getModelSbaContainerRequestArrayOfString($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1
     */
    public function getModelSbaContainerRequestArrayOfString1($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString1');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2
     */
    public function getModelSbaContainerRequestArrayOfString2($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfString2');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    public function getModelSbaContainerRequestBookingPickUpInfo($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
     */
    public function getModelSbaContainerRequestBookingReceiver($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper
     */
    public function getModelSbaContainerRequestBookingShipper($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment
     */
    public function getModelSbaContainerRequestBookShipment($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates
     */
    public function getModelSbaContainerRequestCalculateRates($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo
     */
    public function getModelSbaContainerRequestCustomerInfo($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage
     */
    public function getModelSbaContainerRequestKage($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Kage');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo
     */
    public function getModelSbaContainerRequestKageInfo($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver
     */
    public function getModelSbaContainerRequestReceiver($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
     */
    public function getModelSbaContainerRequestShipmentInfo($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    public function getModelSbaContainerRequestShipper($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookingResponse
     */
    public function getModelSbaContainerResponseBookingResponse($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookingResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookShipmentResponse
     */
    public function getModelSbaContainerResponseBookShipmentResponse($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_BookShipmentResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse
     */
    public function getModelSbaContainerResponseCalculateRatesResponse($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_CalculateRatesResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails
     */
    public function getModelSbaContainerResponseErrorDetails($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_ErrorDetails');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $obj (optional) default: null
     * @return
     * Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse
     */
    public function getModelSbaContainerResponseRatingResponse($obj = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_RatingResponse');
        $model = new $class($obj);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_SoapResponse
     */
    public function getModelSbaContainerResponseSoapResponse()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Container_Response_SoapResponse');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_DataFactory
     */
    public function getModelSbaDataFactory()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_DataFactory');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_SoapClient
     */
    public function getModelSbaSoapClient()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_SoapClient');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param Sao_Zed_Fulfillment_Component_Model_Sba_Tracking $tracking
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Tracking_Webservice_Handler
     */
    public function getModelSbaTrackingWebserviceHandler(Sao_Zed_Fulfillment_Component_Model_Sba_Tracking $tracking)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Tracking_Webservice_Handler');
        $model = new $class($tracking);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $xml (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Tracking
     */
    public function getModelSbaTracking($xml = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Sba_Tracking');
        $model = new $class($xml);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @param mixed $wsdl (optional) default: null
     * @param mixed $options (optional) default: null
     * @return Sao_Zed_Fulfillment_Component_Model_Soap_Server
     */
    public function getModelSoapServer($wsdl = null, $options = null)
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Soap_Server');
        $model = new $class($wsdl, $options);
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Spooler
     */
    public function getModelSpooler()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Spooler');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Tracking
     */
    public function getModelTracking()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Tracking');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Universal_Api
     */
    public function getModelUniversalApi()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Model_Universal_Api');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Settings
     */
    public function getSettings()
    {
        $class = $this->transformClassName('Sao_Zed_Fulfillment_Component_Settings');
        $model = new $class();
        ProjectA_Zed_Library_Dependency_Injector::injectDependencies($model, $this);
        return $model;
    }


}
