<?php 

namespace Generated\Yves;

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class ZedRequest
{

    /**
     * @var \ProjectA_Shared_Library_Zed_Request
     */
    private $zed = null;

    /**
     * @var ZedRequest
     */
    private static $instance = null;

    /**
     * @return ZedRequest
     */
    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __construct()
    {
        $this->zed = new \ProjectA_Shared_Library_Zed_Request();
    }

    /**
     * @param mixed $url 
     * @param \ProjectA_Shared_Library_Abstract_Object $object 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return ZedRequest
     */
    private function call($url, \ProjectA_Shared_Library_Abstract_Object $object, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->zed->request($url, $object, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartAddItems(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/add-items', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartRemoveItems(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/remove-items', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartChangeQuantity(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/change-quantity', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartMergeGuestCartWithCustomerCart(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/merge-guest-cart-with-customer-cart', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartClearCartStorage(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/clear-cart-storage', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartAddCouponCode(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/add-coupon-code', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartRemoveCouponCode(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/remove-coupon-code', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartRecalculate(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/recalculate', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_Change $cartChange 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartLoadCartByHash(\Sao_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/load-cart-by-hash', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Cart_Transfer_StepStorage $transfer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function cartStoreUserCartStep(\Sao_Shared_Cart_Transfer_StepStorage $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('cart/yves/store-user-cart-step', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function checkoutRecalculate(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('checkout/yves/recalculate', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function checkoutSaveOrder(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('checkout/yves/save-order', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function checkoutUpdatePaymentMethods(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('checkout/yves/update-payment-methods', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $order 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function checkoutGetCheckoutInformation(\Sao_Shared_Sales_Transfer_Order $order, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('checkout/yves/get-checkout-information', $order, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $transferCustomer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerCreateCustomer(\Sao_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/create-customer', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $transferCustomer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerCheckCredentials(\Sao_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/check-credentials', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $transferCustomer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerRestorePasswordStart(\Sao_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/restore-password-start', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $transferCustomer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerRestorePasswordFinish(\Sao_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/restore-password-finish', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $transferRequest 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerGetCustomerOrders(\Sao_Shared_Customer_Transfer_Customer $transferRequest, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/get-customer-orders', $transferRequest, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $transferCustomer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerUpdateCustomer(\Sao_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/update-customer', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $transferCustomer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerChangePassword(\Sao_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/change-password', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Address $transferAddress 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerSetAsShippingAddress(\Sao_Shared_Customer_Transfer_Address $transferAddress, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/set-as-shipping-address', $transferAddress, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Address $transferAddress 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function customerSetAsBillingAddress(\Sao_Shared_Customer_Transfer_Address $transferAddress, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('customer/yves/set-as-billing-address', $transferAddress, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     *
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function mailCartAbandonedUnsubscribe(\Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('mail/yves/cart-abandoned-unsubscribe', $unsubscribeTransfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     *
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function mailCartAbandonedSubscribe(\Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('mail/yves/cart-abandoned-subscribe', $unsubscribeTransfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Newsletter_Transfer_Subscription $subscription 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function newsletterNewsletterSubscribe(\Sao_Shared_Newsletter_Transfer_Subscription $subscription, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('newsletter/yves/newsletter-subscribe', $subscription, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Newsletter_Transfer_Subscription $subscription 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function newsletterNewsletterUnsubscribe(\Sao_Shared_Newsletter_Transfer_Subscription $subscription, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('newsletter/yves/newsletter-unsubscribe', $subscription, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Customer_Transfer_Customer $customer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function newsletterNewsletterGetSubscriptions(\Sao_Shared_Customer_Transfer_Customer $customer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('newsletter/yves/newsletter-get-subscriptions', $customer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function salesUpdateArtworkAvailability(\Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('sales/yves/update-artwork-availability', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function salesGetArtworkAvailabilityInformation(\Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('sales/yves/get-artwork-availability-information', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function salesOriginalNotification(\Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('sales/yves/original-notification', $originalNotification, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function salesCancelOrder(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('sales/yves/cancel-order', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transfer 
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Application_Transfer_Response
     */
    public function salesGetOrderByIncrementId(\Sao_Shared_Sales_Transfer_Order $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        return $this->call('sales/yves/get-order-by-increment-id', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }


}
