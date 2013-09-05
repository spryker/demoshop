<?php 

namespace Generated\Yves;

use \ProjectA\Shared\Library\Zed\ZedClient;
use \ProjectA\Shared\Library\TransferObject\TransferInterface;
use \Generated\Shared\Library\TransferLoader;

/**
 * !!! Auto-generated class. Do not touch !!!
 */
class ZedRequest
{

    /**
     * @var ZedClient
     */
    private $zedClient = null;

    /**
     * @var ZedRequest
     */
    private static $instance = null;

    /**
     * @var \ProjectA_Shared_Library_Transfer_Response
     */
    private $lastResponse = null;

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
        $configTransfer = \ProjectA_Shared_Library_Config::get('transfer');
        $configHost = \ProjectA_Shared_Library_Config::get('host');
        $this->zedClient = new ZedClient('http://' . $configHost->zed_local, $configTransfer->get('username'), $configTransfer->get('password'));
    }

    /**
     * @param mixed $url
     * @param TransferInterface $object
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $timeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Library_Transfer_Response
     */
    private function call($url, TransferInterface $object, $connectionTimeout = null, $timeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = null;
        return $this->zedClient->request($url, $object, $timeout, $isBackgroundRequest);
    }

    /**
     * @return \ProjectA_Shared_Library_Transfer_Response_Message_Collection
     */
    public function getMessagesFromLastCall()
    {
        if ($this->lastResponse === null) {
            return TransferLoader::getLibraryResponseMessageCollection();
        }
        return $this->lastResponse->getMessages();
    }

    /**
     * @return bool
     */
    public function wasLastCallSuccessful()
    {
        if ($this->lastResponse === null) {
            return false;
        }
        return $this->lastResponse->isSuccess();
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartAddItems(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/add-items', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartRemoveItems(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/remove-items', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartChangeQuantity(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/change-quantity', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartMergeGuestCartWithCustomerCart(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/merge-guest-cart-with-customer-cart', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartClearCartStorage(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/clear-cart-storage', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartAddCouponCode(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/add-coupon-code', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartRemoveCouponCode(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/remove-coupon-code', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartRecalculate(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/recalculate', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_Change $cartChange
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order
     */
    public function cartLoadCartByHash(\ProjectA_Shared_Cart_Transfer_Change $cartChange, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/load-cart-by-hash', $cartChange, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Cart_Transfer_StepStorage $transfer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Cart_Transfer_StepStorage
     */
    public function cartStoreUserCartStep(\ProjectA_Shared_Cart_Transfer_StepStorage $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/yves/store-user-cart-step', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Cart_Transfer_StepStorage($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order
     */
    public function checkoutRecalculate(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('checkout/yves/recalculate', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order
     */
    public function checkoutSaveOrder(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('checkout/yves/save-order', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Payment_Transfer_Methods_Response
     */
    public function checkoutUpdatePaymentMethods(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('checkout/yves/update-payment-methods', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Payment_Transfer_Methods_Response($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $order
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order
     */
    public function checkoutGetCheckoutInformation(\Sao_Shared_Sales_Transfer_Order $order, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('checkout/yves/get-checkout-information', $order, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $transferCustomer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerCreateCustomer(\ProjectA_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/create-customer', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $transferCustomer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerCheckCredentials(\ProjectA_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/check-credentials', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $transferCustomer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerRestorePasswordStart(\ProjectA_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/restore-password-start', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $transferCustomer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerRestorePasswordFinish(\ProjectA_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/restore-password-finish', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $transferRequest
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Sales_Transfer_Order_Collection
     */
    public function customerGetCustomerOrders(\ProjectA_Shared_Customer_Transfer_Customer $transferRequest, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/get-customer-orders', $transferRequest, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Sales_Transfer_Order_Collection($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $transferCustomer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerUpdateCustomer(\ProjectA_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/update-customer', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $transferCustomer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerChangePassword(\ProjectA_Shared_Customer_Transfer_Customer $transferCustomer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/change-password', $transferCustomer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Address $transferAddress
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerSetAsShippingAddress(\ProjectA_Shared_Customer_Transfer_Address $transferAddress, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/set-as-shipping-address', $transferAddress, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Address $transferAddress
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function customerSetAsBillingAddress(\ProjectA_Shared_Customer_Transfer_Address $transferAddress, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/yves/set-as-billing-address', $transferAddress, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe
     */
    public function mailCartAbandonedUnsubscribe(\Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('mail/yves/cart-abandoned-unsubscribe', $unsubscribeTransfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe
     */
    public function mailCartAbandonedSubscribe(\Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe $unsubscribeTransfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('mail/yves/cart-abandoned-subscribe', $unsubscribeTransfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Mail_Transfer_Cart_Abandoned_Unsubscribe($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Newsletter_Transfer_Subscription $subscription
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Newsletter_Transfer_Subscription
     */
    public function newsletterNewsletterSubscribe(\ProjectA_Shared_Newsletter_Transfer_Subscription $subscription, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/yves/newsletter-subscribe', $subscription, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Newsletter_Transfer_Subscription($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Newsletter_Transfer_Subscription $subscription
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Newsletter_Transfer_Subscription
     */
    public function newsletterNewsletterUnsubscribe(\ProjectA_Shared_Newsletter_Transfer_Subscription $subscription, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/yves/newsletter-unsubscribe', $subscription, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Newsletter_Transfer_Subscription($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Customer_Transfer_Customer $customer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \ProjectA_Shared_Customer_Transfer_Customer
     */
    public function newsletterNewsletterGetSubscriptions(\ProjectA_Shared_Customer_Transfer_Customer $customer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/yves/newsletter-get-subscriptions', $customer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \ProjectA_Shared_Customer_Transfer_Customer($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Artist_Transfer_ArtworkAvailability
     */
    public function salesUpdateArtworkAvailability(\Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('sales/yves/update-artwork-availability', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Artist_Transfer_ArtworkAvailability($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public function salesGetArtworkAvailabilityInformation(\Sao_Shared_Artist_Transfer_ArtworkAvailability $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('sales/yves/get-artwork-availability-information', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Sales_Transfer_OriginalNotification($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_OriginalNotification
     */
    public function salesOriginalNotification(\Sao_Shared_Sales_Transfer_OriginalNotification $originalNotification, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('sales/yves/original-notification', $originalNotification, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Sales_Transfer_OriginalNotification($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \Sao_Shared_Sales_Transfer_Order $transferOrder
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     * @return \Sao_Shared_Sales_Transfer_Order
     */
    public function salesCancelOrder(\Sao_Shared_Sales_Transfer_Order $transferOrder, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('sales/yves/cancel-order', $transferOrder, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
        $transferObject = new \Sao_Shared_Sales_Transfer_Order($this->lastResponse->getTransfer());
        return $transferObject;
    }

    /**
     * @param \ProjectA_Shared_Sales_Transfer_Order $transfer
     * @param mixed $connectionTimeout (optional) default: null
     * @param mixed $requestTimeout (optional) default: null
     * @param bool $isBackgroundRequest (optional) default: false
     */
    public function salesGetOrderByIncrementId(\ProjectA_Shared_Sales_Transfer_Order $transfer, $connectionTimeout = null, $requestTimeout = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('sales/yves/get-order-by-increment-id', $transfer, $connectionTimeout, $requestTimeout, $isBackgroundRequest);
    }


}
