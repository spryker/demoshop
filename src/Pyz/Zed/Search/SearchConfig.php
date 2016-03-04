<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Search;

use Spryker\Zed\ProductSearch\Communication\Plugin\Installer;
use Spryker\Zed\Search\SearchConfig as SprykerSearchConfig;

class SearchConfig extends SprykerSearchConfig
{

    /**
     * @return \Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin[]
     */
    public function getInstaller()
    {
        return [
            new Installer(),
        ];
    }

}
