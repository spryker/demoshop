<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Twig;

use Spryker\Shared\Kernel\KernelConstants;
use Spryker\Yves\Twig\TwigConfig as SprykerTwigConfig;

class TwigConfig extends SprykerTwigConfig
{

    /**
     * Only needed in Project, not in demoshop
     *
     * @param array $paths
     *
     * @return array
     */
    protected function addCoreTemplatePaths(array $paths)
    {
        $paths = parent::addCoreTemplatePaths($paths);

        $themeName = $this->getThemeName();
        $paths[] = $this->get(KernelConstants::SPRYKER_ROOT) . '/%1$s/src/Spryker/Yves/%1$s/Theme/' . $themeName;

        return $paths;
    }

}
