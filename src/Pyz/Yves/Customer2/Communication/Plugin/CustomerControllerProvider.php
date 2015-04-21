<?php

namespace Pyz\Yves\Customer2\Communication\Plugin;

use SprykerEngine\Yves\Application\Communication\Plugin\YvesControllerProvider;

use Silex\Application;

class CustomerControllerProvider extends YvesControllerProvider
{
    const ROUTE_CUSTOMER_LOGIN = 'login';
    const ROUTE_CUSTOMER_REGISTER = 'register';
    const ROUTE_CUSTOMER_FORGOT_PASSWORD = 'forgot/password';
    const ROUTE_CUSTOMER_RESTORE_PASSWORD = 'restore/password';
    const ROUTE_CUSTOMER_PASSWORD_MAIL_SENT = 'restore/password/mail/sent';
    const ROUTE_CUSTOMER_PASSWORD_CHANGED = 'password/changed';
    const ROUTE_CUSTOMER_CONFIRM_REGISTRATION = 'confirm/registration';
    const ROUTE_CUSTOMER_REGISTERED = 'checkout';
    const ROUTE_CUSTOMER_REGISTRATION_CONFIRMED = 'home';

    const ROUTE_CUSTOMER_ACCOUNT = 'account';
    const ROUTE_CUSTOMER_PROFILE = 'profile';
    const ROUTE_CUSTOMER_ORDERS = 'orders';
    const ROUTE_CUSTOMER_ADDRESSES = 'addresses';
    const ROUTE_CUSTOMER_CHANGE_EMAIL = 'change/email';
    const ROUTE_CUSTOMER_ADDRESS_DELETE = 'address/delete';
    const ROUTE_CUSTOMER_ORDERS_GET_INVOICE = 'orders/invoice';
    const ROUTE_CUSTOMER_SET_DEFAULT_SHIPPING_ADDRESS = 'address/set/default/shipping';
    const ROUTE_CUSTOMER_SET_DEFAULT_BILLING_ADDRESS = 'address/set/default/billing';
    const ROUTE_CUSTOMER_ORDER_DETAILS = 'customer/order-details';

    const ROUTE_CUSTOMER_WISHLIST = 'wishlist';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createController("/login", self::ROUTE_CUSTOMER_LOGIN, "Customer2", "Customer2", "login");
        $this->createController('/register', self::ROUTE_CUSTOMER_REGISTER, 'Customer2', 'Customer2', 'register');

        /**
        $this->createController('/forgot-password', self::ROUTE_CUSTOMER_FORGOT_PASSWORD, 'Customer', 'Security', 'forgotPassword');
        $this->createController('/restore-password', self::ROUTE_CUSTOMER_RESTORE_PASSWORD, 'Customer', 'Security', 'restorePassword');
        $this->createController('/restore-password-mail-sent', self::ROUTE_CUSTOMER_PASSWORD_MAIL_SENT, 'Customer', 'Security', 'passwordMailSent');
        $this->createController('/password-changed', self::ROUTE_CUSTOMER_PASSWORD_CHANGED, 'Customer', 'Security', 'passwordChanged');
        $this->createGetController('/confirm-registration', self::ROUTE_CUSTOMER_CONFIRM_REGISTRATION, 'Customer', 'Security', 'confirmRegistration');
        $this->createController('/customer', self::ROUTE_CUSTOMER_ACCOUNT, 'Customer', 'Customer', 'profile');
        $this->createController('/customer/profile', self::ROUTE_CUSTOMER_PROFILE, 'Customer', 'Customer', 'profile');
        $this->createController('/customer/orders', self::ROUTE_CUSTOMER_ORDERS, 'Customer', 'Customer', 'orders');
        $this->createController('/customer/addresses', self::ROUTE_CUSTOMER_ADDRESSES, 'Customer', 'Customer', 'addresses');
        $this->createController('/customer/change-mail', self::ROUTE_CUSTOMER_CHANGE_EMAIL, 'Customer', 'Customer', 'changeMail');
        $this->createController('/customer/delete-address', self::ROUTE_CUSTOMER_ADDRESS_DELETE, 'Customer', 'Customer', 'deleteAddress');
        $this->createController('/customer/set-default-shipping', self::ROUTE_CUSTOMER_SET_DEFAULT_SHIPPING_ADDRESS, 'Customer', 'Customer', 'setDefaultShipping');
        $this->createController('/customer/set-default-billing', self::ROUTE_CUSTOMER_SET_DEFAULT_BILLING_ADDRESS, 'Customer', 'Customer', 'setDefaultBilling');
        $this->createController('/customer/download-invoice', self::ROUTE_CUSTOMER_ORDERS_GET_INVOICE, 'Customer', 'Customer', 'downloadInvoice');
        $this->createController('/customer/order-details', self::ROUTE_CUSTOMER_ORDER_DETAILS, 'Customer', 'Customer', 'orderDetails');

        $this->createController('/customer/wishlist', self::ROUTE_CUSTOMER_WISHLIST, 'Customer', 'Customer', 'wishlist');
         **/
    }
}
