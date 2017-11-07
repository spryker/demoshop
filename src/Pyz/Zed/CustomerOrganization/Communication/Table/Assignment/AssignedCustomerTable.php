<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Table\Assignment;

class AssignedCustomerTable extends AbstractAssignmentTable
{
    /**
     * @var string
     */
    protected $defaultUrl = 'assigned-customer-table';

    /**
     * @return string
     */
    protected function getQuery()
    {
        return $this->tableQueryBuilder->buildAssignedQuery($this->idCustomerGroup);
    }

    /**
     * @return string
     */
    protected function getCheckboxCheckedAttribute()
    {
        return 'checked="checked"';
    }
}
