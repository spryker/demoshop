<?php

namespace Pyz\Yves\Customer;

use SprykerFeature\Yves\Customer\CustomerDependencyContainer as CoreCustomerDependencyContainer;

class CustomerDependencyContainer extends CoreCustomerDependencyContainer
{
    public function createFormAddress()
    {
        return $this->factory->create("Form\\Address");
    }

    public function createFormRegister()
    {
        return $this->factory->create("Form\\Register");
    }

    public function createFormDelete()
    {
        return $this->factory->create("Form\\Delete");
    }

    public function createFormForgot()
    {
        return $this->factory->create("Form\\Forgot");
    }

    public function createFormProfile()
    {
        return $this->factory->create("Form\\Profile");
    }

    public function createFormRestore()
    {
        return $this->factory->create("Form\\Restore");
    }
}
