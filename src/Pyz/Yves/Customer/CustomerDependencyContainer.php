<?php

namespace Pyz\Yves\Customer;

use SprykerFeature\Yves\Customer\CustomerDependencyContainer as CoreCustomerDependencyContainer;
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\Register;
use Pyz\Yves\Customer\Form\Delete;
use Pyz\Yves\Customer\Form\Forgot;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\Restore;

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
     * @return Register
     */
    public function createFormRegister()
    {
        return $this->factory->createFormRegister();
    }

    /**
     * @return Delete
     */
    public function createFormDelete()
    {
        return $this->factory->createFormDelete();
    }

    /**
     * @return Forgot
     */
    public function createFormForgot()
    {
        return $this->factory->createFormForgot();
    }

    /**
     * @return Profile
     */
    public function createFormProfile()
    {
        return $this->factory->createFormProfile();
    }

    /**
     * @return Restore
     */
    public function createFormRestore()
    {
        return $this->factory->createFormRestore();
    }
}
