<?php

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerErrorTransfer;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Generated\Shared\Transfer\CustomerResponseTransfer;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Propel\Runtime\Exception\PropelException;
use Pyz\Zed\Customer\Business\Customer\CustomerInterface as CustomerModelInterface;
use Pyz\Zed\Customer\Persistence\CustomerQueryContainerInterface;
use SprykerFeature\Shared\Customer\Code\Messages;
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

        try {
            $customerEntity = $this->getCustomer($customerTransfer);
        } catch (CustomerNotFoundException $e) {
            throw new CustomerNotFoundException(sprintf(
                "id='%s' email='%s' password='%s' ",
                $customerTransfer->getIdCustomer(),
                $customerTransfer->getEmail(),
                $customerTransfer->getPassword()
            ));
        }
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
     * @param CustomerTransferInterface $customerTransfer
     *
     * @throws PropelException
     *
     * @return CustomerResponseTransfer
     */
    public function createGuest(CustomerTransferInterface $customerTransfer)
    {
        $customerEntity = new SpyCustomer();
        $customerEntity->fromArray($customerTransfer->toArray());

        $customerEntity->setCustomerReference($this->customerReferenceGenerator->generateCustomerReference($customerTransfer));
        $customerEntity->setRegistrationKey($this->generateKey());
        $customerEntity->setRestorePasswordKey($this->generateKey());

        $customerEntity->save();

        $customerTransfer->setIdCustomer($customerEntity->getPrimaryKey());
        $customerTransfer->setCustomerReference($customerEntity->getCustomerReference());
        $customerTransfer->setRegistrationKey($customerEntity->getRegistrationKey());
        $customerTransfer->setRestorePasswordKey($customerEntity->getRestorePasswordKey());

        $customerResponseTransfer = $this->createCustomerResponseTransfer();
        $customerResponseTransfer
            ->setIsSuccess(true)
            ->setCustomerTransfer($customerTransfer);

        return $customerResponseTransfer;
    }

    /**
     * @param CustomerTransferInterface $customerTransfer
     *
     * @throws PropelException
     * @throws CustomerNotFoundException
     * @throws CustomerNotUpdatedException
     *
     * @return CustomerResponseTransfer
     */
    public function updateGuest(CustomerTransferInterface $customerTransfer)
    {
        $customerEntity = $this->getCustomer($customerTransfer);

        if ($customerEntity->getPassword() !== null) {
            $customerResponseTransfer = $this->createCustomerEmailAlreadyUsedResponse();

            return $customerResponseTransfer;
        }

        $customerTransfer->setIdCustomer($customerEntity->getPrimaryKey());
        $customerTransfer->setCustomerReference($customerEntity->getCustomerReference());
        $customerTransfer->setRegistrationKey($customerEntity->getRegistrationKey());
        $customerTransfer->setRestorePasswordKey($customerEntity->getRestorePasswordKey());

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

    /**
     * @param CustomerTransferInterface $customerTransfer
     *
     * @throws PropelException
     * @throws CustomerNotFoundException
     *
     * @return CustomerResponseTransfer
     */
    public function restorePassword(CustomerTransferInterface $customerTransfer)
    {
        $customerTransfer = $this->encryptPassword($customerTransfer);

        $customerResponseTransfer = $this->createCustomerResponseTransfer();

        try {
            $customerEntity = $this->getCustomer($customerTransfer);
        } catch (CustomerNotFoundException $e) {
            $customerError = new CustomerErrorTransfer();
            $customerError->setMessage(Messages::CUSTOMER_TOKEN_INVALID);

            $customerResponseTransfer
                ->setIsSuccess(false)
                ->addError($customerError);

            return $customerResponseTransfer;
        }

        $customerEntity->setRestorePasswordDate(null);
        $customerEntity->setRestorePasswordKey(null);
        $customerEntity->setMagentoPasswordHash(null);

        $customerEntity->setPassword($customerTransfer->getPassword());

        $customerEntity->save();
        $customerTransfer->fromArray($customerEntity->toArray(), true);
        $this->sendPasswordRestoreConfirmation($customerTransfer);

        $customerResponseTransfer->setCustomerTransfer($customerTransfer);

        return $customerResponseTransfer;
    }
}
