<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Customer;

use Generated\Shared\Transfer\SequenceNumberSettingsTransfer;
use SprykerEngine\Shared\Kernel\Store;
use SprykerFeature\Shared\SequenceNumber\SequenceNumberConstants;
use SprykerFeature\Zed\Customer\CustomerConfig as SprykerCustomerConfig;

class CustomerConfig extends SprykerCustomerConfig
{

    /**
     * @return SequenceNumberSettingsInterface
     */
    public function getCustomerReferenceDefaults()
    {
        $sequenceNumberSettingsTransfer = new SequenceNumberSettingsTransfer();

        $sequenceNumberSettingsTransfer->setName(self::NAME_CUSTOMER_REFERENCE);

        $sequenceNumberSettingsTransfer->setIncrementMinimum(1);
        $sequenceNumberSettingsTransfer->setIncrementMaximum(1);
        $sequenceNumberSettingsTransfer->setMinimumNumber(1);

        $sequenceNumberPrefixParts = [];
        $sequenceNumberPrefixParts[] = Store::getInstance()->getStoreName();
        $sequenceNumberPrefixParts[] = $this->get(SequenceNumberConstants::ENVIRONMENT_PREFIX);
        $prefix = implode($this->getUniqueIdentifierSeparator(), $sequenceNumberPrefixParts) . $this->getUniqueIdentifierSeparator();
        $sequenceNumberSettingsTransfer->setPrefix($prefix);

        return $sequenceNumberSettingsTransfer;
    }

}
