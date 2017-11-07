<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Table;

use Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroup;
use \Spryker\Zed\CustomerGroup\Communication\Table\CustomerGroupTable as BaseCustomerGroupTable;

class CustomerOrganizationTable extends BaseCustomerGroupTable
{
    /**
     * @param \Orm\Zed\CustomerGroup\Persistence\SpyCustomerGroup|null $customerGroup
     *
     * @return string
     */
    protected function buildLinks(SpyCustomerGroup $customerGroup = null)
    {
        if ($customerGroup === null) {
            return '';
        }

        $buttons = [];
        $buttons[] = $this->generateViewButton('/customer-organization/view?id-customer-organization=' . $customerGroup->getIdCustomerGroup(), 'View');
        $buttons[] = $this->generateEditButton('/customer-organization/edit?id-customer-organization=' . $customerGroup->getIdCustomerGroup(), 'Edit');

        return implode(' ', $buttons);
    }
}
