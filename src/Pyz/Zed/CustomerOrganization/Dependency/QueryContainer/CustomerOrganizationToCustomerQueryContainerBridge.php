<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Dependency\QueryContainer;

use \Spryker\Zed\CustomerGroup\Dependency\QueryContainer\CustomerGroupToCustomerQueryContainerBridge as BaseCustomerGroupToCustomerQueryContainerBridge;

class CustomerOrganizationToCustomerQueryContainerBridge extends BaseCustomerGroupToCustomerQueryContainerBridge implements CustomerOrganizationToCustomerQueryContainerInterface
{
}
