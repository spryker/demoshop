<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Table\Assignment;

use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerGroupToCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerOrganizationRoleTableMap;
use Propel\Runtime\ActiveQuery\Criteria;
use \Spryker\Zed\CustomerGroup\Communication\Table\Assignment\AssignmentCustomerQueryBuilder as BaseAssignmentCustomerQueryBuilder;

class AssignmentCustomerQueryBuilder extends BaseAssignmentCustomerQueryBuilder implements AssignmentCustomerQueryBuilderInterface
{
    /**
     * @param int|null $idCustomerGroup
     *
     * @return \Orm\Zed\Customer\Persistence\SpyCustomerQuery
     */
    public function buildAssignedQuery($idCustomerGroup = null)
    {
        $query = $this->customerQueryContainer
            ->queryCustomers()
            ->useSpyCustomerGroupToCustomerQuery()
            ->filterByFkCustomerGroup($idCustomerGroup)
            ->endUse()
            ->addJoin(
                SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_ORGANIZATION_ROLE,
                SpyCustomerOrganizationRoleTableMap::COL_ID_CUSTOMER_ORGANIZATION_ROLE,
                Criteria::LEFT_JOIN
            )
            ->withColumn(SpyCustomerOrganizationRoleTableMap::COL_ROLE, 'role');

        return $query;
    }

    /**
     * @param int|null $idCustomerGroup
     *
     * @return \Orm\Zed\Customer\Persistence\SpyCustomerQuery
     */
    public function buildNotAssignedQuery($idCustomerGroup = null)
    {
        $query = $this->customerQueryContainer->queryCustomers();

        if ($idCustomerGroup) {
            $query->addJoin(
                [SpyCustomerTableMap::COL_ID_CUSTOMER, $idCustomerGroup],
                [SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER, SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_GROUP],
                Criteria::LEFT_JOIN
            )
                ->addAnd(SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_GROUP, null, Criteria::ISNULL);
        }

        $query->addJoin(
            SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER_ORGANIZATION_ROLE,
            SpyCustomerOrganizationRoleTableMap::COL_ID_CUSTOMER_ORGANIZATION_ROLE,
            Criteria::LEFT_JOIN
        )
        ->withColumn(SpyCustomerOrganizationRoleTableMap::COL_ROLE, 'role');

        return $query;
    }
}
