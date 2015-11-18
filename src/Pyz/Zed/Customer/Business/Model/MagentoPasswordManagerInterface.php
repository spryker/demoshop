<?php

namespace Pyz\Zed\Customer\Business\Model;

use Generated\Shared\Transfer\CustomerTransfer;

interface MagentoPasswordManagerInterface
{
    public function checkMagentoPassword(CustomerTransfer $customerTransfer);

    public function hasMagentoPassword(CustomerTransfer $customerTransfer);
}
