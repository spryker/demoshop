<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Business\Model;

use Generated\Shared\Transfer\CustomerGroupToCustomerTransfer;
use Generated\Shared\Transfer\CustomerGroupTransfer;
use Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroup;
use Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroupToCustomer;
use Propel\Runtime\Collection\ObjectCollection;
use Pyz\Zed\CustomerOrganization\Persistence\CustomerOrganizationQueryContainer;
use \Spryker\Zed\CustomerGroup\Business\Model\CustomerGroup as BaseCustomerGroup;
use Zend\Stdlib\ArrayObject;

class CustomerOrganization extends BaseCustomerGroup implements CustomerOrganizationInterface
{
    /**
     * @var \Pyz\Zed\CustomerOrganization\Persistence\CustomerOrganizationQueryContainer
     */
    protected $queryContainer;

    /**
     * @param \Spryker\Zed\CustomerGroup\Persistence\CustomerGroupQueryContainerInterface $queryContainer
     */
    public function __construct(CustomerOrganizationQueryContainer $queryContainer)
    {
        parent::__construct($queryContainer);
    }

    /**
     * @param \Generated\Shared\Transfer\CustomerGroupTransfer $customerGroupTransfer
     * @param \Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroup $customerGroupEntity
     *
     * @return void
     */
    protected function saveCustomers(CustomerGroupTransfer $customerGroupTransfer, SpyCustomerGroup $customerGroupEntity)
    {
        $defaultGroupRole = $this->queryContainer->queryDefaultCustomerOrganizationRole()->findOne();
        $idsCustomerToAssign = $customerGroupTransfer->getCustomerAssignment() ?
            $customerGroupTransfer->getCustomerAssignment()->getIdsCustomerToAssign() :
            [];

        foreach ($idsCustomerToAssign as $idCustomerToAssign) {
            $customerGroupToCustomerEntity = new SpyCustomerGroupToCustomer();
            $customerGroupToCustomerEntity->setFkCustomerGroup($customerGroupEntity->getIdCustomerGroup());
            $customerGroupToCustomerEntity->setFkCustomer($idCustomerToAssign);
            $customerGroupToCustomerEntity->setFkCustomerOrganizationRole($defaultGroupRole->getIdCustomerOrganizationRole());

            $customerGroupToCustomerEntity->save();
        }
    }
}
