<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Business;

use Pyz\Zed\CustomerOrganization\Business\Model\CustomerOrganization;
use \Spryker\Zed\CustomerGroup\Business\CustomerGroupBusinessFactory as BaseCustomerGroupBusinessFactory;

class CustomerOrganizationBusinessFactory extends BaseCustomerGroupBusinessFactory
{
    /**
     * @return \Spryker\Zed\CustomerGroup\Business\Model\CustomerGroupInterface
     */
    public function createCustomerGroup()
    {
        return new CustomerOrganization($this->getQueryContainer());
    }
}
