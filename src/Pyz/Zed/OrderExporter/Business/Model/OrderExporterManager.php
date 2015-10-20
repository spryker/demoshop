<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\OrderExporterConfig;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderAddress;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;

/**
 * @link https://confluence.project-a.com/display/PD/Afterbuy+Orders+export
 */
class OrderExporterManager
{
    const AFTERBUY_ACTION = 'Action';
    const AFTERBUY_PARTNER_ID = 'PartnerID';
    const AFTERBUY_PARTNER_PASS = 'PartnerPass';
    const AFTERBUY_USER_ID = 'UserID';

    const SALES_ORDER_ID = 'Kbenutzername';
    const CUSTOMER_EMAIL = 'Kemail';

    const ORDER_ID = 'VID';
    const ORDER_COMMENT = 'Kommentar';
    const IS_DOUBLE_ORDER = 'CheckVID';

    const SEND_FEEDBACK = 'NoFeeback';
    const IS_SHIPPING_BILLING_DIFFERENT = 'Lieferanschrift';

    const STOCK_TYPE = 'Bestandart';

    const SHIPPING_COMPANY_NAME = 'KLFirma';
    const SHIPPING_SALUTATION = 'KLAnrede';
    const SHIPPING_FIRST_NAME = 'KLVorname';
    const SHIPPING_LAST_NAME = 'KLNachname';
    const SHIPPING_STREET = 'KLStrasse';
    const SHIPPING_ZIP_CODE = 'KLPLZ';
    const SHIPPING_CITY = 'KLOrt';
    const SHIPPING_METHOD = '';
    const SHIPPING_PHONE = 'KLTelefon';
    const SHIPPING_COUNTRY_ID = 'KLLand';
    const SHIPPING_COST = 'Versandkosten';
    const SHIPPING_SERVICE = 'Versandart';

    const BILLING_COMPANY_NAME = 'KFirma';
    const BILLING_SALUTATION = 'KAnrede';
    const BILLING_FIRST_NAME = 'KVorname';
    const BILLING_LAST_NAME = 'KNachname';
    const BILLING_STREET = 'KStrasse';
    const BILLING_ZIP_CODE = 'KPLZ';
    const BILLING_CITY = 'KOrt';
    const BILLING_METHOD = '';
    const BILLING_PHONE = 'KTelefon';
    const BILLING_COUNTRY_ID = 'KLand';

    const ITEM_SKU = 'ArtikelStammID_';
    const ITEM_WEIGHT = 'ArtikelGewicht_';
    const ITEM_NAME = 'Artikelname_';
    const ITEM_QUANTITY_ORDERED = 'ArtikelMenge_';
    const ITEM_TAX_PERCENTAGE = 'ArtikelMwSt_';
    const ITEMS_NUMBER = 'PosAnz';
    const ITEM_PRICE = 'ArtikelEPreis_';
    const ITEM_NUMBER = 'Artikelnr_';
    const ITEM_ATTRIBUTE = 'Attribute_';
    const ITEM_LINK = 'ArtikelLink_';

    const PAYMENT_CHARGE = 'ZahlartenAufschlag';
    const PAYMENT_BANK_ACCOUNT_NUMBER = 'Kontonummer';
    const PAYMENT_BANK_ACCOUNT_OWNER = 'Kontoinhaber';
    const PAYMENT_BANK_CODE = 'BLZ';
    const PAYMENT_METHOD = 'Zahlart';
    const PAYMENT_ID = 'ZFunktionsID';
    const PAYMENT_STATUS = 'SetPay';

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
        //@TODO add email error => ds@petsdeli.de
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
        $sendingResult = $this->sendOrderInfoToAfterBuy($postString);
    }

    /**
     * @return array
     */
    protected function configureAfterbuy()
    {
        $postData = array();
        $postData[self::AFTERBUY_PARTNER_ID] = $this->partnerId;
        $postData[self::AFTERBUY_PARTNER_PASS] = $this->partnerPass;
        $postData[self::AFTERBUY_USER_ID] = $this->userId;

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
        $postData[self::CUSTOMER_EMAIL] = $order->getEmail();
        $postData[self::SALES_ORDER_ID] = $order->getIdSalesOrder();

        if (!null == $order->getShipmentMethod()) {
            $postData[self::SHIPPING_METHOD] = $order->getShipmentMethod()->getName();
        }

        $shippingAddress = $order->getShippingAddress();
        $billingAddress = $order->getBillingAddress();
        $postData = $this->addShippingAddressInfo($shippingAddress, $postData);

        if ($billingAddress == $shippingAddress) {
            $postData[self::IS_SHIPPING_BILLING_DIFFERENT] = 0;
        } else {
            $postData[self::IS_SHIPPING_BILLING_DIFFERENT] = 1;
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
            $postData[self::ITEM_SKU . $numberOfItems] = $item->getSku();
            $postData[self::ITEM_NUMBER . $numberOfItems] = $item->getSku();
            $postData[self::ITEM_QUANTITY_ORDERED . $numberOfItems] = $item->getQuantity();
            $postData[self::ITEM_NAME . $numberOfItems] = $item->getName();
            $postData[self::ITEM_TAX_PERCENTAGE . $numberOfItems] = $item->getTaxPercentage();
            $postData = $this->addItemDiscountInfo($item, $numberOfItems, $postData);
            $postData = $this->addProductAttributesInfo($item, $numberOfItems, $postData);
        }
        $postData[self::ITEMS_NUMBER] = count($items);

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
            $postData[self::ITEM_PRICE . $numberOfItems] = 0;
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
        $postData[self::SHIPPING_COMPANY_NAME] = $shippingAddress->getCompany();
        $postData[self::SHIPPING_SALUTATION] = $shippingAddress->getSalutation();
        $postData[self::SHIPPING_FIRST_NAME] = $shippingAddress->getFirstName();
        $postData[self::SHIPPING_LAST_NAME] = $shippingAddress->getLastName();
        $postData[self::SHIPPING_STREET] = $shippingAddress->getAddress1();
        $postData[self::SHIPPING_ZIP_CODE] = $shippingAddress->getZipCode();
        $postData[self::SHIPPING_CITY] = $shippingAddress->getCity();
        $postData[self::SHIPPING_PHONE] = $shippingAddress->getPhone();
        $postData[self::SHIPPING_COUNTRY_ID] = $shippingAddress->getFkCountry();

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
        $postData[self::BILLING_COMPANY_NAME] = $billingAddress->getCompany();
        $postData[self::BILLING_SALUTATION] = $billingAddress->getSalutation();
        $postData[self::BILLING_FIRST_NAME] = $billingAddress->getFirstName();
        $postData[self::BILLING_LAST_NAME] = $billingAddress->getLastName();
        $postData[self::BILLING_STREET] = $billingAddress->getAddress1();
        $postData[self::BILLING_ZIP_CODE] = $billingAddress->getZipCode();
        $postData[self::BILLING_CITY] = $billingAddress->getCity();
        $postData[self::BILLING_PHONE] = $billingAddress->getPhone();
        $postData[self::BILLING_COUNTRY_ID] = $billingAddress->getFkCountry();

        return $postData;
    }

    /**
     * @param array $afterBuyInfo
     * @return string
     */
    protected function buildPostString(array $afterBuyInfo)
    {
        $postString = self::AFTERBUY_ACTION .'=new';

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

    /** @TODO: do we still need to send the email???? */
    protected function sendEmail()
    {

    }

}
