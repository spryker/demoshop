<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Customer\Plugin;

use Generated\Shared\Transfer\CustomerTransfer;
use SprykerEngine\Yves\Kernel\AbstractPlugin;
use SprykerFeature\Client\Customer\Service\CustomerClientInterface;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * @method CustomerClientInterface getClient()
 */
class UserProvider extends AbstractPlugin implements UserProviderInterface
{

    /**
     * @param string $username
     *
     * @return User
     */
    public function loadUserByUsername($username)
    {
        if (!$this->getClient()->isLoggedIn()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->setEmail($username);
            $customerTransfer = $this->getClient()->getCustomerByEmail($customerTransfer);
            $this->getClient()->setCustomer($customerTransfer);
        } else {
            $customerTransfer = $this->getClient()->getCustomer();
        }

        return new User(
            $customerTransfer->getEmail(),
            $customerTransfer->getPassword(),
            ['ROLE_USER']
        );
    }

    /**
     * @param UserInterface $user
     *
     * @return User
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof User) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        return $this->loadUserByUsername($user->getUsername());
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === 'Symfony\Component\Security\Core\User\User';
    }

}
