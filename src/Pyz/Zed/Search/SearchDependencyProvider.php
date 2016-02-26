<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Search;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\ProductSearch\Communication\Plugin\Installer as ProductSearchInstaller;
use Spryker\Zed\Search\SearchDependencyProvider as SprykerSearchDependencyProvider;

class SearchDependencyProvider extends SprykerSearchDependencyProvider
{

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin[]
     */
    protected function getInstallers(Container $container)
    {
        return [
            new ProductSearchInstaller(),
        ];
    }


}
