<?php

namespace Pyz\Zed\OrderExporter;

interface AfterbuyConstants
{
    // Afterbuy Config
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

    // Shipping
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


    // Billing
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

    // Items
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

    // Payment
    const PAYMENT_CHARGE = 'ZahlartenAufschlag';
    const PAYMENT_BANK_ACCOUNT_NUMBER = 'Kontonummer';
    const PAYMENT_BANK_ACCOUNT_OWNER = 'Kontoinhaber';
    const PAYMENT_BANK_CODE = 'BLZ';
    const PAYMENT_METHOD = 'Zahlart';
    const PAYMENT_ID = 'ZFunktionsID';
    const PAYMENT_STATUS = 'SetPay';
}
