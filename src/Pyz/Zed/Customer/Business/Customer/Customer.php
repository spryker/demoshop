<?php

namespace Pyz\Zed\Customer\Business\Customer;

use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Transfer\CustomerInfoTransfer;
use Orm\Zed\Customer\Persistence\SpyCustomer;
use Pyz\Zed\Customer\Business\Customer\CustomerInterface as CustomerModelInterface;
use SprykerFeature\Zed\Customer\Business\Customer\Customer as SprykerFeatureCustomer;
use Generated\Shared\Customer\CustomerInterface as CustomerTransferInterface;

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
