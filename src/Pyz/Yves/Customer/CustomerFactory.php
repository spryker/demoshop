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
     * @return \Pyz\Yves\Customer\Form\AddressForm
     */
    public function createFormAddress()
    {
        return new AddressForm($this->createStore());
    }

    /**
     * @return \Pyz\Yves\Customer\Form\RegisterForm
     */
    public function createFormRegister()
    {
        return new RegisterForm();
    }

    /**
     * @return \Pyz\Yves\Customer\Form\LoginForm
     */
    public function createFormLogin()
    {
        return new LoginForm();
    }

    /**
     * @return \Pyz\Yves\Customer\Form\ForgottenPasswordForm
     */
    public function createFormForgottenPassword()
    {
        return new ForgottenPasswordForm();
    }

    /**
     * @return \Pyz\Yves\Customer\Form\ProfileForm
     */
    public function createFormProfile()
    {
        return new ProfileForm();
    }

    /**
     * @return \Pyz\Yves\Customer\Form\RestorePasswordForm
     */
    public function createFormRestorePassword()
    {
        return new RestorePasswordForm();
    }

    /**
     * @return \Pyz\Yves\Customer\Form\PasswordForm
     */
    public function createFormPassword()
    {
        return new PasswordForm();
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
     * @return \Pyz\Yves\Customer\Form\NewsletterSubscriptionForm
     */
    public function createFormNewsletterSubscription()
    {
        return new NewsletterSubscriptionForm();
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
