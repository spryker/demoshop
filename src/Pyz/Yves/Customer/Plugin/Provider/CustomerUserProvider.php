<?php

namespace Pyz\Yves\Customer\Plugin\Provider;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\CustomerFactory;
use Pyz\Yves\Customer\Security\CustomerUser;
use Spryker\Yves\Kernel\AbstractPlugin;
use Spryker\Client\Customer\CustomerClientInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * @method CustomerClientInterface getClient()
 * @method CustomerFactory getFactory()
 */
class CustomerUserProvider extends AbstractPlugin implements UserProviderInterface
{

    /**
     * @param string $username
     *
     * @return UserInterface
     */
    public function loadUserByUsername($username)
    {
        $customerTransfer = $this->loadCustomerByEmail($username);

        return $this->getFactory()->createSecurityUser($customerTransfer);
    }

    /**
     * @param UserInterface $user
     *
     * @return UserInterface
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof CustomerUser) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        if (!$this->getClient()->isLoggedIn()) {
            $customerTransfer = $this->loadCustomerByEmail($user->getUsername());
        } else {
            $customerTransfer = $this->getClient()->getCustomer();
        }

        return $this->getFactory()->createSecurityUser($customerTransfer);
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === CustomerUser::class;
    }

    /**
     * @param string $email
     *
     * @return CustomerTransfer
     */
    protected function loadCustomerByEmail($email)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setEmail($email);

        $customerTransfer = $this->getClient()->getCustomerByEmail($customerTransfer);

        return $customerTransfer;
    }

}
