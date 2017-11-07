<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CustomerOrganization\Communication\Plugin\CustomerAnonymizer;

use \Spryker\Zed\CustomerGroup\Communication\Plugin\CustomerAnonymizer\RemoveCustomerFromGroupPlugin as BaseRemoveCustomerFromGroupPlugin;
use \Spryker\Zed\Customer\Dependency\Plugin\CustomerAnonymizerPluginInterface;

class RemoveCustomerFromOrganizationPlugin extends BaseRemoveCustomerFromGroupPlugin implements CustomerAnonymizerPluginInterface
{
}
