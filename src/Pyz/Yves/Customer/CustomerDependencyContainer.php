<?php

namespace Pyz\Yves\Customer;

use SprykerFeature\Yves\Customer\CustomerDependencyContainer as SprykerFeatureCustomerDependencyContainer;
<<<<<<< HEAD
use Pyz\Yves\Customer\Communication\Form\Address;
use Pyz\Yves\Customer\Communication\Form\RegisterCustomer;
use Pyz\Yves\Customer\Communication\Form\DeleteCustomer;
use Pyz\Yves\Customer\Communication\Form\ForgotPassword;
use Pyz\Yves\Customer\Communication\Form\Profile;
use Pyz\Yves\Customer\Communication\Form\RestorePassword;
=======
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\DeleteCustomer;
use Pyz\Yves\Customer\Form\ForgotPassword;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\RestorePassword;
>>>>>>> CD-126: fix deps for new plugin structure

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
