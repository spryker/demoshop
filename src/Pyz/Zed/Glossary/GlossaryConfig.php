<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
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
        $paths = parent::getGlossaryFilePaths();
        $paths = $this->addSprykerFilePath($paths);

        return $paths;
    }

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @param array $paths
     *
     * @return array
     */
    private function addSprykerFilePath($paths)
    {
        $paths = array_merge(
            $paths,
            glob(APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/Spryker/*/*/Resources/glossary.yml')
        );

        return $paths;
    }

}
