<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\ZedNavigation;

use Spryker\Zed\ZedNavigation\ZedNavigationConfig as SprykerZedNavigationConfig;

class ZedNavigationConfig extends SprykerZedNavigationConfig
{

    /**
     * @return array
     */
    public function getNavigationSchemaPathPattern()
    {
        $paths = parent::getNavigationSchemaPathPattern();

        return $paths;
    }

}
