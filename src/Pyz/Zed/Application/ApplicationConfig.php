<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Application;

use Spryker\Zed\Application\ApplicationConfig as SprykerApplicationConfig;

class ApplicationConfig extends SprykerApplicationConfig
{

    /**
     * @return array
     */
    public function getNavigationSchemaPathPattern()
    {
        $pattern = parent::getNavigationSchemaPathPattern();

        $pattern[] = APPLICATION_ROOT_DIR . '/src/*/Zed/*/Communication';

        return $pattern;
    }

}
