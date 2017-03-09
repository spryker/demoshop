<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
