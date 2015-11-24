<?php

namespace Pyz\Client\Customer\Service;

use Generated\Shared\Customer\CustomerInfoInterface;
use Generated\Shared\Customer\CustomerLoginResultInterface;
use Generated\Shared\Customer\CustomerMagentoPasswordMigrationInterface;
use Pyz\Client\Customer\Service\Zed\CustomerStubInterface;
use SprykerFeature\Client\Customer\Service\CustomerClient as SprykerFeatureCustomerClient;

/**
 * @method CustomerDependencyContainer getDependencyContainer()
 */
class CustomerClient extends SprykerFeatureCustomerClient  implements CustomerClientInterface
{
    /**
     * @param CustomerMagentoPasswordMigrationInterface $customerInterface
     */
    public function migrateMagentoPassword(CustomerMagentoPasswordMigrationInterface $customerInterface)
    {
        return $this->getZedStub()->migrateMagentoPassword($customerInterface);
    }

    /**
     * @return CustomerStubInterface
     */
    protected function getZedStub()
    {
        return $this->getDependencyContainer()->createZedStub();
    }

    /**
     * @return CustomerInfoInterface
     */
    public function getCustomerInfo()
    {
        $customerTransfer = $this->getDependencyContainer()
            ->createSessionCustomerSession()
            ->getCustomerInfo()
        ;

        return $customerTransfer;
    }

    /**
     * @param CustomerInfoInterface $customerInfoTransfer
     *
     * @return CustomerInfoInterface
     */
    public function setCustomerInfo(CustomerInfoInterface $customerInfoTransfer)
    {
        $customerTransfer = $this->getDependencyContainer()
            ->createSessionCustomerSession()
            ->setCustomerInfo($customerInfoTransfer)
        ;

        return $customerTransfer;
    }

    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function getCustomerLoginResultByEmail(CustomerLoginResultInterface $customerLoginResultTransfer)
    {
        $customerLoginResultTransfer = $this->getDependencyContainer()
            ->createZedCustomerStub()
            ->getLoginResult($customerLoginResultTransfer)
        ;

        return $customerLoginResultTransfer;
    }
}
