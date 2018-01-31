<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Transfer;

use Spryker\Zed\Transfer\TransferConfig as SprykerTransferConfig;

class TransferConfig extends SprykerTransferConfig
{
    /**
     * @project Only needed in Project, not in demoshop
     *
     * @return string[]
     */
    protected function getCoreSourceDirectoryGlobPatterns()
    {
        $directoryGlobPatterns = parent::getCoreSourceDirectoryGlobPatterns();
        $directoryGlobPatterns[] = APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/Spryker/Shared/*/Transfer/';
        $directoryGlobPatterns[] = APPLICATION_VENDOR_DIR . '/spryker/rabbit-mq/src/*/Shared/*/Transfer/';
        $directoryGlobPatterns[] = APPLICATION_VENDOR_DIR . '/spryker-eco/*/src/*/Shared/*/Transfer/';

        return $directoryGlobPatterns;
    }

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @return string[]
     */
    public function getDataBuilderSourceDirectories()
    {
        $globPatterns = parent::getDataBuilderSourceDirectories();
        $globPatterns[] = APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/tests/_data/';

        return $globPatterns;
    }
}
