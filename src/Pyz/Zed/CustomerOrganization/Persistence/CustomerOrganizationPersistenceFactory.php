<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Persistence;

use Orm\Zed\CustomerGroup\Persistence\SpyCustomerOrganizationRoleQuery;
use \Spryker\Zed\CustomerGroup\Persistence\CustomerGroupPersistenceFactory as BaseCustomerGroupPersistenceFactory;


class CustomerOrganizationPersistenceFactory extends BaseCustomerGroupPersistenceFactory
{
    /**
     * @return \Orm\Zed\CustomerGroup\Persistence\SpyCustomerOrganizationRoleQuery
     */
    public function createSpyCustomerOrganizationRoleQuery()
    {
        return SpyCustomerOrganizationRoleQuery::create();
    }
}
