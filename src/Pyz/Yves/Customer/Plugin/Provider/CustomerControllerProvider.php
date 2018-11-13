<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Pyz\Yves\Application\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CustomerControllerProvider extends AbstractYvesControllerProvider
{
    public const ROUTE_LOGIN = 'login';
    public const ROUTE_LOGOUT = 'logout';
    public const ROUTE_REGISTER = 'register';
    public const ROUTE_PASSWORD_FORGOTTEN = 'password/forgotten';
    public const ROUTE_PASSWORD_RESTORE = 'password/restore';
    public const ROUTE_CUSTOMER_OVERVIEW = 'customer/overview';
    public const ROUTE_CUSTOMER_PROFILE = 'customer/profile';
    public const ROUTE_CUSTOMER_ADDRESS = 'customer/address';
    public const ROUTE_CUSTOMER_NEW_ADDRESS = 'customer/address/new';
    public const ROUTE_CUSTOMER_UPDATE_ADDRESS = 'customer/address/update';
    public const ROUTE_CUSTOMER_DELETE_ADDRESS = 'customer/address/delete';
    public const ROUTE_CUSTOMER_REFRESH_ADDRESS = 'customer/address/refresh';
    public const ROUTE_CUSTOMER_ORDER = 'customer/order';
    public const ROUTE_CUSTOMER_OFFER = 'customer/offer';
    public const ROUTE_CUSTOMER_ORDER_DETAILS = 'customer/order/details';
    public const ROUTE_CUSTOMER_OFFER_DETAILS = 'customer/offer/details';
    public const ROUTE_CUSTOMER_NEWSLETTER = 'customer/newsletter';
    public const ROUTE_CUSTOMER_NEWSLETTER_UNSUBSCRIBE = 'customer/newsletter/unsubscribe';
    public const ROUTE_CUSTOMER_DELETE = 'customer/delete';
    public const ROUTE_CUSTOMER_DELETE_CONFIRM = 'customer/delete/confirm';
    public const ROUTE_CUSTOMER_OFFER_CONVERT = 'customer/offer/convert-offer';

    /**
     * @param \Silex\Application $app
     *
     * @return void
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/{login}', self::ROUTE_LOGIN, 'Customer', 'Auth', 'login')
            ->assert('login', $allowedLocalesPattern . 'login|login')
            ->value('login', 'login');
        $this->createController('/{logout}', self::ROUTE_LOGOUT, 'Customer', 'Auth', 'logout')
            ->assert('logout', $allowedLocalesPattern . 'logout|logout')
            ->value('logout', 'logout');
        $this->createController('/{register}', self::ROUTE_REGISTER, 'Customer', 'Register', 'index')
            ->assert('register', $allowedLocalesPattern . 'register|register')
            ->value('register', 'register');

        $this->createController('/{password}/forgotten', self::ROUTE_PASSWORD_FORGOTTEN, 'Customer', 'Password', 'forgottenPassword')
            ->assert('password', $allowedLocalesPattern . 'password|password')
            ->value('password', 'password');
        $this->createController('/{password}/restore', self::ROUTE_PASSWORD_RESTORE, 'Customer', 'Password', 'restorePassword')
            ->assert('password', $allowedLocalesPattern . 'password|password')
            ->value('password', 'password');

        $this->createController('/{customer}/overview', self::ROUTE_CUSTOMER_OVERVIEW, 'Customer', 'Customer', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/profile', self::ROUTE_CUSTOMER_PROFILE, 'Customer', 'Profile', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address', self::ROUTE_CUSTOMER_ADDRESS, 'Customer', 'Address', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address/new', self::ROUTE_CUSTOMER_NEW_ADDRESS, 'Customer', 'Address', 'create')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address/update', self::ROUTE_CUSTOMER_UPDATE_ADDRESS, 'Customer', 'Address', 'update')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address/delete', self::ROUTE_CUSTOMER_DELETE_ADDRESS, 'Customer', 'Address', 'delete')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/address/refresh', self::ROUTE_CUSTOMER_REFRESH_ADDRESS, 'Customer', 'Address', 'refresh')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/order', self::ROUTE_CUSTOMER_ORDER, 'Customer', 'Order', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/offer', self::ROUTE_CUSTOMER_OFFER, 'Customer', 'Offer', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/order/details', self::ROUTE_CUSTOMER_ORDER_DETAILS, 'Customer', 'Order', 'details')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/offer/details', self::ROUTE_CUSTOMER_OFFER_DETAILS, 'Customer', 'Offer', 'details')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/offer/convert-offer', self::ROUTE_CUSTOMER_OFFER_CONVERT, 'Customer', 'Offer', 'convertOffer')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');

        $this->createController('/{customer}/newsletter', self::ROUTE_CUSTOMER_NEWSLETTER, 'Customer', 'Newsletter', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');

        $this->createController('/{customer}/delete', self::ROUTE_CUSTOMER_DELETE, 'Customer', 'Delete', 'index')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');

        $this->createController('/{customer}/delete/confirm', self::ROUTE_CUSTOMER_DELETE_CONFIRM, 'Customer', 'Delete', 'confirm')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
    }
}
