<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\AfterbuyConstants;
use Pyz\Zed\OrderExporter\OrderExporterConfig;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderAddress;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;

/**
 * @link https://confluence.project-a.com/display/PD/Afterbuy+Orders+export
 */
class OrderExporterManager
{
    /** @var string */
    protected $userId;

    /** @var int */
    protected $partnerId;

    /** @var string */
    protected $partnerPass;

    /** @var string */
    protected $afterbuyUrl;
    /**
     * @var AfterbuyConnectorInterface
     */
    protected $afterbuyConnector;

    /**
     * @param OrderExporterConfig $orderExporterConfig
     * @param AfterbuyConnectorInterface $connector
     */
    public function __construct(OrderExporterConfig $orderExporterConfig, AfterbuyConnectorInterface $connector)
    {
        $this->userId = $orderExporterConfig->getAfterbuyUserId();
        $this->partnerId = $orderExporterConfig->getAfterbuyPartnerId();
        $this->partnerPass = $orderExporterConfig->getAfterbuyPartnerPass();
        $this->afterbuyConnector = $connector;
    }

    /**
     * @param SpySalesOrder $order
     */
    public function exportOrder(SpySalesOrder $order)
    {
        $afterBuyInfo = $this->configureAfterbuy();
        $afterBuyInfo = $this->getOrderInfo($order, $afterBuyInfo);
        $postString = $this->buildPostString($afterBuyInfo);
        $this->sendOrderInfoToAfterBuy($postString);
    }

    /**
     * @return array
     */
    protected function configureAfterbuy()
    {
        $postData = array();
        $postData[AfterbuyConstants::AFTERBUY_PARTNER_ID] = $this->partnerId;
        $postData[AfterbuyConstants::AFTERBUY_PARTNER_PASS] = $this->partnerPass;
        $postData[AfterbuyConstants::AFTERBUY_USER_ID] = $this->userId;

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
        $items = $order->getItems()->getData();
        $postData[AfterbuyConstants::CUSTOMER_EMAIL] = $order->getEmail();
        $postData[AfterbuyConstants::SALES_ORDER_ID] = $order->getIdSalesOrder();

        if (!null == $order->getShipmentMethod()) {
            $postData[AfterbuyConstants::SHIPPING_METHOD] = $order->getShipmentMethod()->getName();
        }

        $shippingAddress = $order->getShippingAddress();
        $billingAddress = $order->getBillingAddress();
        $postData = $this->addShippingAddressInfo($shippingAddress, $postData);

        if ($billingAddress == $shippingAddress) {
            $postData[AfterbuyConstants::IS_SHIPPING_BILLING_DIFFERENT] = 0;
        } else {
            $postData[AfterbuyConstants::IS_SHIPPING_BILLING_DIFFERENT] = 1;
            $postData = $this->addBillingAddressInfo($billingAddress, $postData);
        }

        $postData = $this->addPaymentInfo($postData);
        $postData = $this->addItemsInfo($items, $postData);

        return $postData;
    }

    /**
     * @param array $postData
     * @return array
     */
    protected function addPaymentInfo(array $postData)
    {
        // @TODO Add Payment information!

        return $postData;
    }

    /**
     * @param array $items
     * @param array $postData
     * @return array
     */
    protected function addItemsInfo(array $items, array $postData)
    {
        $numberOfItems = 0;
        /** @var SpySalesOrderItem $item */
        foreach ($items as $item) {
            $numberOfItems ++;
            $postData[AfterbuyConstants::ITEM_SKU . $numberOfItems] = $item->getSku();
            $postData[AfterbuyConstants::ITEM_NUMBER . $numberOfItems] = $item->getSku();
            $postData[AfterbuyConstants::ITEM_QUANTITY_ORDERED . $numberOfItems] = $item->getQuantity();
            $postData[AfterbuyConstants::ITEM_NAME . $numberOfItems] = $item->getName();
            $postData[AfterbuyConstants::ITEM_TAX_PERCENTAGE . $numberOfItems] = $item->getTaxPercentage();
            $postData = $this->addItemDiscountInfo($item, $numberOfItems, $postData);
            $postData = $this->addProductAttributesInfo($item, $numberOfItems, $postData);
        }
        $postData[AfterbuyConstants::ITEMS_NUMBER] = count($items);

        return $postData;
    }

    /**
     * @param SpySalesOrderItem $item
     * @param $numberOfItems
     * @param array $postData
     * @return array
     */
    protected function addProductAttributesInfo(SpySalesOrderItem $item, $numberOfItems, array $postData)
    {
        // @TODO add product attributes (e.g: "Kartoffel, Size...") (const ITEM_ATTRIBUTE) as String "label:value|label2:value2|label3:value3"
        // @TODO add product URL (const ITEM_LINK)
        // @TODO add product weight (const ITEM_WEIGHT)
        return $postData;
    }

    /**
     * @param SpySalesOrderItem $item
     * @param $numberOfItems
     * @param array $postData
     * @return array
     */
    protected function addItemDiscountInfo(SpySalesOrderItem $item, $numberOfItems, array $postData)
    {
        if (!null == $item->getDiscounts()->getData()) {
            // @TODO calculate Discounts information (const PAYMENT_CHARGE or ITEM_PRICE)
        } else {
            $postData[AfterbuyConstants::ITEM_PRICE . $numberOfItems] = 0;
        }

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
        $postData[AfterbuyConstants::SHIPPING_COUNTRY_ID] = $shippingAddress->getFkCountry();

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
        $postData[AfterbuyConstants::BILLING_COUNTRY_ID] = $billingAddress->getFkCountry();

        return $postData;
    }

    /**
     * @param array $afterBuyInfo
     * @return string
     */
    protected function buildPostString(array $afterBuyInfo)
    {
        $postString = AfterbuyConstants::AFTERBUY_ACTION .'=new';

        foreach ($afterBuyInfo as $afterbuyField => $value) {
            $postString .= '&' . $afterbuyField . '=' . $value;
        }

        return $postString;
    }

    /**
     * @param string $postVariables
     * @return mixed
     */
    protected function sendOrderInfoToAfterBuy($postVariables)
    {
        $sendingResult = $this->afterbuyConnector->sendToAfterBuy($postVariables);

        return $sendingResult;
    }

}
