<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Plugin\Provider;

use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Yves\Customer\Security\Customer;
use Spryker\Yves\Kernel\AbstractPlugin;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * @method \Spryker\Client\Customer\CustomerClientInterface getClient()
 * @method \Pyz\Yves\Customer\CustomerFactory getFactory()
 */
class CustomerUserProvider extends AbstractPlugin implements UserProviderInterface
{
    /**
     * @param string $username
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByUsername($username)
    {
        $customerTransfer = $this->loadCustomerByEmail($username);

        return $this->getFactory()->createSecurityUser($customerTransfer);
    }

    /**
     * @param \Symfony\Component\Security\Core\User\UserInterface $user
     *
     * @throws \Symfony\Component\Security\Core\Exception\UnsupportedUserException
     *
     * @return \Symfony\Component\Security\Core\User\UserInterface
     */
    public function refreshUser(UserInterface $user)
    {
        if (!$user instanceof Customer) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', get_class($user)));
        }

        $customerTransfer = $this->getCustomerTransfer($user);

        return $this->getFactory()->createSecurityUser($customerTransfer);
    }

    /**
     * @param \Symfony\Component\Security\Core\User\UserInterface $user
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function getCustomerTransfer(UserInterface $user)
    {
        if ($this->getClient()->isLoggedIn() === false) {
            $customerTransfer = $this->loadCustomerByEmail($user->getUsername());

            return $customerTransfer;
        }
        $customerTransfer = $this->getClient()->getCustomer();

        if ($customerTransfer->getIsDirty() === true) {
            $customerTransfer = $this->updateUser($user);

            return $customerTransfer;
        }

        return $customerTransfer;
    }

    /**
     * @param string $class
     *
     * @return bool
     */
    public function supportsClass($class)
    {
        return $class === Customer::class;
    }

    /**
     * @param string $email
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function loadCustomerByEmail($email)
    {
        $customerTransfer = new CustomerTransfer();
        $customerTransfer->setEmail($email);

        $customerTransfer = $this->getClient()->getCustomerByEmail($customerTransfer);

        return $customerTransfer;
    }

    /**
     * @param \Symfony\Component\Security\Core\User\UserInterface $user
     *
     * @return \Generated\Shared\Transfer\CustomerTransfer
     */
    protected function updateUser(UserInterface $user)
    {
        $customerTransfer = $this->loadCustomerByEmail($user->getUsername());
        $this->getClient()->setCustomer($customerTransfer);

        return $customerTransfer;
    }
}
