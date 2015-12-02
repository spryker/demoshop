<?php

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Propel\Runtime\Exception\PropelException;
use Generated\Shared\Customer\CustomerInterface;
use Pyz\Zed\Customer\Business\Customer\CustomerInterface as CustomerModelInterface;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use SprykerFeature\Zed\Customer\Business\Customer\Customer as SprykerFeatureCustomer;
use Generated\Shared\Customer\CustomerInterface as CustomerTransferInterface;
use SprykerFeature\Zed\Customer\Business\Exception\CustomerNotFoundException;
use SprykerFeature\Zed\Customer\Business\Exception\CustomerNotUpdatedException;

/**
 * @property CustomerQueryContainerInterface $queryContainer
 */
class Customer extends SprykerFeatureCustomer implements CustomerModelInterface
{
    /**
     * @param CustomerTransferInterface $customerTransfer
     * @return CustomerTransferInterface
     */
    public function encryptPassword(CustomerTransferInterface $customerTransfer)
    {
        return parent::encryptPassword($customerTransfer);
    }
    
    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @throws \SprykerFeature\Zed\Customer\Business\Exception\CustomerNotFoundException
     * @return CustomerLoginResultInterface
     */
    public function getLoginResult(CustomerLoginResultInterface $customerLoginResultTransfer)
    {
        $customerTransfer = $customerLoginResultTransfer->getCustomerTransfer();

        $customerEntity = $this->getCustomer($customerTransfer);
        $customerTransfer->fromArray($customerEntity->toArray(), true);
        $addresses = $customerEntity->getAddresses();
        if ($addresses) {
            $customerTransfer->setAddresses($this->entityCollectionToTransferCollection($addresses, $customerEntity));
        }

        $customerLoginResultTransfer->setCustomerTransfer($customerTransfer);
        $customerLoginResultTransfer->setCustomerInfoTransfer(
            $this->createCustomerInfo($customerEntity)
        );

        return $customerLoginResultTransfer;
    }

    /**
     * @param CustomerInterface $customerTransfer
     *
     * @throws PropelException
     *
     * @return CustomerResponseTransfer
     */
    public function createGuest(CustomerInterface $customerTransfer)
    {
        $customerEntity = new SpyCustomer();
        $customerEntity->fromArray($customerTransfer->toArray());

        $customerEntity->setCustomerReference($this->customerReferenceGenerator->generateCustomerReference($customerTransfer));
        $customerEntity->setRegistrationKey($this->generateKey());

        $customerEntity->save();

        $customerTransfer->setIdCustomer($customerEntity->getPrimaryKey());
        $customerTransfer->setCustomerReference($customerEntity->getCustomerReference());
        $customerTransfer->setRegistrationKey($customerEntity->getRegistrationKey());

        $customerResponseTransfer = $this->createCustomerResponseTransfer();
        $customerResponseTransfer
            ->setIsSuccess(true)
            ->setCustomerTransfer($customerTransfer);

        return $customerResponseTransfer;
    }

    /**
     * @param CustomerInterface $customerTransfer
     *
     * @throws PropelException
     * @throws CustomerNotFoundException
     * @throws CustomerNotUpdatedException
     *
     * @return CustomerResponseTransfer
     */
    public function updateGuest(CustomerInterface $customerTransfer)
    {
        $customerEntity = $this->getCustomer($customerTransfer);

        if ($customerEntity->getPassword() !== null) {
            $customerResponseTransfer = $this->createCustomerEmailAlreadyUsedResponse();

            return $customerResponseTransfer;
        }

        $customerTransfer->setIdCustomer($customerEntity->getPrimaryKey());
        $customerTransfer->setCustomerReference($customerEntity->getCustomerReference());
        $customerTransfer->setRegistrationKey($customerEntity->getRegistrationKey());

        $customerEntity->fromArray($customerTransfer->toArray());
        $customerResponseTransfer = $this->createCustomerResponseTransfer();

        $customerEntity->save();
        $customerResponseTransfer
            ->setIsSuccess(true)
            ->setCustomerTransfer($customerTransfer)
        ;

        return $customerResponseTransfer;
    }

    /**
     * @param string $email
     *
     * @return bool
     */
    public function hasCustomerWithPasswordByEmail($email)
    {
        $customerCount = $this->queryContainer
            ->queryCustomerWithPasswordByEmail($email)
            ->count()
        ;

        return $customerCount > 0;
    }

    /**
     * @param SpyCustomer $customerEntity
     *
     * @return CustomerInfoTransfer
     */
    protected function createCustomerInfo(SpyCustomer $customerEntity)
    {
        $customerInfoTransfer = new CustomerInfoTransfer();
        $customerInfoTransfer->setIsReturning(
            $this->getIsReturning($customerEntity)
        );

        return $customerInfoTransfer;
    }

    /**
     * @param SpyCustomer $customerEntity
     *
     * @return bool
     */
    protected function getIsReturning(SpyCustomer $customerEntity)
    {
        $orderCount = $customerEntity->getOrders()->count();

        return ($orderCount !== 0);
    }
}
