<?php

class Sao_Zed_Fulfillment_Component_Model_Sba_DataFactory implements
    ProjectA_Zed_Library_Dependency_Factory_Interface,
    Sao_Shared_Library_Catalog_Interface_ProductAttributeConstant
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /** @var Sao_Zed_Fulfillment_Component_Factory */
    protected $factory;

    /** @var array */
    protected $weightUnitMap = ['lbs' => 'LB', 'kg' => 'KG'];

    /** @var array */
    protected $sizeUnitMap = ['cm' => 'CM', 'in' => 'IN'];

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CalculateRates
     */
    public function getCalculateRatesRequestContainer(Sao_Shared_Sales_Transfer_Order $order, Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $calculateRates = $this->factory->getModelSbaContainerRequestCalculateRates()
            ->setCustomer($this->getCustomerInfoRequestContainer())
            ->setReceiver($this->getReceiverRequestContainer($order))
            ->setShipment($this->getShipmentInfoRequestContainer($item))
            ->setShipper($this->getShipperRequestContainer($item));

        return $calculateRates;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookShipment
     */
    public function getBookShipmentRequestContainer(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $bookShipment = $this->factory->getModelSbaContainerRequestBookShipment()
            ->setCustomer($this->getCustomerInfoRequestContainer())
            ->setShipper($this->getBookingShipperRequestContainer($quote))
            ->setReceiver($this->getBookingReceiverRequestContainer($quote))
            ->setShipment($this->getBookingPickUpInfoRequestContainer($quote));

        return $bookShipment;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingShipper
     */
    protected function getBookingShipperRequestContainer(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $sku = $quote->getItems()->getFirst()->getSku();
        $product = $this->factory->getModelFinder()->getProductBySku($sku);

        $address = $this->factory->getModelSbaContainerRequestArrayOfString2()
            ->addA($product[self::ATTRIBUTE_ORIGIN_ADDRESS1])
            ->addA($product[self::ATTRIBUTE_ORIGIN_ADDRESS2]);

        $bookingShipper = $this->factory->getModelSbaContainerRequestBookingShipper()
            ->setCountry($product[self::ATTRIBUTE_ORIGIN_COUNTRY_CODE])
            ->setState($this->factory->getModelFinder()->getProductState($product)) // optional if country != US/CA
            ->setCity($product[self::ATTRIBUTE_ORIGIN_CITY])
            ->setPostalCode($product[self::ATTRIBUTE_ORIGIN_ZIPCODE])
            ->setAddress($address)
            ->setName(
                $product[self::ATTRIBUTE_ARTIST_FIRST_NAME] . ' ' . $product[self::ATTRIBUTE_ARTIST_LAST_NAME]
            )
            ->setEmail($product[self::ATTRIBUTE_ARTIST_EMAIL])
            ->setPhone($product[self::ATTRIBUTE_ARTIST_PHONE]);

        return $bookingShipper;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingReceiver
     */
    protected function getBookingReceiverRequestContainer(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        $shippingAddress = $quote->getOrder()->getShippingAddress();

        $receiverAddress = $this->factory->getModelSbaContainerRequestArrayOfString2()
            ->addA($shippingAddress->getAddress1())
            ->addA($shippingAddress->getAddress2());

        $bookingReceiver = $this->factory->getModelSbaContainerRequestBookingReceiver()
            ->setCountry($shippingAddress->getCountry()->getIso2Code())
            ->setState($this->factory->getModelFinder()->getStateByAddress($shippingAddress))
            ->setCity($shippingAddress->getCity())
            ->setPostalCode($shippingAddress->getZipCode())
            ->setAddress($receiverAddress)
            ->setName($shippingAddress->getFirstName() . ' ' . $shippingAddress->getLastName())
            ->setEmail($shippingAddress->getEmail())
            ->setPhone($shippingAddress->getCellPhone());

        return $bookingReceiver;
    }

    /**
     * @param Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_BookingPickUpInfo
     */
    protected function getBookingPickUpInfoRequestContainer(Sao_Zed_Fulfillment_Persistence_SaoFulfillmentQuote $quote)
    {
        /** @var $item ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        $item = $quote->getItems()->getFirst();
        $saoItem = $item->getSaoSalesOrderItem();
        $pickup = $saoItem->getShippingPickup();
        $finder = $this->factory->getModelFinder();
        $product = $finder->getProductBySku($item->getSku());

        $pickupInfo = $this->factory->getModelSbaContainerRequestBookingPickUpInfo()
            ->setPackages($this->getPackages($item, $product))
            ->setWeightUnit($this->mapWeightUnit($product[self::ATTRIBUTE_SHIP_WEIGHT_UNIT]))
            ->setDimensionUnit($this->mapSizeUnit($product[self::ATTRIBUTE_SHIP_SIZE_UNIT]))
            //->setDeliveryDate(date('Y-m-d')) // optional
            ->setService('TBD') // using fake until source is specified
            //->setSpecialInstruction('') // optional
            ->setDeclaredValue($item->getGrossPrice() / 100)
            ->setDeclaredValueCurrency($product[self::ATTRIBUTE_CURRENCY])
            ->setInsurance('0.00') // using fake until source is specified
            ->setInsuranceCurrency($product[self::ATTRIBUTE_CURRENCY])
            //->setSpecialServices('') // optional
            //->setAccessorials('') // optional
            ->setReferenceNumber($quote->getOrder()->getIncrementId() . '-' . $quote->getQuoteId());

        if ($pickup) {
            $pickupInfo->setShipDate($pickup->getDate()) // optional
                ->setReadyTime($pickup->getReadyTime()) // optional
                ->setCloseTime($pickup->getCloseTime()); // optional
        }

        return $pickupInfo;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item
     * @param ProjectA_Zed_Catalog_Component_Interface_Product $product
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackage
     */
    protected function getPackages(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $item, ProjectA_Zed_Catalog_Component_Interface_Product $product)
    {
        $package = $this->factory->getModelSbaContainerRequestPackage()
            ->setWeight($product[self::ATTRIBUTE_SHIP_WEIGHT])
            ->setHeight($product[self::ATTRIBUTE_SHIP_HEIGHT])
            ->setLength($product[self::ATTRIBUTE_SHIP_DEPTH])
            ->setWidth($product[self::ATTRIBUTE_SHIP_WIDTH])
            ->setDescription($product[self::ATTRIBUTE_NAME])
            ->setHSCode($product[self::ATTRIBUTE_DUTY_CODE])
            //->setManufacturerCountry('') // optional
            ->setAmount($product[self::ATTRIBUTE_SHIP_WEIGHT])
            ->setAmountUnit($product[self::ATTRIBUTE_SHIP_WEIGHT_UNIT])
            ->setProductValue($item->getGrossPrice() / 100);

        $packages = $this->factory->getModelSbaContainerRequestArrayOfPackage()
            ->addPackage($package);

        return $packages;
    }

    /**
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_CustomerInfo
     */
    protected function getCustomerInfoRequestContainer()
    {
        $sbaConfig = $this->factory->getSettings()->getConfigForProvider('sba');
        $customerInfo = $this->factory->getModelSbaContainerRequestCustomerInfo();
        $customerInfo->setCustomerNumber($sbaConfig->customer_number);
        $customerInfo->setPassword($sbaConfig->password);

        return $customerInfo;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order $order
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Receiver
     */
    protected function getReceiverRequestContainer(Sao_Shared_Sales_Transfer_Order $order)
    {
        $shippingAddress = $order->getShippingAddress();

        $address = $this->factory->getModelSbaContainerRequestArrayOfString2()
            ->addA($shippingAddress->getFirstName() . ' ' . $shippingAddress->getLastName())
            ->addA($shippingAddress->getAddress1());

        $receiver = $this->factory->getModelSbaContainerRequestReceiver()
            ->setAddress($address)
            ->setCity($shippingAddress->getCity())
            ->setCountry($shippingAddress->getIso2Country())
            ->setPostalCode($shippingAddress->getZipCode())
            ->setState($shippingAddress->getRegion());

        return $receiver;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    protected function getShipperRequestContainer(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $salesOrderItem = $this->factory->getModelFinder()->getSalesOrderItemById($item->getIdSalesOrderItem());
        if ($salesOrderItem) {
            $shipper = $this->getShipperRequestContainerFromSaoSalesOrderItem($salesOrderItem);
        } else {
            $shipper = $this->getShipperRequestContainerFromProduct($item);
        }
        return $shipper;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    protected function getShipperRequestContainerFromProduct(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $product = $this->factory->getModelFinder()->getProductBySku($item->getSku());

        $address = $this->factory->getModelSbaContainerRequestArrayOfString2()
            ->addA($product[self::ATTRIBUTE_ORIGIN_ADDRESS1]);

        if ($product[self::ATTRIBUTE_ORIGIN_ADDRESS2]) {
            $address->addA($product[self::ATTRIBUTE_ORIGIN_ADDRESS2]);
        }

        $shipper = $this->factory->getModelSbaContainerRequestShipper()
            ->setAddress($address)
            ->setCity($product[self::ATTRIBUTE_ORIGIN_CITY])
            ->setPostalCode($product[self::ATTRIBUTE_ORIGIN_ZIPCODE])
            ->setCountry($product[self::ATTRIBUTE_ORIGIN_COUNTRY_CODE])
            ->setState($this->factory->getModelFinder()->getProductState($product));

        return $shipper;
    }

    /**
     * @param ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $salesOrderItem
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_Shipper
     */
    protected function getShipperRequestContainerFromSaoSalesOrderItem(ProjectA_Zed_Sales_Persistence_PacSalesOrderItem $salesOrderItem)
    {
        $saoSalesOrderItem = $salesOrderItem->getSaoSalesOrderItem();

        $address = $this->factory->getModelSbaContainerRequestArrayOfString2()
            ->addA($saoSalesOrderItem->getAddress1());

        if ($saoSalesOrderItem->getAddress2()) {
            $address->addA($saoSalesOrderItem->getAddress2());
        }

        $shipper = $this->factory->getModelSbaContainerRequestShipper()
            ->setAddress($address)
            ->setCity($saoSalesOrderItem->getCity())
            ->setPostalCode($saoSalesOrderItem->getZipCode())
            ->setCountry($saoSalesOrderItem->getCountry()->getIso2Code());

        if ($saoSalesOrderItem->getRegion()) {
            $shipper->setState($saoSalesOrderItem->getRegion()->getName());
        } else {
            $shipper->setState('');
        }

        return $shipper;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ShipmentInfo
     */
    protected function getShipmentInfoRequestContainer(Sao_Shared_Sales_Transfer_Order_Item $item)
    {
        $product = $this->factory->getModelFinder()->getProductBySku($item->getSku());

        $shipmentInfo = $this->factory->getModelSbaContainerRequestShipmentInfo()
            //->setServiceType('') // optional
            ->setPackages($this->getPackageInfoArrayRequestContainer($item, $product))
            ->setDimensionUnit($this->mapSizeUnit($product[self::ATTRIBUTE_SHIP_SIZE_UNIT]))
            ->setWeightUnit($this->mapWeightUnit($product[self::ATTRIBUTE_SHIP_WEIGHT_UNIT]))
            ->setDeclaredValue($item->getGrossPrice() / 100)
            ->setDeclaredValueCurrency($product[self::ATTRIBUTE_CURRENCY])
            ->setInsurance('0.00') // TODO specify and set real value
            ->setInsuranceCurrency($product[self::ATTRIBUTE_CURRENCY]);
            //->setSpecialServices('') // optional
            //->setAccessorials('') // optional

        return $shipmentInfo;
    }

    /**
     * @param Traversable $items
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo
     */
    protected function getPackageInfoArrayRequestContainerOld(Traversable $items, ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection)
    {
        $arrayOfPackageInfo = $this->factory->getModelSbaContainerRequestArrayOfPackageInfo();
        foreach ($items as $item) {
            $packageInfo = $this->getPackageInfoRequestContainer($item, $productCollection->getProduct($item->getSku()));
            $arrayOfPackageInfo->addPackage($packageInfo);
        }
        return $arrayOfPackageInfo;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @param ProjectA_Zed_Catalog_Component_Interface_Product $product
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_ArrayOfPackageInfo
     */
    protected function getPackageInfoArrayRequestContainer(Sao_Shared_Sales_Transfer_Order_Item $item, ProjectA_Zed_Catalog_Component_Interface_Product $product)
    {
        $packageInfo = $this->getPackageInfoRequestContainer($item, $product);

        $arrayOfPackageInfo = $this->factory->getModelSbaContainerRequestArrayOfPackageInfo();
        $arrayOfPackageInfo->addPackage($packageInfo);

        return $arrayOfPackageInfo;
    }

    /**
     * @param Sao_Shared_Sales_Transfer_Order_Item $item
     * @param ProjectA_Zed_Catalog_Component_Interface_Product $productWithAttributes
     * @return Sao_Zed_Fulfillment_Component_Model_Sba_Container_Request_KageInfo
     */
    protected function getPackageInfoRequestContainer(Sao_Shared_Sales_Transfer_Order_Item $item, ProjectA_Zed_Catalog_Component_Interface_Product $product)
    {
        $packageInfo = $this->factory->getModelSbaContainerRequestPackageInfo()
            ->setAmount($this->assureNotNull('1'))
            ->setAmountUnit($this->assureNotNull('PCS'))
            ->setHeight($this->assureNotNull($product[self::ATTRIBUTE_SHIP_HEIGHT]))
            ->setWeight($this->assureNotNull($product[self::ATTRIBUTE_SHIP_WEIGHT]))
            ->setWidth($this->assureNotNull($product[self::ATTRIBUTE_SHIP_WIDTH]))
            ->setLength($this->assureNotNull($product[self::ATTRIBUTE_SHIP_DEPTH]))
            ->setHSCode($this->assureNotNull($product[self::ATTRIBUTE_DUTY_CODE]))
            //->setManufacturerCountry() // optional
            //->setPackageType() // optional
            ->setProductValue($this->assureNotNull($item->getGrossPrice() / 100));

        return $packageInfo;
    }

    /**
     * @param ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection
     * @return mixed
     */
    protected function getUniqueState(ProjectA_Zed_Catalog_Component_Interface_ProductCollection $productCollection)
    {
        $attributeNames = array();
        $attributeNames[] = self::ATTRIBUTE_ORIGIN_STATE;
        $attributeNames[] = self::ATTRIBUTE_ORIGIN_PROVINCE;
        $attributeNames[] = self::ATTRIBUTE_ORIGIN_REGION;

        foreach ($attributeNames as $attributeName) {
            $value = $this->getUniqueValue($productCollection, $attributeName);
            if ($value) {
                return $value;
            }
        }
    }

    /**
     * @param Traversable $items
     * @return float
     */
    protected function getDeclaredItemValueSum(Traversable $items)
    {
        $sum = 0;
        /** @var $item Sao_Shared_Sales_Transfer_Order_Item */
        foreach ($items as $item) {
            $sum += ($item->getGrossPrice() * $item->getQuantity());
        }
        return ($sum / 100);
    }

    /**
     * @param $value
     * @return string
     */
    protected function assureNotNull($value)
    {
        return is_null($value) ? '' : $value;
    }

    /**
     * @param $weightUnit
     * @return string
     */
    protected function mapWeightUnit($weightUnit)
    {
        return $this->mapUnit($weightUnit, $this->weightUnitMap, 'LB');
    }

    /**
     * @param $sizeUnit
     * @return string
     */
    protected function mapSizeUnit($sizeUnit)
    {
        return $this->mapUnit($sizeUnit, $this->sizeUnitMap, 'IN');
    }

    /**
     * @param string $unit
     * @param array $unitMap
     * @param string $default
     * @return string
     */
    protected function mapUnit($unit, array $unitMap, $default)
    {
        if (!array_key_exists($unit, $unitMap)) {
            return $default;
        }
        return $unitMap[$unit];
    }

}
