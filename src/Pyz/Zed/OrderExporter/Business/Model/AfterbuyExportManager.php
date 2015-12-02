<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Orm\Zed\Product\Persistence\SpyProduct;
use Orm\Zed\Sales\Persistence\SpySalesDiscountCode;
use Pyz\Zed\OrderExporter\AfterbuyConstants;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToAdyenFacade;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToProductFacade;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToSalesFacade;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToUrlFacade;
use Pyz\Zed\OrderExporter\OrderExporterConfig;
use Orm\Zed\Sales\Persistence\SpySalesOrderAddress;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesDiscount;

/**
 * @link https://confluence.project-a.com/display/PD/Afterbuy+Orders+export
 */
class AfterbuyExportManager
{
    const AFTERBUY_NEW_ACTION = 'new';
    const KEY_COUPON_NAME = 'name';
    const KEY_ATTRIBUTE_WEIGHT = 'weight';
    const KEY_COUPON_AMOUNT = 'amount';
    const VALUE_COUPON_NAME = 'RABATT';
    const CONVERSION_MG_TO_KG = 1000;
    const CONVERSION_CENT_TO_EUROS = 100;
    const CONVERSION_PERCENTAGE = 100;

    /** @var string */
    protected $afterbuyUrl;
    /**
     * @var AbstractAfterbuyConnector
     */
    protected $afterbuyConnector;
    /**
     * @var OrderExporterConfig
     */
    protected $orderExporterConfig;
    /**
     * @var OrderExporterToSalesFacade
     */
    protected $salesFacade;
    /**
     * @var OrderExporterToUrlFacade
     */
    protected $urlFacade;
    /**
     * @var OrderExporterToProductFacade
     */
    protected $productFacade;
    /**
     * @var OrderExporterToAdyenFacade
     */
    protected $adyenFacade;

    /**
     * @param OrderExporterConfig $orderExporterConfig
     * @param AbstractAfterbuyConnector $connector
     * @param OrderExporterToSalesFacade $salesFacade
     * @param OrderExporterToUrlFacade $urlFacade
     * @param OrderExporterToProductFacade $productFacade
     * @param OrderExporterToAdyenFacade $adyenFacade
     */
    public function __construct(
        OrderExporterConfig $orderExporterConfig,
        AbstractAfterbuyConnector $connector,
        OrderExporterToSalesFacade $salesFacade,
        OrderExporterToUrlFacade $urlFacade,
        OrderExporterToProductFacade $productFacade,
        OrderExporterToAdyenFacade $adyenFacade
    ) {
        $this->salesFacade = $salesFacade;
        $this->afterbuyConnector = $connector;
        $this->orderExporterConfig = $orderExporterConfig;
        $this->urlFacade = $urlFacade;
        $this->productFacade = $productFacade;
        $this->adyenFacade = $adyenFacade;
    }

    /**
     * @param SpySalesOrderItem[] $orderItems
     * @return int|null
     * @throws \Exception
     */
    public function getOrderIdFromOrderItems(array $orderItems)
    {
        $idOrder = null;
        foreach ($orderItems as $orderItem) {
            if (!$idOrder) {
                $idOrder = $orderItem->getFkSalesOrder();
            } else {
                if ($idOrder != $orderItem->getFkSalesOrder()) {
                    throw new \Exception ('Items should come from the same order');
                }
            }
        }

        return $idOrder;
    }

    /**
     * @param array $orderItems
     * @param SpySalesOrder $order
     */
    public function exportOrderItems(array $orderItems, SpySalesOrder $order)
    {
        $configuration = $this->configureAfterbuy();
        $afterbuyInfo = [];
        $afterbuyInfo = $this->getOrderInfo($order, $afterbuyInfo);
        $afterbuyInfo = $this->addItemsInfo($orderItems, $afterbuyInfo);
        $afterbuyInfo = $this->encodeValueUTF8($afterbuyInfo);

        $results = array_merge($configuration, $afterbuyInfo);
        $postString = $this->buildPostString($results);

        $this->sendOrderInfoToAfterbuy($postString, $orderItems, $afterbuyInfo[AfterbuyConstants::SALES_ORDER_ID]);
    }

    /**
     * @return array
     */
    protected function configureAfterbuy()
    {
        $postData = array();
        $postData[AfterbuyConstants::AFTERBUY_ACTION] = self::AFTERBUY_NEW_ACTION;
        $postData[AfterbuyConstants::AFTERBUY_PARTNER_ID] = $this->orderExporterConfig->getAfterbuyPartnerId();
        $postData[AfterbuyConstants::AFTERBUY_PARTNER_PASS] = $this->orderExporterConfig->getAfterbuyPartnerPass();
        $postData[AfterbuyConstants::AFTERBUY_USER_ID] = $this->orderExporterConfig->getAfterbuyUserId();;

        return $postData;
    }

    /**
     * @param SpySalesOrder $order
     * @param array $postData
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function getOrderInfo(SpySalesOrder $order, array $postData)
    {
        $shippingAddress = $order->getShippingAddress();
        $billingAddress = $order->getBillingAddress();

        if (null == $order->getEmail()) {
            $email = $billingAddress->getEmail();
        } else {
            $email = $order->getEmail();
        }

        $postData[AfterbuyConstants::CUSTOMER_EMAIL] = $email;
        $postData[AfterbuyConstants::SALES_ORDER_ID] = $order->getIdSalesOrder();

        $postData = $this->addShippingAddressInfo($shippingAddress, $postData);

        if ($billingAddress == $shippingAddress) {
            $postData[AfterbuyConstants::IS_SHIPPING_BILLING_DIFFERENT] = 0;
        } else {
            $postData[AfterbuyConstants::IS_SHIPPING_BILLING_DIFFERENT] = 1;
            $postData = $this->addBillingAddressInfo($billingAddress, $postData);
        }

        $postData = $this->addPaymentInfo($postData);
        $postData = $this->addShippingMethodInfo($order, $postData);

        return $postData;
    }

    /**
     * @param array $postData
     * @return array
     */
    protected function addPaymentInfo(array $postData)
    {
        $idSalesOrder = $postData[AfterbuyConstants::SALES_ORDER_ID];
        $payment = $this->adyenFacade->getPaymentBySalesOrderId($idSalesOrder);

        $setPay = true;

        switch ($payment->getPaymentMethod()) {
            case 'adyen.payment.method.creditcard.cse':
                $paymentMethodName = AfterbuyConstants::PAYMENT_METHOD_CREDITCARD;
                break;
            case 'adyen.payment.method.paypal':
                $paymentMethodName = AfterbuyConstants::PAYMENT_METHOD_PAYPAL;
                break;
            case 'adyen.payment.method.sofortueberweisung':
                $paymentMethodName = AfterbuyConstants::PAYMENT_METHOD_SOFORTUEBERWEISUNG;
                break;
            case 'adyen.payment.method.sepa.directdebit':
                $paymentMethodName = AfterbuyConstants::PAYMENT_METHOD_SEPA;
                $postData[AfterbuyConstants::PAYMENT_BANK_ACCOUNT_NUMBER] = $payment->getPavPaymentAdyenDetail()->getBankAccountNumber();
                $postData[AfterbuyConstants::PAYMENT_BANK_ACCOUNT_OWNER] = $payment->getPavPaymentAdyenDetail()->getOwnerName();
                $postData[AfterbuyConstants::PAYMENT_BANK_CODE] = $payment->getPavPaymentAdyenDetail()->getBankLocationId();
                $setPay = false;
                break;
            case 'adyen.payment.method.german.bank.transfer':
                $paymentMethodName = AfterbuyConstants::PAYMENT_METHOD_PREPAYMENT;
                break;
            case 'adyen.payment.method.openinvoice.klarna':
                $paymentMethodName = AfterbuyConstants::PAYMENT_METHOD_INVOICE;
                $setPay = false;
                break;
            default:
                $paymentMethodName = $payment->getPaymentMethod();
                break;
        }

        $postData[AfterbuyConstants::PAYMENT_METHOD] = $paymentMethodName;
        $postData[AfterbuyConstants::PAYMENT_STATUS] = $setPay;

        return $postData;
    }

    /**
     * @param SpySalesOrderItem[] $items
     * @param array $postData
     * @return array
     */
    protected function addItemsInfo(array $items, array $postData)
    {
        $numberOfItems = 0;
        $itemIds = [];
        foreach ($items as $item) {
            $numberOfItems ++;
            $itemIds[$item->getIdSalesOrderItem()] = $item->getIdSalesOrderItem();
            $postData[AfterbuyConstants::ITEM_SKU . $numberOfItems] = $item->getSku();
            $postData[AfterbuyConstants::ITEM_NUMBER . $numberOfItems] = $item->getSku();
            $postData[AfterbuyConstants::ITEM_QUANTITY_ORDERED . $numberOfItems] = $item->getQuantity();
            $postData[AfterbuyConstants::ITEM_NAME . $numberOfItems] = $item->getName();
            $postData[AfterbuyConstants::ITEM_PRICE . $numberOfItems] = $this->convertPriceInCentToEuro($item->getGrossPrice());
            $postData[AfterbuyConstants::ITEM_TAX_PERCENTAGE . $numberOfItems] = $this->convertDecimalDotToDecimalComma($item->getTaxPercentage());
            $postData = $this->addProductAttributesInfo($item, $numberOfItems, $postData);
        }

        $coupon = $this->createSubCoupon($itemIds, $postData[AfterbuyConstants::SALES_ORDER_ID]);
        $postData = $this->addCouponInfo($postData, $coupon, $numberOfItems);

        $postData[AfterbuyConstants::ITEMS_NUMBER] = count($items) + count($coupon);

        return $postData;
    }

    /**
     * @param array $postData
     * @param array $coupons
     * @param int $nbItem
     * @return array
     */
    protected function addCouponInfo(array $postData, array $coupons, $nbItem)
    {
        foreach ($coupons as $coupon) {
            $nbItem ++;
            $postData[AfterbuyConstants::ITEM_NUMBER . $nbItem] = $nbItem;
            $postData[AfterbuyConstants::ITEM_QUANTITY_ORDERED . $nbItem] = 1;
            $postData[AfterbuyConstants::ITEM_NAME . $nbItem] = $coupon[self::KEY_COUPON_NAME];
            $postData[AfterbuyConstants::ITEM_PRICE . $nbItem] = (-1) * $this->convertPriceInCentToEuro($coupon[self::KEY_COUPON_AMOUNT]);
            $postData[AfterbuyConstants::ITEM_TAX_PERCENTAGE . $nbItem] = 19;
        }

        return $postData;
    }

    /**
     * @param array $itemIds
     * @param int $idSalesOrder
     * @return array
     */
    protected function createSubCoupon(array $itemIds, $idSalesOrder)
    {
        $discountsToExport = [];
        $salesDiscounts = $this->salesFacade->getSalesDiscountsByOrderId($idSalesOrder);
        foreach ($salesDiscounts as $salesDiscount) {
            if (isset($itemIds[$salesDiscount->getFkSalesOrderItem()])) {
                $discountsToExport[] = $salesDiscount;
            }
        }
        return $this->aggregateCouponsIntoSubCoupons($discountsToExport);
    }

    /**
     * @param SpySalesDiscount[] $discountsToExport
     * @return array
     */
    protected function aggregateCouponsIntoSubCoupons(array $discountsToExport)
    {
        $coupons = [];
        foreach ($discountsToExport as $discount) {
            if (!isset($coupons[$discount->getDisplayName()])) {
                $coupons[$discount->getDisplayName()][self::KEY_COUPON_AMOUNT] = $discount->getAmount();
                $couponName = self::VALUE_COUPON_NAME . '_' . $discount->getDisplayName() . '_' . $discount->getFkSalesOrder();
                $coupons[$discount->getDisplayName()][self::KEY_COUPON_NAME] = $this->addDiscountCodeToCouponName($discount->getIdSalesDiscount(), $couponName);
            } else {
                $coupons[$discount->getDisplayName()][self::KEY_COUPON_AMOUNT] += $discount->getAmount();
            }
        }

        return $coupons;
    }

    /**
     * @param int $salesDiscountId
     * @param string $couponName
     * @return string
     */
    protected function addDiscountCodeToCouponName($salesDiscountId, $couponName)
    {
        if ($this->discountHasCode($salesDiscountId)) {
            $couponCode = $this->getSalesDiscountCodeByDiscountId($salesDiscountId)->getCode();
            $couponName .= '|' . $couponCode;
        }

        return $couponName;
    }

    /**
     * @param int $salesDiscountId
     * @return bool
     */
    protected function discountHasCode($salesDiscountId)
    {
        return (bool) (!$this->salesFacade->getSalesDiscountCodeBySalesDiscountId($salesDiscountId) == null);
    }

    /**
     * @param $salesDiscountId
     * @return SpySalesDiscountCode
     */
    protected function getSalesDiscountCodeByDiscountId($salesDiscountId)
    {
        return $this->salesFacade->getSalesDiscountCodeBySalesDiscountId($salesDiscountId);
    }
    
    /**
     * @param SpySalesOrderItem $item
     * @param $numberOfItems
     * @param array $postData
     * @return array
     */
    protected function addProductAttributesInfo(SpySalesOrderItem $item, $numberOfItems, array $postData)
    {
        $itemConfigurations = $this->salesFacade->getSalesOrderItemConfigurationByItemId($item->getIdSalesOrderItem());
        $attributes = [];
        foreach ($itemConfigurations as $itemConfiguration) {
            $attributes[] = $itemConfiguration->getGroupKeyLocalized() . ':' . $itemConfiguration->getGroupValueLocalized();
        }
        $postData[AfterbuyConstants::ITEM_ATTRIBUTE . $numberOfItems] = implode('|', $attributes);

        $abstractProductId = $this->productFacade->getAbstractProductIdByConcreteSku($item->getSku());
        $concreteProduct = $this->productFacade->getConcreteProductByConcreteSku($item->getSku());
        $productUrl = $this->urlFacade->getUrlByAbstractProductId($abstractProductId);
        $postData[AfterbuyConstants::ITEM_LINK . $numberOfItems] = $this->orderExporterConfig->getYvesHost() . $productUrl->getUrl();
        $postData[AfterbuyConstants::ITEM_WEIGHT . $numberOfItems] = $this->getProductWeight($concreteProduct);

        return $postData;
    }

    /**
     * @param SpyProduct $product
     * @return float
     */
    protected function getProductWeight(SpyProduct $product)
    {
        $productAttributes = (array) json_decode($product->getAttributes());
        if (isset($productAttributes[self::KEY_ATTRIBUTE_WEIGHT])) {
            return $productAttributes[self::KEY_ATTRIBUTE_WEIGHT] / self::CONVERSION_MG_TO_KG;
        }

        return 0.00;
    }

    /**
     * @param SpySalesOrder $order
     * @param array $postData
     * @return array
     */
    protected function addShippingMethodInfo(SpySalesOrder $order, array $postData)
    {
        $shipmentMethod = $order->getShipmentMethod();
        $postData[AfterbuyConstants::SHIPPING_SERVICE] = $shipmentMethod->getShipmentCarrier()->getName();
        $postData[AfterbuyConstants::SHIPPING_COST] = $this->convertPriceInCentToEuro($shipmentMethod->getPrice());

        return $postData;
    }

    /**
     * @param SpySalesOrderAddress $shippingAddress
     * @param array $postData
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function addShippingAddressInfo(SpySalesOrderAddress $shippingAddress, array $postData)
    {
        $postData[AfterbuyConstants::SHIPPING_COMPANY_NAME] = $shippingAddress->getCompany();
        $postData[AfterbuyConstants::SHIPPING_SALUTATION] = $shippingAddress->getSalutation();
        $postData[AfterbuyConstants::SHIPPING_FIRST_NAME] = $shippingAddress->getFirstName();
        $postData[AfterbuyConstants::SHIPPING_LAST_NAME] = $shippingAddress->getLastName();
        $postData[AfterbuyConstants::SHIPPING_STREET] = $shippingAddress->getAddress1();
        $postData[AfterbuyConstants::SHIPPING_ZIP_CODE] = $shippingAddress->getZipCode();
        $postData[AfterbuyConstants::SHIPPING_CITY] = $shippingAddress->getCity();
        $postData[AfterbuyConstants::SHIPPING_PHONE] = $shippingAddress->getPhone();
        $postData[AfterbuyConstants::SHIPPING_COUNTRY_ID] = $shippingAddress->getCountry()->getIso2Code();

        return $postData;
    }

    /**
     * @param SpySalesOrderAddress $billingAddress
     * @param array $postData
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function addBillingAddressInfo(SpySalesOrderAddress $billingAddress, array $postData)
    {
        $postData[AfterbuyConstants::BILLING_COMPANY_NAME] = $billingAddress->getCompany();
        $postData[AfterbuyConstants::BILLING_SALUTATION] = $billingAddress->getSalutation();
        $postData[AfterbuyConstants::BILLING_FIRST_NAME] = $billingAddress->getFirstName();
        $postData[AfterbuyConstants::BILLING_LAST_NAME] = $billingAddress->getLastName();
        $postData[AfterbuyConstants::BILLING_STREET] = $billingAddress->getAddress1();
        $postData[AfterbuyConstants::BILLING_ZIP_CODE] = $billingAddress->getZipCode();
        $postData[AfterbuyConstants::BILLING_CITY] = $billingAddress->getCity();
        $postData[AfterbuyConstants::BILLING_PHONE] = $billingAddress->getPhone();
        $postData[AfterbuyConstants::BILLING_COUNTRY_ID] = $billingAddress->getCountry()->getIso2Code();

        return $postData;
    }

    /**
     * @param array $afterbuyInfo
     * @return string
     */
    protected function buildPostString(array $afterbuyInfo)
    {
        return http_build_query($afterbuyInfo);
    }

    /**
     * @param $postVariables
     * @param array $orderItems
     * @param int $idOrder
     */
    protected function sendOrderInfoToAfterbuy($postVariables, array $orderItems, $idOrder)
    {
        $this->afterbuyConnector->sendToAfterbuy($postVariables, $orderItems, $idOrder);
    }

    /**
     * @param int $price
     * @return float
     */
    protected function convertPriceInCentToEuro($price)
    {
        $euroPrice = $price / self::CONVERSION_CENT_TO_EUROS;

        return $this->convertDecimalDotToDecimalComma($euroPrice);
    }

    /**
     * @param float $number
     * @return string
     */
    protected function convertDecimalDotToDecimalComma($number)
    {
        return number_format($number, 2, ',', '.');
    }

    /**
     * @param array $postData
     * @return array
     */
    protected function encodeValueUTF8(array $postData)
    {
        foreach ($postData as $key => $value) {
            if (is_string($value)) {
                $postData[$key] = utf8_decode($value);
            }
        }
        
        return $postData;
    }

}
