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
        return $this->factory->create("Form\\Address");
    }

    /**
     * @return Register
     */
    public function createFormRegister()
    {
        return $this->factory->create("Form\\Register");
    }

    /**
     * @return Delete
     */
    public function createFormDelete()
    {
        return $this->factory->create("Form\\Delete");
    }

    /**
     * @return Forgot
     */
    public function createFormForgot()
    {
        return $this->factory->create("Form\\Forgot");
    }

    /**
     * @return Profile
     */
    public function createFormProfile()
    {
        return $this->factory->create("Form\\Profile");
    }

    /**
     * @return Restore
     */
    public function createFormRestore()
    {
        return $this->factory->create("Form\\Restore");
    }
}
