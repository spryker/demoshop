<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Cms;

use Spryker\Zed\CmsUserConnector\Communication\Plugin\UserCmsVersionPostSavePlugin;
use Spryker\Zed\CmsUserConnector\Communication\Plugin\UserCmsVersionTransferExpanderPlugin;
use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Cms\CmsDependencyProvider as SprykerCmsDependencyProvider;

class CmsDependencyProvider extends SprykerCmsDependencyProvider
{

    /**
     * @param Container $container
     *
     * @return array
     */
    protected function getPostSavePlugins(Container $container)
    {
        return [
            new UserCmsVersionPostSavePlugin()
        ];
    }

    /**
     * @param Container $container
     *
     * @return array
     */
    protected function getTransferExpanderPlugins(Container $container)
    {
        return [
            new UserCmsVersionTransferExpanderPlugin()
        ];
    }

}
