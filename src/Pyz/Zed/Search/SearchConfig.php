<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Search;

use Spryker\Zed\ProductSearch\Communication\Plugin\Installer;
use Spryker\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use Spryker\Zed\Search\SearchConfig as SprykerSearchConfig;

class SearchConfig extends SprykerSearchConfig
{

    /**
     * @return AbstractInstallerPlugin[]
     */
    public function getInstaller()
    {
        return [
            new Installer(),
        ];
    }

}
