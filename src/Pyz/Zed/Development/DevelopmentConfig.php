<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Development;

use Spryker\Zed\Development\DevelopmentConfig as SprykerDevelopmentConfig;

class DevelopmentConfig extends SprykerDevelopmentConfig
{

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @return array
     */
    public function getIdeAutoCompletionSourceDirectoryGlobPatterns()
    {
        $globPatterns = parent::getIdeAutoCompletionSourceDirectoryGlobPatterns();
        $globPatterns[APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/'] = 'Spryker/*/';

        return $globPatterns;
    }

    /**
     * @return string
     */
    public function getCodingStandard()
    {
        $vendorDir = APPLICATION_ROOT_DIR . DIRECTORY_SEPARATOR;

        return $vendorDir . 'config/ruleset.xml';
    }

}
