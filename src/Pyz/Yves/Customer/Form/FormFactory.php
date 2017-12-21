<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */
namespace Pyz\Yves\Customer\Form;

use Pyz\Yves\Customer\CustomerDependencyProvider;
use Pyz\Yves\Customer\Form\DataProvider\AddressFormDataProvider;
use Spryker\Shared\Application\ApplicationConstants;
use Spryker\Yves\Kernel\AbstractFactory;

class FormFactory extends AbstractFactory
{
    /**
     * @return \Symfony\Component\Form\FormFactory
     */
    protected function getFormFactory()
    {
        return $this->getProvidedDependency(ApplicationConstants::FORM_FACTORY);
    }

    /**
     * @param array $formOptions
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getAddressForm(array $formOptions = [])
    {
        return $this->getFormFactory()->create(AddressForm::class, null, $formOptions);
    }

    /**
     * @return \Pyz\Yves\Customer\Form\DataProvider\AddressFormDataProvider
     */
    public function createAddressFormDataProvider()
    {
        return new AddressFormDataProvider($this->getCustomerClient(), $this->getStore());
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getRegisterForm()
    {
        return $this->getFormFactory()->create(RegisterForm::class);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getLoginForm()
    {
        return $this->getFormFactory()->create(LoginForm::class);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getForgottenPasswordForm()
    {
        return $this->getFormFactory()->create(ForgottenPasswordForm::class);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getProfileForm()
    {
        return $this->getFormFactory()->create(ProfileForm::class);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getFormRestorePassword()
    {
        return $this->getFormFactory()->create(RestorePasswordForm::class);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getPasswordForm()
    {
        return $this->getFormFactory()->create(PasswordForm::class);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function getNewsletterSubscriptionForm()
    {
        return $this->getFormFactory()->create(NewsletterSubscriptionForm::class);
    }

    /**
     * @return \Pyz\Client\Customer\CustomerClientInterface
     */
    protected function getCustomerClient()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::CLIENT_CUSTOMER);
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    protected function getStore()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::STORE);
    }
}
