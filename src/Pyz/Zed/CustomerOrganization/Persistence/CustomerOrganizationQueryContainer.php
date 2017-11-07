<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Persistence;

use \Spryker\Zed\CustomerGroup\Persistence\CustomerGroupQueryContainer as BaseCustomerGroupQueryContainer;

/**
 * @method \Pyz\Zed\CustomerOrganization\Persistence\CustomerOrganizationPersistenceFactory getFactory()
 */
class CustomerOrganizationQueryContainer extends BaseCustomerGroupQueryContainer implements CustomerOrganizationQueryContainerInterface
{
    /**
     *
     * @return \Orm\Zed\CustomerGroup\Persistence\SpyCustomerOrganizationRoleQuery
     */
    public function queryDefaultCustomerOrganizationRole()
    {
        return $this->getFactory()
            ->createSpyCustomerOrganizationRoleQuery()
            ->filterByDefault(true);
    }
}
