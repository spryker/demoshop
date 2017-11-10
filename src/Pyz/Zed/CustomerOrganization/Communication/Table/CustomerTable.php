<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Table;

use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerGroupToCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroupToCustomer;
use Propel\Runtime\ActiveQuery\Criteria;
use \Spryker\Zed\CustomerGroup\Communication\Table\CustomerTable as BaseCustomerTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;

class CustomerTable extends BaseCustomerTable
{
    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config)
    {
        $config->setHeader([
            static::COL_FK_CUSTOMER => '#',
            static::COL_FIRST_NAME => 'First Name',
            static::COL_LAST_NAME => 'Last Name',
            static::COL_GENDER => 'Gender',
            static::ACTIONS => self::ACTIONS,
        ]);

        $config->addRawColumn(self::ACTIONS);

        $config->setSortable([
            static::COL_FK_CUSTOMER,
            static::COL_FIRST_NAME,
            static::COL_LAST_NAME,
            static::COL_GENDER,
        ]);

        $config->setUrl(sprintf('table?id-customer-organization=%d', $this->customerGroupTransfer->getIdCustomerGroup()));

        $config->setSearchable([
            SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER,
            SpyCustomerTableMap::COL_EMAIL,
            SpyCustomerTableMap::COL_FIRST_NAME,
            SpyCustomerTableMap::COL_LAST_NAME,
            SpyCustomerTableMap::COL_GENDER,
        ]);

        return $config;
    }

    /**
     * @param SpyCustomerGroupToCustomer $customerGroupToCustomerEntity
     *
     * @return string
     */
    protected function buildLinks(SpyCustomerGroupToCustomer $customerGroupToCustomerEntity)
    {
        $buttons = parent::buildLinks($customerGroupToCustomerEntity);

        $cartButton = $this->generateViewButton(
            sprintf('/customer/cart?id-customer=%d', $customerGroupToCustomerEntity->getFkCustomer()),
            'Cart'
        );

        return $buttons . ' ' . $cartButton;
    }

    protected function prepareQuery()
    {
        $query = $this->customerGroupQueryContainer
            ->queryCustomerGroupToCustomerByFkCustomerGroup($this->customerGroupTransfer->getIdCustomerGroup())
            ->addJoin(
                SpyCustomerGroupToCustomerTableMap::COL_FK_CUSTOMER,
                SpyCustomerTableMap::COL_ID_CUSTOMER,
                Criteria::LEFT_JOIN
            )
            ->addAnd(SpyCustomerTableMap::COL_ANONYMIZED_AT, null, Criteria::ISNULL)
            ->withColumn(SpyCustomerTableMap::COL_FIRST_NAME, static::COL_FIRST_NAME)
            ->withColumn(SpyCustomerTableMap::COL_LAST_NAME, static::COL_LAST_NAME)
            ->withColumn(SpyCustomerTableMap::COL_EMAIL, static::COL_EMAIL)
            ->withColumn(SpyCustomerTableMap::COL_GENDER, static::COL_GENDER);

        return $query;
    }


}
