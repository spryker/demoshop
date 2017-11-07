<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Table;

use Orm\Zed\Customer\Persistence\Map\SpyCustomerTableMap;
use Orm\Zed\CustomerGroup\Persistence\Map\SpyCustomerGroupToCustomerTableMap;
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
}
