<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Cms;

use Spryker\Zed\CmsUserConnector\Communication\Plugin\UserCmsVersionPostSavePlugin;
use Spryker\Zed\Kernel\Container;

class CmsDependencyProvider extends \Spryker\Zed\Cms\CmsDependencyProvider
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

}
