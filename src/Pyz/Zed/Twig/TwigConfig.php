<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Twig;

use Spryker\Shared\Twig\TwigConstants;
use Spryker\Zed\Twig\TwigConfig as SprykerTwigConfig;

/**
 * @project Only needed in Project, not in demoshop
 */
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
    public function getZedDirectoryPathPattern()
    {
        $directories = [
            'src/*/Zed/*/Presentation',
            'vendor/spryker/spryker/Bundles/*/src/*/Zed/*/Presentation',
        ];

        $directories = array_merge($directories, glob('vendor/*/*/src/*/Zed/*/Presentation'));

        return $directories;
    }

    /**
     * @project Only needed in Project, not in demoshop
     *
     * @return array
     */
    public function getYvesDirectoryPathPattern()
    {
        $currentThemeName = $this->get(TwigConstants::YVES_THEME);

        $directories = parent::getYvesDirectoryPathPattern();

        $directories = array_merge($directories, glob('vendor/spryker/spryker/Bundles/*/src/*/Yves/*/Theme/' . $currentThemeName));
        $directories = array_merge($directories, glob('vendor/*/*/src/*/Yves/*/Theme/' . $currentThemeName));

        return $directories;
    }

}
