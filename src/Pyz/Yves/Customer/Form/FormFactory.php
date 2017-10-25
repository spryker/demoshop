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
    public function createAddressForm(array $formOptions = [])
    {
        $addressFormType = new AddressForm();

        return $this->getFormFactory()->create($addressFormType, null, $formOptions);
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
    public function createRegisterForm()
    {
        $registerFormType = new RegisterForm();

        return $this->getFormFactory()->create($registerFormType);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createLoginForm()
    {
        $loginFormType = new LoginForm();

        return $this->getFormFactory()->create($loginFormType);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createForgottenPasswordForm()
    {
        $forgottenPasswordFormType = new ForgottenPasswordForm();

        return $this->getFormFactory()->create($forgottenPasswordFormType);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createProfileForm()
    {
        $profileFormType = new ProfileForm();

        return $this->getFormFactory()->create($profileFormType);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createFormRestorePassword()
    {
        $restorePasswordFormType = new RestorePasswordForm();

        return $this->getFormFactory()->create($restorePasswordFormType);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createPasswordForm()
    {
        $passwordFormType = new PasswordForm();

        return $this->getFormFactory()->create($passwordFormType);
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function createNewsletterSubscriptionForm()
    {
        $newsletterSubscriptionFormType = new NewsletterSubscriptionForm();

        return $this->getFormFactory()->create($newsletterSubscriptionFormType);
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
