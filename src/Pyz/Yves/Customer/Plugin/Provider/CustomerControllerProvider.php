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
    const ROUTE_LOGIN = 'login';
    const ROUTE_LOGOUT = 'logout';
    const ROUTE_REGISTER = 'register';
    const ROUTE_PASSWORD_FORGOTTEN = 'password/forgotten';
    const ROUTE_PASSWORD_RESTORE = 'password/restore';
    const ROUTE_CUSTOMER_OVERVIEW = 'customer/overview';
    const ROUTE_CUSTOMER_PROFILE = 'customer/profile';
    const ROUTE_CUSTOMER_ADDRESS = 'customer/address';
    const ROUTE_CUSTOMER_ADMIN = 'customer/admin';
    const ROUTE_CUSTOMER_ADMIN_ADD = 'customer/admin/add';
    const ROUTE_CUSTOMER_ADMIN_DELETE = 'customer/admin/delete';
    const ROUTE_CUSTOMER_NEW_ADDRESS = 'customer/address/new';
    const ROUTE_CUSTOMER_UPDATE_ADDRESS = 'customer/address/update';
    const ROUTE_CUSTOMER_DELETE_ADDRESS = 'customer/address/delete';
    const ROUTE_CUSTOMER_REFRESH_ADDRESS = 'customer/address/refresh';
    const ROUTE_CUSTOMER_ORDER = 'customer/order';
    const ROUTE_CUSTOMER_ORDER_DETAILS = 'customer/order/details';
    const ROUTE_CUSTOMER_NEWSLETTER = 'customer/newsletter';
    const ROUTE_CUSTOMER_NEWSLETTER_UNSUBSCRIBE = 'customer/newsletter/unsubscribe';
    const ROUTE_CUSTOMER_DELETE = 'customer/delete';
    const ROUTE_CUSTOMER_DELETE_CONFIRM = 'customer/delete/confirm';

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


        $this->createController('/{customer}/admin', self::ROUTE_CUSTOMER_ADMIN, 'Customer', 'Customer', 'admin')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/admin/add', self::ROUTE_CUSTOMER_ADMIN_ADD, 'Customer', 'Customer', 'addCustomer')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer')
            ->value('customer', 'customer');
        $this->createController('/{customer}/admin/delete', self::ROUTE_CUSTOMER_ADMIN_DELETE, 'Customer', 'Customer', 'removeCustomer')
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
        $this->createController('/{customer}/order/details', self::ROUTE_CUSTOMER_ORDER_DETAILS, 'Customer', 'Order', 'details')
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
