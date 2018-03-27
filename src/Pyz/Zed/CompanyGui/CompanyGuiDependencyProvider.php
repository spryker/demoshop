<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\CompanyGui;

use Spryker\Zed\CompanySupplierGui\Communication\Plugin\CompanyTableActionViewSupply;
use Spryker\Zed\CompanyGuiExtension\Dependency\Plugin\CompanyTableActionExtensionInterface;
use Spryker\Zed\CompanyGui\CompanyGuiDependencyProvider as SprykerCompanyGuiDependencyProvider;

class CompanyGuiDependencyProvider extends SprykerCompanyGuiDependencyProvider
{
    /**
     * @return CompanyTableActionExtensionInterface[]
     */
    protected function getCompanyTableActionExtensionPlugins(): array
    {
        return [
            new CompanyTableActionViewSupply(),
        ];
    }
}
