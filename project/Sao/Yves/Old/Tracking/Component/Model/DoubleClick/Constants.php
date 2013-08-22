<?php
/**
 * @author Marco Roßdeutscher <marco.rossdeutscher@project-a.com>
 * @version $Id$
 */
interface Sao_Yves_Tracking_Component_Model_DoubleClick_Constants
{
    const DC_ORDER          = 'order';
    const DC_ORDER_TOTALS   = 'order_totals';
    const DC_ORDER_PRODUCTS = 'order_products';
    const DC_PAGE_TYPE      = 'pageType'; //Page Name
    const DC_ADD_TRANS      = 'addTrans';

    const DC_ORDER_ORDER_ID    = 'utmtid';  // order ID - required
    const DC_ORDER_STORE_NAME  = 'utmtst';  // affiliation or store name
    const DC_ORDER_GRAND_TOTAL = 'utmtto';  // grand total - required
    const DC_ORDER_TAX         = 'utmttx';  // tax
    const DC_ORDER_SHIPPING    = 'utmtsp';  // shipping
    const DC_ORDER_CITY        = 'utmtci';  // city
    const DC_ORDER_STATE       = 'utmtrg';  // state or province
    const DC_ORDER_COUNTRY     = 'utmtco';  // country

    const DC_ORDER_ITEM_ORDER_ID                       = 'utmtid';  // order ID - necessary to associate item with transaction
    const DC_ORDER_ITEM_SKU                            = 'utmipc';  // SKU/code - required
    const DC_ORDER_ITEM_PRODUCT_NAME                   = 'utmipn';  // product name
    const DC_ORDER_ITEM_SUBTOTAL_WITHOUT_ITEM_EXPENSES = 'utmipr';  // subtotal without expenses, including options - required
    const DC_ORDER_ITEM_QUANTITY                       = 'utmiqt';  // quantity - required
    const DC_ORDER_ITEM_PRODUCT_CATEGORY               = 'utmiva';  // product variation

    const DC_ORDER_PAYMENT_METHOD = "order_payment_method"; //Payment method
    const DC_ORDER_PROMO_CODE = "order_promo_codes";
    const DC_ORDER_CURRENCY = "order_currency";

    const DC_TOTALS_AMOUNT_WITH_TAXES_WITH_SHIPPING       = "order_amount_ati_with_sf";  //Order Amount All Tax Included with Shipping Fee
    const DC_TOTALS_AMOUNT_WITH_TAXES_WITHOUT_SHIPPING    = "order_amount_ati_without_sf";  //Order Amount All Tax Included without Shipping Fee
    const DC_TOTALS_AMOUNT_WITHOUT_TAXES_WITH_SHIPPING    = "order_amount_ati_without_sf";  //Order Amount All Tax Included without Shipping Fee
    const DC_TOTALS_AMOUNT_WITHOUT_TAXES_WITHOUT_SHIPPING = "order_amount_ati_without_sf";  //Order Amount All Tax Included without Shipping Fee
    const DC_TOTALS_DISCOUNT_WITH_TAXES                   = "order_discount_ati";  //Order Discount All Tax Included, or "" if no Discount

    const DC_TOTALS_FREIGHT_COSTS                         = 'order_freight_costs';
    const DC_TOTALS_CUSTOMS_AND_DUTIES                    = 'order_customs_and_duties';
    const DC_TOTALS_STATE_TAX                             = "order_state_tax";

    const PAGE_TYPE_CART = 'cart';
    const PAGE_TYPE_CHECKOUT_SHIPPING_BILLING = 'checkoutShippingBilling';
    const PAGE_TYPE_CHECKOUT_CONFIRMATION = 'checkoutConfirmation';
}
