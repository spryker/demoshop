<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Pyz\Shared\Navigation\KeyBuilder;

use Spryker\Shared\KeyBuilder\SharedResourceKeyBuilder;
use Spryker\Shared\Navigation\NavigationConfig;

class NavigationKeyBuilder extends SharedResourceKeyBuilder
{

    /**
     * @return string
     */
    protected function getResourceType()
    {
        return NavigationConfig::RESOURCE_TYPE_NAVIGATION_MENU;
    }

}
