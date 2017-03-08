<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Zed\Glossary;

use Spryker\Zed\Glossary\GlossaryConfig as SprykerGlossaryConfig;

class GlossaryConfig extends SprykerGlossaryConfig
{

    /**
     * @return array
     */
    public function getGlossaryFilePaths()
    {
        $projectFilePaths = glob(
            APPLICATION_SOURCE_DIR . '/*/*/*/Resources/glossary.yml'
        );

        /* Only needed in Project, not in demoshop  */
        $sprykerFilePaths = glob(
            APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/Spryker/*/*/Resources/glossary.yml'
        );

        $coreFilePaths = glob(
            APPLICATION_VENDOR_DIR . '/*/*/src/*/*/*/Resources/glossary.yml'
        );

        return array_merge($projectFilePaths, $sprykerFilePaths, $coreFilePaths);
    }
}
