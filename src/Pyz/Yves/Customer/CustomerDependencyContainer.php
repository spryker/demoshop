<?php

namespace Pyz\Yves\Customer;

use SprykerFeature\Yves\Customer\CustomerDependencyContainer as SprykerFeatureCustomerDependencyContainer;
use Pyz\Yves\Customer\Communication\Form\Address;
use Pyz\Yves\Customer\Communication\Form\RegisterCustomer;
use Pyz\Yves\Customer\Communication\Form\DeleteCustomer;
use Pyz\Yves\Customer\Communication\Form\ForgotPassword;
use Pyz\Yves\Customer\Communication\Form\Profile;
use Pyz\Yves\Customer\Communication\Form\RestorePassword;

class CustomerDependencyContainer extends SprykerFeatureCustomerDependencyContainer
{

    /**
     * @return Address
     */
    public function createFormAddress()
    {
        return $this->getFactory()->createCommunicationFormAddress();
    }

    /**
     * @return RegisterCustomer
     */
    public function createFormRegister()
    {
        return $this->getFactory()->createCommunicationFormRegisterCustomer();
    }

    /**
     * @return DeleteCustomer
     */
    public function createFormDelete()
    {
        return $this->getFactory()->createCommunicationFormDeleteCustomer();
    }

    /**
     * @return ForgotPassword
     */
    public function createFormForgot()
    {
        return $this->getFactory()->createCommunicationFormForgotPassword();
    }

    /**
     * @return Profile
     */
    public function createFormProfile()
    {
        return $this->getFactory()->createCommunicationFormProfile();
    }

    /**
     * @return RestorePassword
     */
    public function createFormRestore()
    {
        return $this->getFactory()->createCommunicationFormRestorePassword();
    }

}
