<?php

namespace Pyz\Yves\Customer\Communication\Plugin;

use Generated\Shared\Transfer\CustomerInfoTransfer;
use Generated\Shared\Transfer\CustomerLoginResultTransfer;
use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;
use Generated\Shared\CustomerCheckoutConnector\CustomerInterface;
use Generated\Shared\Transfer\CustomerMagentoPasswordMigrationTransfer;
use Generated\Shared\Transfer\CustomerTransfer;
use Pyz\Client\Customer\Service\CustomerClientInterface;
use SprykerEngine\Yves\Kernel\Communication\AbstractPlugin;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Pyz\Client\Customer\Service\CustomerClient;

class UserProvider extends AbstractPlugin implements UserProviderInterface
{

    /**
     * @var CustomerClient
     */
    private $customerClient;

    /**
     * @param CustomerClientInterface $customerClient
     *
     * @return $this
     */
    public function setCustomerClient(CustomerClientInterface $customerClient)
    {
        $this->customerClient = $customerClient;

        return $this;
    }

    /**
     * @param string $username
     *
     * @return User
     */
    public function loadUserByUsername($username)
    {
        if (!$this->customerClient->isLoggedIn()) {
            $customerTransfer = new CustomerTransfer();
            $customerTransfer->setEmail($username);

            $customerLoginResult = new CustomerLoginResultTransfer();
            $customerLoginResult->setCustomerTransfer($customerTransfer);
            $customerLoginResult->setCustomerInfoTransfer(new CustomerInfoTransfer());

            $customerLoginResult = $this->customerClient->getCustomerLoginResultByEmail($customerLoginResult);

            $customerTransfer = $customerLoginResult->getCustomerTransfer();

            $this->customerClient->setCustomer($customerTransfer);
            $this->customerClient->setCustomerInfo($customerLoginResult->getCustomerInfoTransfer());

        } else {
            $customerTransfer = $this->customerClient->getCustomer();
        }

        return new User(
            $customerTransfer->getEmail(),
            $customerTransfer->getPassword(),
            ['ROLE_USER']
        );
    }

    /**
     * @param string $username
     * @param string $password
     * @return bool
     */
    public function migrateMagentoPassword($username, $password)
    {
        $customerPasswordMigrationTransfer = new CustomerMagentoPasswordMigrationTransfer();
        $customerPasswordMigrationTransfer
            ->setPassword($password)
            ->setEmail($username);

        $this->customerClient->migrateMagentoPassword($customerPasswordMigrationTransfer);
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
