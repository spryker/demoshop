<?php

namespace Pyz\Zed\Transfer;

use SprykerEngine\Zed\Transfer\TransferConfig as SprykerTransferConfig;

class TransferConfig extends SprykerTransferConfig
{
    /**
     * @return array
     */
    public function getSourceDirectories()
    {
        $directories = parent::getSourceDirectories();
        $directories[] = APPLICATION_VENDOR_DIR . '/project-a/spryker/Bundles/*/src/*/Shared/*/Transfer/';

        return $directories;
    }
}
