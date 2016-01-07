<?php

namespace Pyz\Yves\Customer;

use Generated\Shared\Transfer\AddressTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Form\Login;
use Pyz\Yves\Customer\Form\Password;
use Pyz\Yves\Customer\Form\RestorePassword;
use Pyz\Yves\Customer\Form\Profile;
use Pyz\Yves\Customer\Form\ForgottenPassword;
use Pyz\Yves\Customer\Form\Address;
use Pyz\Yves\Customer\Form\Register;
use Pyz\Yves\Customer\Plugin\Provider\CustomerAuthenticationSuccessHandler;
use Pyz\Yves\Customer\Plugin\Provider\CustomerSecurityServiceProvider;
use Pyz\Yves\Customer\Plugin\Provider\CustomerUserProvider;
use Pyz\Yves\Customer\Security\User;
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
     * @param array $availableCountries
     * @param AddressTransfer|null $addressTransfer
     *
     * @return Address
     */
    public function createFormAddress(array $availableCountries, AddressTransfer $addressTransfer = null)
    {
        return new Address($availableCountries, $addressTransfer);
    }

    /**
     * @return Register
     */
    public function createFormRegister()
    {
        return new Register();
    }

    /**
     * @return Login
     */
    public function createFormLogin()
    {
        return new Login();
    }

    /**
     * @return ForgottenPassword
     */
    public function createFormForgottenPassword()
    {
        return new ForgottenPassword();
    }

    /**
     * @param CustomerTransfer $customerTransfer
     *
     * @return Profile
     */
    public function createFormProfile(CustomerTransfer $customerTransfer)
    {
        return new Profile($customerTransfer);
    }

    /**
     * @param string $restoreKey
     *
     * @return RestorePassword
     */
    public function createFormRestorePassword($restoreKey)
    {
        return new RestorePassword($restoreKey);
    }

    /**
     * @return Password
     */
    public function createFormPassword()
    {
        return new Password();
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
        return new User(
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

}
