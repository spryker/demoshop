<?php

namespace Pyz\Yves\Customer;

use Pyz\Yves\Customer\Form\Login;
use Pyz\Yves\Customer\Form\RestorePassword;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\ForgottenPassword;
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\Register;
use Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationSuccessHandler;
use Spryker\Yves\Kernel\AbstractFactory;

class CustomerFactory extends AbstractFactory
{

    /**
     * @return Address
     */
    public function createFormAddress()
    {
        return new Address();
    }

    /**
     * @return Register
     */
    public function createFormRegister()
    {
        return new Register();
    }

    /**
     * @return Login
     */
    public function createFormLogin()
    {
        return new Login();
    }

    /**
     * @return ForgottenPassword
     */
    public function createFormForgot()
    {
        return new ForgottenPassword();
    }

    /**
     * @return Profile
     */
    public function createFormProfile()
    {
        return new Profile();
    }

    /**
     * @param string $restoreKey
     *
     * @return RestorePassword
     */
    public function createFormRestore($restoreKey)
    {
        return new RestorePassword($restoreKey);
    }

    /**
     * @return CustomerAuthenticationSuccessHandler
     */
    public function createCustomerAuthenticationSuccessHandler()
    {
        return new CustomerAuthenticationSuccessHandler();
    }

}
