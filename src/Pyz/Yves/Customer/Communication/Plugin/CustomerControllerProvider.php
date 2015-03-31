<?php

namespace Pyz\Yves\Customer\Communication\Plugin;

use SprykerCore\Yves\Application\Communication\Plugin\YvesControllerProvider;
use Silex\Application;

class CustomerControllerProvider extends YvesControllerProvider
{
    const ROUTE_LOGIN = "login";
    const ROUTE_LOGIN_CHECK = "login_check";
    const ROUTE_LOGOUT = "logout";
    const ROUTE_REGISTER = "register";
    const ROUTE_CONFIRM_REGISTRATION = "confirm_registration";
    const ROUTE_PASSWORD_FORGOT = "forgot";
    const ROUTE_PASSWORD_RESTORE = "restore";
    const ROUTE_DELETE = "delete";
    const ROUTE_CUSTOMER_PROFILE = "profile";
    const ROUTE_CUSTOMER_ADDRESS = "address";
    const ROUTE_CUSTOMER_NEW_ADDRESS = "new_address";
    const ROUTE_CUSTOMER_DELETE_ADDRESS = "delete_address";

    /**
     * @param Application $app
     */
    protected function defineControllers(Application $app)
    {
        $this->createController("/login", self::ROUTE_LOGIN, "Customer", "Security", "login");
        $this->createController("/login_check", self::ROUTE_LOGIN_CHECK, "Customer", "Security", "loginCheck");
        $this->createController("/register", self::ROUTE_REGISTER, "Customer", "Security", "register");
        $this->createController("/register/confirm", self::ROUTE_CONFIRM_REGISTRATION, "Customer", "Security", "confirmRegistration");
        $this->createController("/logout", self::ROUTE_LOGOUT, "Customer", "Security", "logout");

        $this->createController("/password/forgot", self::ROUTE_PASSWORD_FORGOT, "Customer", "Customer", "forgotPassword");
        $this->createController("/password/restore", self::ROUTE_PASSWORD_RESTORE, "Customer", "Customer", "restorePassword");
        $this->createController("/customer/delete", self::ROUTE_DELETE, "Customer", "Customer", "delete");
        $this->createController("/customer/profile", self::ROUTE_CUSTOMER_PROFILE, "Customer", "Customer", "profile");

        $this->createController("/customer/address", self::ROUTE_CUSTOMER_ADDRESS, "Customer", "Address", "address");
        $this->createController("/customer/address/new", self::ROUTE_CUSTOMER_NEW_ADDRESS, "Customer", "Address", "new");
        $this->createController("/customer/address/delete", self::ROUTE_CUSTOMER_DELETE_ADDRESS, "Customer", "Address", "delete");
    }
}
