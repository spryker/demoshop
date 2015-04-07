<?php

namespace Pyz\Yves\Customer;

use SprykerFeature\Yves\Customer\CustomerDependencyContainer as CoreCustomerDependencyContainer;
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\RegisterCustomer;
use Pyz\Yves\Customer\Form\DeleteCustomer;
use Pyz\Yves\Customer\Form\ForgotPassword;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\RestorePassword;

class CustomerDependencyContainer extends CoreCustomerDependencyContainer
{
    /**
     * @return Address
     */
    public function createFormAddress()
    {
        return $this->factory->createFormAddress();
    }

    /**
     * @return RegisterCustomer
     */
    public function createFormRegister()
    {
        return $this->factory->createFormRegisterCustomer();
    }

    /**
     * @return DeleteCustomer
     */
    public function createFormDelete()
    {
        return $this->factory->createFormDeleteCustomer();
    }

    /**
     * @return ForgotPassword
     */
    public function createFormForgot()
    {
        return $this->factory->createFormForgotPassword();
    }

    /**
     * @return Profile
     */
    public function createFormProfile()
    {
        return $this->factory->createFormProfile();
    }

    /**
     * @return RestorePassword
     */
    public function createFormRestore()
    {
        return $this->factory->createFormRestorePassword();
    }
}
