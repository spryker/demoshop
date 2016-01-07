<?php

namespace Pyz\Yves\Customer;

use Pyz\Yves\Customer\Form\RestorePassword;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\ForgotPassword;
use Pyz\Yves\Customer\Form\DeleteCustomer;
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\RegisterCustomer;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Client\Customer\CustomerClient;

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
     * @return RegisterCustomer
     */
    public function createFormRegister()
    {
        return new RegisterCustomer();
    }

    /**
     * @return DeleteCustomer
     */
    public function createFormDelete()
    {
        return new DeleteCustomer();
    }

    /**
     * @return ForgotPassword
     */
    public function createFormForgot()
    {
        return new ForgotPassword();
    }

    /**
     * @return Profile
     */
    public function createFormProfile()
    {
        return new Profile();
    }

    /**
     * @return RestorePassword
     */
    public function createFormRestore()
    {
        return new RestorePassword();
    }

    /**
     * @return CustomerClient
     */
    public function createCustomerClient()
    {
        return $this->getLocator()->customer()->client();
    }

}
