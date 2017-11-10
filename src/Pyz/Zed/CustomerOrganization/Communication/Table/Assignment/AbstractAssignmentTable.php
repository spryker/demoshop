<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Table\Assignment;

use Orm\Zed\Customer\Persistence\SpyCustomer;
use \Spryker\Zed\CustomerGroup\Communication\Table\Assignment\AbstractAssignmentTable as BaseAbstractAssignmentTable;
use Spryker\Zed\CustomerGroup\Dependency\Service\CustomerGroupToUtilEncodingInterface;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

abstract class AbstractAssignmentTable extends BaseAbstractAssignmentTable
{
    const PARAM_ID_CUSTOMER_GROUP = 'id-customer-organization';
    const COL_ROLE = 'Role';

    /**
     * @var \Pyz\Zed\CustomerOrganization\Communication\Table\Assignment\AssignmentCustomerQueryBuilder
     */
    protected $tableQueryBuilder;

    /**
     * @param \Pyz\Zed\CustomerOrganization\Communication\Table\Assignment\AssignmentCustomerQueryBuilder $tableQueryBuilder
     * @param \Spryker\Zed\CustomerGroup\Dependency\Service\CustomerGroupToUtilEncodingInterface $utilEncoding
     * @param int $idCustomerGroup
     */
    public function __construct(
        AssignmentCustomerQueryBuilderInterface $tableQueryBuilder,
        CustomerGroupToUtilEncodingInterface $utilEncoding,
        $idCustomerGroup
    ) {
        parent::__construct($tableQueryBuilder, $utilEncoding, $idCustomerGroup);
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return void
     */
    protected function configureHeader(TableConfiguration $config)
    {
        $config->setHeader([
            static::COL_SELECT_CHECKBOX => 'Select',
            static::COL_CUSTOMER_ID => 'ID',
            static::COL_CUSTOMER_EMAIL => 'Email',
            static::COL_CUSTOMER_FIRST_NAME => 'First Name',
            static::COL_CUSTOMER_LAST_NAME => 'Last Name',
            static::COL_ROLE => 'Role',
        ]);
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return void
     */
    protected function configureSorting(TableConfiguration $config)
    {
        $config->setDefaultSortField(
            static::COL_CUSTOMER_ID,
            TableConfiguration::SORT_ASC
        );

        $config->setSortable([
            static::COL_CUSTOMER_ID,
            static::COL_CUSTOMER_EMAIL,
            static::COL_CUSTOMER_FIRST_NAME,
            static::COL_CUSTOMER_LAST_NAME,
            static::COL_ROLE,
        ]);
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return void
     */
    protected function configureSearching(TableConfiguration $config)
    {
        $config->setSearchable([
            static::COL_CUSTOMER_ID,
            static::COL_CUSTOMER_EMAIL,
            static::COL_CUSTOMER_FIRST_NAME,
            static::COL_CUSTOMER_LAST_NAME,
            static::COL_ROLE,
        ]);
    }

    /**
     * @param \Orm\Zed\Customer\Persistence\SpyCustomer $customerEntity
     *
     * @return array
     */
    protected function getRow(SpyCustomer $customerEntity)
    {
        return [
            static::COL_SELECT_CHECKBOX => $this->getSelectCheckboxColumn($customerEntity),
            static::COL_CUSTOMER_ID => $customerEntity->getIdCustomer(),
            static::COL_CUSTOMER_EMAIL => $customerEntity->getEmail(),
            static::COL_CUSTOMER_FIRST_NAME => $customerEntity->getFirstName(),
            static::COL_CUSTOMER_LAST_NAME => $customerEntity->getLastName(),
            static::COL_ROLE => $customerEntity->getRole()
        ];
    }
}
