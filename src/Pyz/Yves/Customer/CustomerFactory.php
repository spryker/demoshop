<?php

namespace Pyz\Yves\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Application\Plugin\Pimple;
use Pyz\Yves\Customer\Form\DataProvider\AddressFormDataProvider;
use Pyz\Yves\Customer\Form\LoginForm;
use Pyz\Yves\Customer\Form\NewsletterSubscriptionForm;
use Pyz\Yves\Customer\Form\PasswordForm;
use Pyz\Yves\Customer\Form\RestorePasswordForm;
use Pyz\Yves\Customer\Form\ProfileForm;
use Pyz\Yves\Customer\Form\ForgottenPasswordForm;
use Pyz\Yves\Customer\Form\AddressForm;
use Pyz\Yves\Customer\Form\RegisterForm;
use Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationSuccessHandler;
use Pyz\Yves\Customer\Plugin\Provider\CustomerSecurityServiceProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerUserProvider;
use Pyz\Yves\Customer\Plugin\AuthenticationHandler;
use Pyz\Yves\Customer\Security\Customer;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class CustomerFactory extends AbstractFactory
{

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
        return new AddressFormDataProvider($this->createCustomerClient(), $this->createStore());
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
     * @return \Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationSuccessHandler
     */
    public function createCustomerAuthenticationSuccessHandler()
    {
        return new CustomerAuthenticationSuccessHandler();
    }

    /**
     * @return \Symfony\Component\Security\Core\User\UserProviderInterface
     */
    public function createCustomerUserProvider()
    {
        return new CustomerUserProvider();
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     */
    public function createSecurityUser(CustomerTransfer $customerTransfer)
    {
        return new Customer(
            $customerTransfer,
            $customerTransfer->getEmail(),
            $customerTransfer->getPassword(),
            [CustomerSecurityServiceProvider::ROLE_USER]
        );
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerTransfer $customerTransfer
     *
     * @return \Symfony\Component\Security\Core\Authentication\Token\TokenInterface
     */
    public function createUsernamePasswordToken(CustomerTransfer $customerTransfer)
    {
        $user = $this->createSecurityUser($customerTransfer);

        return new UsernamePasswordToken(
            $user,
            $user->getPassword(),
            CustomerSecurityServiceProvider::FIREWALL_SECURED,
            [CustomerSecurityServiceProvider::ROLE_USER]
        );
    }

    /**
     * @param string $targetUrl
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createRedirectResponse($targetUrl)
    {
        return new RedirectResponse($targetUrl);
    }

    /**
     * @return \Spryker\Shared\Kernel\Store
     */
    public function createStore()
    {
        return Store::getInstance();
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
     * @return \Pyz\Client\Newsletter\NewsletterClientInterface
     */
    public function createNewsletterClient()
    {
        return $this->getLocator()->newsletter()->client();
    }

    /**
     * @return \Spryker\Client\Sales\SalesClientInterface
     */
    public function createSalesClient()
    {
        return $this->getLocator()->sales()->client();
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\AuthenticationHandler
     */
    public function createAuthenticationHandler()
    {
        return new AuthenticationHandler();
    }

    /**
     * @return \Pyz\Client\Customer\CustomerClientInterface
     */
    public function createCustomerClient()
    {
        return $this->getLocator()->customer()->client();
    }

    /**
     * @return \Spryker\Shared\Application\Communication\Application
     */
    public function createApplication()
    {
        return (new Pimple())->getApplication();
    }

}
