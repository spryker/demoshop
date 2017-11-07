<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Persistence;

use \Spryker\Zed\CustomerGroup\Persistence\CustomerGroupQueryContainerInterface as BaseCustomerGroupQueryContainerInterface;

interface CustomerOrganizationQueryContainerInterface extends BaseCustomerGroupQueryContainerInterface
{
    /**
     * @api
     *
     * @return \Orm\Zed\Customer\Persistence\SpyCustomerQuery
     */
    public function queryDefaultCustomerOrganizationRole();
}
