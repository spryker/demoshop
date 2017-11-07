<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Table\Assignment;

use \Spryker\Zed\CustomerGroup\Communication\Table\Assignment\AbstractAssignmentTable as BaseAbstractAssignmentTable;

abstract class AbstractAssignmentTable extends BaseAbstractAssignmentTable
{
    const PARAM_ID_CUSTOMER_GROUP = 'id-customer-organization';
}
