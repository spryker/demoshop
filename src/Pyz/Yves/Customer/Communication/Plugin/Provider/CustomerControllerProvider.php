<?php

namespace Pyz\Yves\Customer\Communication\Plugin\Provider;

use Pyz\Yves\Application\Communication\Plugin\Provider\AbstractYvesControllerProvider;
use Silex\Application;

class CustomerControllerProvider extends AbstractYvesControllerProvider
{

    const ROUTE_LOGIN = 'login';
    const ROUTE_HOME = 'home';
    const ROUTE_LOGIN_CHECK = 'login_check';
    const ROUTE_LOGOUT = 'logout';
    const ROUTE_REGISTER = 'register';
    const ROUTE_CONFIRM_REGISTRATION = 'confirm_registration';
    const ROUTE_PASSWORD_FORGOT = 'forgot';
    const ROUTE_PASSWORD_RESTORE = 'restore';
    const ROUTE_DELETE = 'delete';
    const ROUTE_CUSTOMER_PROFILE = 'profile';
    const ROUTE_CUSTOMER_ADDRESS = 'address';
    const ROUTE_CUSTOMER_NEW_ADDRESS = 'new_address';
    const ROUTE_CUSTOMER_DELETE_ADDRESS = 'delete_address';

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $allowedLocalesPattern = $this->getAllowedLocalesPattern();

        $this->createController('/login', self::ROUTE_LOGIN, 'Customer', 'AjaxSecurity', 'login');
        $this->createController('/login_check', self::ROUTE_LOGIN_CHECK, 'Customer', 'Security', 'loginCheck');
        $this->createController('/register', self::ROUTE_REGISTER, 'Customer', 'AjaxSecurity', 'register');
        $this->createController('/{register}/confirm', self::ROUTE_CONFIRM_REGISTRATION, 'Customer', 'Security', 'confirmRegistration')
            ->assert('register', $allowedLocalesPattern . 'register|register')
            ->value('register', 'register');
        $this->createController('/logout', self::ROUTE_LOGOUT, 'Customer', 'Security', 'logout');

        $this->createController('/{password}/forgot', self::ROUTE_PASSWORD_FORGOT, 'Customer', 'Customer', 'forgotPassword')
            ->assert('password', $allowedLocalesPattern . 'password|password');
        $this->createController('/{password}/restore', self::ROUTE_PASSWORD_RESTORE, 'Customer', 'Customer', 'restorePassword')
            ->assert('password', $allowedLocalesPattern . 'password|password');
        $this->createController('/{customer}/delete', self::ROUTE_DELETE, 'Customer', 'Customer', 'delete')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer');
        $this->createController('/{customer}/profile', self::ROUTE_CUSTOMER_PROFILE, 'Customer', 'Customer', 'profile')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer');

        $this->createController('/{customer}/address', self::ROUTE_CUSTOMER_ADDRESS, 'Customer', 'Address', 'update')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer');
        $this->createController('/{customer}/address/new', self::ROUTE_CUSTOMER_NEW_ADDRESS, 'Customer', 'Address', 'create')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer');
        $this->createController('/{customer}/address/delete', self::ROUTE_CUSTOMER_DELETE_ADDRESS, 'Customer', 'Address', 'delete')
            ->assert('customer', $allowedLocalesPattern . 'customer|customer');
    }

}
