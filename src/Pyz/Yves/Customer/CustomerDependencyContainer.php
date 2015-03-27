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
}
