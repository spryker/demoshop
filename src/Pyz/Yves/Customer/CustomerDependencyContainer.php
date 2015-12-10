<?php

namespace Pyz\Yves\Customer;

use SprykerFeature\Zed\Customer\Communication\Form\AddressForm;
use SprykerFeature\Zed\Customer\Communication\Form\CustomerForm;
use SprykerFeature\Zed\Customer\Communication\Table\AddressTable;
use SprykerFeature\Zed\Customer\Communication\Table\CustomerTable;
use Pyz\Yves\Customer\Form\RestorePassword;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\ForgotPassword;
use Pyz\Yves\Customer\Form\DeleteCustomer;
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\RegisterCustomer;
use SprykerEngine\Yves\Kernel\AbstractDependencyContainer;
use SprykerFeature\Client\Customer\Service\CustomerClient;

class CustomerDependencyContainer extends AbstractDependencyContainer
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
     * @return Form\DeleteCustomer
     */
    public function createFormDelete()
    {
        return new DeleteCustomer();
    }

    /**
     * @return Form\ForgotPassword
     */
    public function createFormForgot()
    {
        return new ForgotPassword();
    }

    /**
     * @return Form\Profile
     */
    public function createFormProfile()
    {
        return new Profile();
    }

    /**
     * @return Form\RestorePassword
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

    /**
     * @return CustomerTable
     */
    public function createCustomerTable()
    {
        return new CustomerTable($this->getQueryContainer());
    }

    /**
     * @param int $idCustomer
     *
     * @return AddressTable
     */
    public function createCustomerAddressTable($idCustomer)
    {
        return new AddressTable($this->getQueryContainer(), $idCustomer);
    }

    /**
     * @param string $formActionType
     *
     * @throws \ErrorException
     *
     * @return FormInterface
     */
    public function createCustomerForm($formActionType)
    {
        $customerForm = new CustomerForm($this->getQueryContainer(), $formActionType);

        return $this->createForm($customerForm);
    }

    /**
     * @return FormInterface
     */
    public function createAddressForm()
    {
        $customerAddressForm = new AddressForm(
                        $this->getProvidedDependency(CustomerDependencyProvider::COUNTRY_FACADE),
                        $this->getQueryContainer()
                    );

        return $this->createForm($customerAddressForm);
    }

}
