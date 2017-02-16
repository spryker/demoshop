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
     * @return string[]
     */
    protected function getAdditionalSourceDirectoryGlobPatterns()
    {
        $directoryGlobPatterns = [];

        $directoryGlobPatterns[] = APPLICATION_VENDOR_DIR . '/spryker-eco/*/src/*/Shared/*/Transfer/';

        return $directoryGlobPatterns;
    }

}
