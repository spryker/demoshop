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

    protected function defineControllers(Application $app)
    {
        $this->createController("/login", self::ROUTE_LOGIN, "Customer", "Customer", "login");
        $this->createController("/login_check", self::ROUTE_LOGIN_CHECK, "Customer", "Customer", "loginCheck");
        $this->createController("/logout", self::ROUTE_LOGOUT, "Customer", "Customer", "logout");
        $this->createController("/register", self::ROUTE_REGISTER, "Customer", "Customer", "register");
        $this->createController("/register/confirm", self::ROUTE_CONFIRM_REGISTRATION, "Customer", "Customer", "confirmRegistration");
        $this->createController("/password/forgot", self::ROUTE_PASSWORD_FORGOT, "Customer", "Customer", "forgotPassword");
        $this->createController("/password/restore", self::ROUTE_PASSWORD_RESTORE, "Customer", "Customer", "restorePassword");
        $this->createController("/customer/delete", self::ROUTE_DELETE, "Customer", "Customer", "delete");
        $this->createController("/customer/profile", self::ROUTE_CUSTOMER_PROFILE, "Customer", "Customer", "profile");
    }
}
