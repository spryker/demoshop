<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\OrderExporterConfig;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderAddress;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;

class OrderExporterManager
{
    const AFTERBUY_ACTION = 'Action';
    const AFTERBUY_PARTNER_ID = 'PartnerID';
    const AFTERBUY_PARTNER_PASS = 'PartnerPass';
    const AFTERBUY_USER_ID = 'UserID';

    const CUSTOMER_NAME = 'Kbenutzername';
    const CUSTOMER_EMAIL = 'Kemail';
    const ORDER_ID = 'VID';

    const IS_SHIPPING_BILLING_DIFFERENT = 'Lieferanschrift';

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




    /** @param OrderExporterConfig $orderExporterConfig */
    protected $orderExporterConfig;

    /** @var string */
    protected $userId;

    /** @var int */
    protected $partnerId;

    /** @var string */
    protected $partnerPass;

    /** @var string */
    protected $afterbuyUrl;

    /**
     * @param OrderExporterConfig $orderExporterConfig
     */
    public function __construct(OrderExporterConfig $orderExporterConfig, AfterbuyConnectorInterface $connector)
    {
        //@TODO add email error => ds@petsdeli.de
        $this->orderExporterConfig = $orderExporterConfig;
        $this->userId = $this->orderExporterConfig->getAfterbuyUserId();
        $this->partnerId = $this->orderExporterConfig->getAfterbuyPartnerId();
        $this->partnerPass = $this->orderExporterConfig->getAfterbuyPartnerPass();
        $this->afterbuyUrl = $this->orderExporterConfig->getAfterbuyUrl();
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

    public function exportOrder(SpySalesOrder $order)
    {
        $afterBuyInfo = $this->configureAfterbuy();
        $afterBuyInfo = $this->getOrderInfo($order, $afterBuyInfo);
        $postString = $this->buildPostString($afterBuyInfo);
        $this->sendOrderInfoToAfterBuy($postString);
    }

    /**
     * @param SpySalesOrder $order
     * @param array $postData
     * @return array
     * @throws \Propel\Runtime\Exception\PropelException
     */
    protected function getOrderInfo(SpySalesOrder $order, array $postData)
    {
//        $carrierModel;

        $items = $order->getItems()->getData();
        // @TODO add Adyen info about $payment
        // @TODO  $paymentTransactionId = $payment->getTransactionId();
        //$payerId;
        //historyItem
        // @TODO  $paymentMethod = $payment->getPaymentMethod();
        $customer = $order->getCustomer();
        $postData[self::CUSTOMER_EMAIL] = $order->getEmail(); // @TODO email from shipping/ billing for non Customer?
        $postData[self::CUSTOMER_NAME] = $order->getIdSalesOrder(); //@TODO in old code id but should be name...

        $postData[self::SHIPPING_METHOD] = $order->getShipmentMethod()->getName();
        $shippingAddress = $order->getShippingAddress();
        $billingAddress = $order->getBillingAddress();
        $postData = $this->addShippingAddressInfo($shippingAddress, $postData);

        if ($billingAddress == $shippingAddress) {
            $postData[self::IS_SHIPPING_BILLING_DIFFERENT] = 0;
        } else {
            $postData[self::IS_SHIPPING_BILLING_DIFFERENT] = 1;
            $postData = $this->addBillingAddressInfo($billingAddress, $postData);
        }

        $postData = $this->addItemsInfo($items, $postData);
        $postData[self::ITEMS_NUMBER] = count($items);

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
            $itemId = $item->getIdSalesOrderItem();
            $postData[self::ITEM_SKU . $numberOfItems] = $item->getSku();
            $postData[self::ITEM_NUMBER . $numberOfItems] = $item->getSku(); //@TODO id or sku???
//            $itemUrl
//            $itemWeight
            $postData[self::ITEM_QUANTITY_ORDERED . $numberOfItems] = $item->getQuantity();
            $postData[self::ITEM_NAME . $numberOfItems] = $item->getName();
            $itemGrossPrice = $item->getGrossPrice();
            $postData[self::ITEM_TAX_PERCENTAGE . $numberOfItems] = $item->getTaxPercentage(); //@TODO is always defined?
            $discounts = $item->getDiscounts()->getData();

            //@TODO ArtikelGewicht: product weight
//            $attributes = $searchProductBySKU -> {attributes} //@TODO Product characteristics ? leave empty

            $postData[self::ITEM_PRICE . $numberOfItems] = 0; // @TODO get Total discount
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
        die('do not send for test');
        $connexion = curl_init();
        curl_setopt($connexion, CURLOPT_URL, "$this->afterbuyUrl");
        curl_setopt($connexion, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connexion, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($connexion, CURLOPT_POST, 1);
        curl_setopt($connexion, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connexion, CURLOPT_POSTFIELDS, $postVariables);

        $resultConnexion = curl_exec($connexion);
        curl_close($connexion);

        return $resultConnexion;
    }

    /** @TODO: do we still need to send the email???? */
    protected function sendEmail()
    {

    }

}
