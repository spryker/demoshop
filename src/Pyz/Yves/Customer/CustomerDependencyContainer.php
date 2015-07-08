<?php

namespace Pyz\Yves\Customer;

use SprykerFeature\Yves\Customer\CustomerDependencyContainer as SprykerFeatureCustomerDependencyContainer;
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\RegisterCustomer;
use Pyz\Yves\Customer\Form\DeleteCustomer;
use Pyz\Yves\Customer\Form\ForgotPassword;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\RestorePassword;

class CustomerDependencyContainer extends SprykerFeatureCustomerDependencyContainer
{

    /**
     * @return Address
     */
    public function createFormAddress()
    {
        return $this->getFactory()->createFormAddress();
    }

    /**
     * @return RegisterCustomer
     */
    public function createFormRegister()
    {
        return $this->getFactory()->createFormRegisterCustomer();
    }

    /**
     * @return DeleteCustomer
     */
    public function createFormDelete()
    {
        return $this->getFactory()->createFormDeleteCustomer();
    }

    /**
     * @return ForgotPassword
     */
    public function createFormForgot()
    {
        return $this->getFactory()->createFormForgotPassword();
    }

    /**
     * @return Profile
     */
    public function createFormProfile()
    {
        return $this->getFactory()->createFormProfile();
    }

    /**
     * @return RestorePassword
     */
    public function createFormRestore()
    {
        return $this->getFactory()->createFormRestorePassword();
    }

}
