<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Search;

use SprykerFeature\Zed\ProductSearch\Communication\Plugin\Installer;
use SprykerFeature\Zed\Installer\Communication\Plugin\AbstractInstallerPlugin;
use SprykerFeature\Zed\Search\SearchConfig as SprykerSearchConfig;

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
