<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Form\FormFactory;
use Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationFailureHandler;
use Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationSuccessHandler;
use Pyz\Yves\Customer\Plugin\Provider\CustomerSecurityServiceProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerUserProvider;
use Pyz\Yves\Customer\Security\Customer;
use Spryker\Yves\Kernel\AbstractFactory;
use Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouper;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class CustomerFactory extends AbstractFactory
{

    /**
     * @return \Pyz\Yves\Customer\Form\FormFactory
     */
    public function getCustomerFormFactory()
    {
        return new FormFactory();
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationSuccessHandler
     */
    public function createCustomerAuthenticationSuccessHandler()
    {
        return new CustomerAuthenticationSuccessHandler();
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationSuccessHandler
     */
    public function createCustomerAuthenticationFailureHandler()
    {
        return new CustomerAuthenticationFailureHandler($this->getFlashMessenger());
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
     * @return \Pyz\Client\Newsletter\NewsletterClientInterface
     */
    public function createNewsletterClient()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::CLIENT_NEWSLETTER);
    }

    /**
     * @return \Spryker\Client\Sales\SalesClientInterface
     */
    public function createSalesClient()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::CLIENT_SALES);
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\AuthenticationHandler
     */
    public function createAuthenticationHandler()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::PLUGIN_AUTHENTICATION_HANDLER);
    }

    /**
     * @return \Spryker\Yves\ProductBundle\Grouper\ProductBundleGrouper
     */
    public function createProductBundleGroupper()
    {
        return new ProductBundleGrouper();
    }

    /**
     * @return \Spryker\Shared\Application\Communication\Application
     */
    public function createApplication()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::PLUGIN_APPLICATION);
    }

    /**
     * @return \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    protected function getFlashMessenger()
    {
        return $this->createApplication()['flash_messenger'];
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\CheckoutAuthenticationHandlerPluginInterface[]
     */
    public function createCustomerAuthenticationHandlerPlugins()
    {
        return [
            $this->createLoginCheckoutAuthenticationHandlerPlugin(),
            $this->createGuestCheckoutAuthenticationHandlerPlugin(),
            $this->createRegistrationAuthenticationHandlerPlugin(),
        ];
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\LoginCheckoutAuthenticationHandlerPlugin
     */
    public function createLoginCheckoutAuthenticationHandlerPlugin()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::PLUGIN_LOGIN_AUTHENTICATION_HANDLER);
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\GuestCheckoutAuthenticationHandlerPlugin
     */
    public function createGuestCheckoutAuthenticationHandlerPlugin()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::PLUGIN_GUEST_AUTHENTICATION_HANDLER);
    }

    /**
     * @return \Pyz\Yves\Customer\Plugin\RegistrationCheckoutAuthenticationHandlerPlugin
     */
    public function createRegistrationAuthenticationHandlerPlugin()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::PLUGIN_REGISTRATION_AUTHENTICATION_HANDLER);
    }

    /**
     * @return \Spryker\Yves\Messenger\FlashMessenger\FlashMessengerInterface
     */
    public function createMessenger()
    {
        return $this->getProvidedDependency(CustomerDependencyProvider::FLASH_MESSENGER);
    }

}
