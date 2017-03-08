<?php
/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
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
        $globPatterns = parent::getNavigationSchemaPathPattern();
        $globPatterns[] = APPLICATION_SOURCE_DIR . '/*/Zed/*/Communication';

        /* Only needed in Project, not in demoshop  */
        $globPatterns[] = APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/src/*/Zed/*/Communication';

        return $globPatterns;
    }
}
