<?php

namespace Pyz\Yves\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Client\Customer\CustomerClientInterface;
use Pyz\Client\Newsletter\NewsletterClientInterface;
use Pyz\Yves\Application\Plugin\Pimple;
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
use Spryker\Client\Sales\SalesClientInterface;
use Spryker\Shared\Application\Communication\Application;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\AbstractFactory;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

class CustomerFactory extends AbstractFactory
{

    /**
     * @return AddressForm
     */
    public function createFormAddress()
    {
        return new AddressForm($this->createStore());
    }

    /**
     * @return RegisterForm
     */
    public function createFormRegister()
    {
        return new RegisterForm();
    }

    /**
     * @return LoginForm
     */
    public function createFormLogin()
    {
        return new LoginForm();
    }

    /**
     * @return ForgottenPasswordForm
     */
    public function createFormForgottenPassword()
    {
        return new ForgottenPasswordForm();
    }

    /**
     * @return ProfileForm
     */
    public function createFormProfile()
    {
        return new ProfileForm();
    }

    /**
     * @return RestorePasswordForm
     */
    public function createFormRestorePassword()
    {
        return new RestorePasswordForm();
    }

    /**
     * @return PasswordForm
     */
    public function createFormPassword()
    {
        return new PasswordForm();
    }

    /**
     * @return CustomerAuthenticationSuccessHandler
     */
    public function createCustomerAuthenticationSuccessHandler()
    {
        return new CustomerAuthenticationSuccessHandler();
    }

    /**
     * @return UserProviderInterface
     */
    public function createCustomerUserProvider()
    {
        return new CustomerUserProvider();
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return UserInterface
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
     * @param CustomerTransfer $customerTransfer
     *
     * @return TokenInterface
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
     * @return RedirectResponse
     */
    public function createRedirectResponse($targetUrl)
    {
        return new RedirectResponse($targetUrl);
    }

    /**
     * @return Store
     */
    public function createStore()
    {
        return Store::getInstance();
    }

    /**
     * @return NewsletterSubscriptionForm
     */
    public function createFormNewsletterSubscription()
    {
        return new NewsletterSubscriptionForm();
    }

    /**
     * @return NewsletterClientInterface
     */
    public function createNewsletterClient()
    {
        return $this->getLocator()->newsletter()->client();
    }

    /**
     * @return SalesClientInterface
     */
    public function createSalesClient()
    {
        return $this->getLocator()->sales()->client();
    }

    /**
     * @return AuthenticationHandler
     */
    public function createAuthenticationHandler()
    {
        return new AuthenticationHandler();
    }

    /**
     * @return CustomerClientInterface
     */
    public function createCustomerClient()
    {
        return $this->getLocator()->customer()->client();
    }

    /**
     * @return Application
     */
    public function createApplication()
    {
        return (new Pimple())->getApplication();
    }

}
