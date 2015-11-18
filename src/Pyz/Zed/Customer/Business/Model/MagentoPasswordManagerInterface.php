<?php

namespace Pyz\Zed\Customer\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

interface MagentoPasswordManagerInterface
{
    /**
     * @param CustomerTransfer $customerTransfer
     * @return bool
     */
    public function checkMagentoPassword(CustomerTransfer $customerTransfer);

    /**
     * @param CustomerTransfer $customerTransfer
     * @return bool
     */
    public function hasMagentoPassword(CustomerTransfer $customerTransfer);
}
