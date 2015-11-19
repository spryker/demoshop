<?php

namespace Pyz\Client\Customer\Service;

use Generated\Shared\Customer\CustomerInfoInterface;
use Generated\Shared\Customer\CustomerLoginResultInterface;
use SprykerFeature\Client\Customer\Service\CustomerClientInterface as SprykerFeatureCustomerClientInterface;

interface CustomerClientInterface extends SprykerFeatureCustomerClientInterface
{
    /**
     * @return CustomerInfoInterface
     */
    public function getCustomerInfo();

    /**
     * @param CustomerInfoInterface $customerInfoTransfer
     *
     * @return CustomerInfoInterface
     */
    public function setCustomerInfo(CustomerInfoInterface $customerInfoTransfer);

    /**
     * @param CustomerLoginResultInterface $customerLoginResultTransfer
     *
     * @return CustomerLoginResultInterface
     */
    public function getCustomerLoginResultByEmail(CustomerLoginResultInterface $customerLoginResultTransfer);

}
