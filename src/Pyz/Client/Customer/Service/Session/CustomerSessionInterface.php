<?php

namespace Pyz\Client\Customer\Service\Session;

use Generated\Shared\Customer\CustomerInfoInterface;
use SprykerFeature\Client\Customer\Service\Session\CustomerSessionInterface as SprykerFeatureCustomerSessionInterface;

interface CustomerSessionInterface extends SprykerFeatureCustomerSessionInterface
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

}
