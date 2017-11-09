<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Customer\Persistence;

use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerGroupToCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerOrganizationRoleTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use Spryker\Zed\Customer\Persistence\CustomerQueryContainer as BaseCustomerQueryContainer;

/**
 * @method \Pyz\Zed\Customer\Persistence\CustomerPersistenceFactory getFactory()
 */
class CustomerQueryContainer extends BaseCustomerQueryContainer implements CustomerQueryContainerInterface
{
    public function queryCustomers()
    {
        return $this->getFactory()->createSpyCustomerQuery()
            ->addJoin(
                SpyCustomerTableMap::COL_ID_CUSTOMER,
                SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER,
                Criteria::LEFT_JOIN
            )
            ->addJoin(
                SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_ORGANIZATION_ROLE,
                SpyCustomerOrganizationRoleTableMap::COL_ID_CUSTOMER_ORGANIZATION_ROLE,
                Criteria::INNER_JOIN
            )
            ->withColumn(SpyCustomerOrganizationRoleTableMap::COL_ROLE, 'role');
    }

    /**
     * @param int $idCustomer
     *
     * @return $this|\Orm\Zed\Product\Persistence\PyzQuoteQuery
     */
    public function queryCart(int $idCustomer)
    {
        return $this->getFactory()
            ->createQuoteQuery()
            ->filterByFkCustomer($idCustomer);

    }
}
