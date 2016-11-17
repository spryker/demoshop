<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Updater;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class UpdaterConfig extends AbstractBundleConfig
{

    const RESOURCE_PRODUCT_STOCK = 'RESOURCE_PRODUCT_STOCK';

    /**
     * @return string
     */
    public function getImportDataDirectory()
    {
        return __DIR__ . '/Business/Internal/data/';
    }

}
