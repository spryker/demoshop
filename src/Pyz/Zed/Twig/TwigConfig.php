<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Twig;

use Spryker\Zed\Twig\TwigConfig as SprykerTwigConfig;

class TwigConfig extends SprykerTwigConfig
{

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @param array $paths
     *
     * @return array
     */
    protected function addCoreTemplatePaths(array $paths)
    {
        $paths = parent::addCoreTemplatePaths($paths);
        $paths[] = $this->getBundlesDirectory() . '/%2$s/src/Spryker/Zed/%1$s/Presentation/';

        return $paths;
    }

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @return array
     */
    public function getZedDirectoryPathPatterns()
    {
        $directories = glob('vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Presentation');
        $directories = array_merge(
            $directories,
            parent::getZedDirectoryPathPatterns()
        );

        return $directories;
    }

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @return array
     */
    public function getYvesDirectoryPathPatterns()
    {
        $directories = glob('vendor/spryker/spryker/Bundles/*/src/*/Yves/*/Theme');
        $directories = array_merge(
            $directories,
            parent::getYvesDirectoryPathPatterns()
        );

        return $directories;
    }

}
