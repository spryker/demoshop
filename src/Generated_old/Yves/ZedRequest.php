<?php 

namespace Generated\Yves;

use \ProjectA\Shared\Library\Zed\ZedClient;
use \ProjectA\Shared\Library\Config;
use \ProjectA\Shared\System\SystemConfig;
use \ProjectA\Shared\Yves\YvesConfig;
use \ProjectA\Shared\Library\TransferObject\TransferInterface;
use \ProjectA\Shared\Library\Communication\Response;

/**
 *
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
     * @var Response
     */
    private $lastResponse = null;

    /**
     * @var TransferInterface[]|\Closure[]
     */
    private $metaTransfers = array(
        
    );

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
        $this->zedClient = new ZedClient('http://' . Config::get(SystemConfig::HOST_ZED_API), Config::get(YvesConfig::TRANSFER_USERNAME), Config::get(YvesConfig::TRANSFER_PASSWORD));
    }

    /**
     * @param string $name
     * @param $metaTransfer
     * @return $this
     */
    public function addMetaTransfer($name, $metaTransfer)
    {
        $this->metaTransfers[$name] = $metaTransfer;
        return $this;
    }

    /**
     * @return TransferInterface[]
     */
    private function prepareAndGetMetaTransfers()
    {
        foreach ($this->metaTransfers as $name => $transfer) {
            if (is_object($transfer) && method_exists($transfer, '__invoke')) {
                $this->metaTransfers[$name] = $transfer();
            }
        }
        return $this->metaTransfers;
    }

    /**
     * @param $url
     * @param TransferInterface $object
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return Response
     */
    private function call($url, TransferInterface $object, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = null;
        return $this->zedClient->request($url, $object, $this->prepareAndGetMetaTransfers(), $timeoutInSeconds, $isBackgroundRequest);
    }

    /**
     * @return Response
     * @throws \BadMethodCallException
     */
    public function getLastResponse()
    {
        if ($this->lastResponse === null) {
            throw new \BadMethodCallException('No response available yet');
        }
        return $this->lastResponse;
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartAddCouponCode(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/add-coupon-code', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartAddItems(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/add-items', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartChangeQuantity(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/change-quantity', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartClearCartStorage(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/clear-cart-storage', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartClearCouponCode(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/clear-coupon-code', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartLoadCartByHash(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/load-cart-by-hash', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartMergeGuestCartWithCustomerCart(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/merge-guest-cart-with-customer-cart', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartRecalculate(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/recalculate', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartRemoveCouponCode(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/remove-coupon-code', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\CartChange $cartChange
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function cartRemoveItems(\ProjectA\Shared\Cart\Transfer\CartChange $cartChange, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/remove-items', $cartChange, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cart\Transfer\StepStorage $transfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \StepStorage
     */
    public function cartStoreUserCartStep(\ProjectA\Shared\Cart\Transfer\StepStorage $transfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cart/sdk/store-user-cart-step', $transfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $transferOrder
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function checkoutRecalculate(\ProjectA\Shared\Sales\Transfer\Order $transferOrder, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('checkout/sdk/recalculate', $transferOrder, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $transferOrder
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Sales\Transfer\Order
     */
    public function checkoutSaveOrder(\ProjectA\Shared\Sales\Transfer\Order $transferOrder, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('checkout/sdk/save-order', $transferOrder, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $transferOrder (optional) default: null
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     */
    public function checkoutSaveOrderTest(\ProjectA\Shared\Sales\Transfer\Order $transferOrder = null, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('checkout/sdk/save-order-test', $transferOrder, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Cms\Transfer\Page $cmsPage
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     */
    public function cmsCmsPreviewPage(\ProjectA\Shared\Cms\Transfer\Page $cmsPage, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('cms/sdk/cms-preview-page', $cmsPage, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Address $addressTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ComponentModelResult
     */
    public function customerAddAddress(\ProjectA\Shared\Customer\Transfer\Address $addressTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/add-address', $addressTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function customerChangeEmail(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/change-email', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function customerChangePassword(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/change-password', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function customerCheckCredentials(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/check-credentials', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \CustomerTransfer
     */
    public function customerConfirmRegistration(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/confirm-registration', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function customerCreateCustomer(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/create-customer', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Address $addressTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ComponentModelResult
     */
    public function customerDeleteAddress(\ProjectA\Shared\Customer\Transfer\Address $addressTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/delete-address', $addressTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \PropelCollection
     */
    public function customerGetAddressesByCustomer(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/get-addresses-by-customer', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $salesOrderTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \CustomerOrderTransfer
     */
    public function customerGetOrderDetails(\ProjectA\Shared\Sales\Transfer\Order $salesOrderTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/get-order-details', $salesOrderTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \CustomerOrderCollectionTransfer
     */
    public function customerGetOrders(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/get-orders', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \CustomerOrderCollectionTransfer
     */
    public function customerGetOrdersWithItemsStatusList(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/get-orders-with-items-status-list', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function customerRestorePasswordFinish(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/restore-password-finish', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function customerRestorePasswordStart(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/restore-password-start', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Address $addressTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \CustomerTransfer
     */
    public function customerSetAsBillingAddress(\ProjectA\Shared\Customer\Transfer\Address $addressTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/set-as-billing-address', $addressTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Address $addressTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \CustomerTransfer
     */
    public function customerSetAsShippingAddress(\ProjectA\Shared\Customer\Transfer\Address $addressTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/set-as-shipping-address', $addressTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Address $addressTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ComponentModelResult
     */
    public function customerUpdateAddress(\ProjectA\Shared\Customer\Transfer\Address $addressTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/update-address', $addressTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function customerUpdateCustomer(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/update-customer', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \CustomerTransfer
     */
    public function customerUpdateCustomerTransfer(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('customer/sdk/update-customer-transfer', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $orderTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     */
    public function invoiceGetInvoiceDocument(\ProjectA\Shared\Sales\Transfer\Order $orderTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('invoice/sdk/get-invoice-document', $orderTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Newsletter\Transfer\Subscription $Subscription
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \TransferInterface
     */
    public function newsletterConfirmSubscription(\ProjectA\Shared\Newsletter\Transfer\Subscription $Subscription, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/sdk/confirm-subscription', $Subscription, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Newsletter\Transfer\Subscription $Subscription
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \bool
     */
    public function newsletterGetSubscriptionInformation(\ProjectA\Shared\Newsletter\Transfer\Subscription $Subscription, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/sdk/get-subscription-information', $Subscription, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Customer\Transfer\Customer $customerTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \TransferInterface
     */
    public function newsletterGetSubscriptions(\ProjectA\Shared\Customer\Transfer\Customer $customerTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/sdk/get-subscriptions', $customerTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Newsletter\Transfer\Subscription $subscription
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     */
    public function newsletterSubscribe(\ProjectA\Shared\Newsletter\Transfer\Subscription $subscription, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/sdk/subscribe', $subscription, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Newsletter\Transfer\Subscription $Subscription
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \TransferInterface
     */
    public function newsletterUnsubscribe(\ProjectA\Shared\Newsletter\Transfer\Subscription $Subscription, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('newsletter/sdk/unsubscribe', $Subscription, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $transferOrder
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \ProjectA\Shared\Payment\Transfer\PaymentMethodCollection
     */
    public function paymentGetValidPaymentMethods(\ProjectA\Shared\Sales\Transfer\Order $transferOrder, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('payment/sdk/get-valid-payment-methods', $transferOrder, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\Order $orderTransfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \null
     */
    public function salesGetOrderByIncrementId(\ProjectA\Shared\Sales\Transfer\Order $orderTransfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('sales/sdk/get-order-by-increment-id', $orderTransfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }

    /**
     * @param \ProjectA\Shared\Sales\Transfer\RegularRedirectPaymentCancellation $transfer
     * @param $timeoutInSeconds (optional) default: null
     * @param $isBackgroundRequest (optional) default: false
     * @return \RegularRedirectPaymentCancellationTransfer
     */
    public function salesSetTriggerRegularRedirectPaymentCancellation(\ProjectA\Shared\Sales\Transfer\RegularRedirectPaymentCancellation $transfer, $timeoutInSeconds = null, $isBackgroundRequest = false)
    {
        $this->lastResponse = $this->call('sales/sdk/set-trigger-regular-redirect-payment-cancellation', $transfer, $timeoutInSeconds, $isBackgroundRequest);
        return $this->lastResponse->getTransfer();
    }


}
