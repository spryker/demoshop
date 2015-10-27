<?php

namespace Pyz\Zed\Application;

use SprykerFeature\Zed\Application\ApplicationConfig as SprykerApplicationConfig;

class ApplicationConfig extends SprykerApplicationConfig
{
    /**
     * @return array
     */
    public function getNavigationSchemaPathPattern()
    {
        $directories = parent::getNavigationSchemaPathPattern();
        $directories[] = APPLICATION_VENDOR_DIR . '/project-a/spryker/Bundles/*/src/*/Zed/*/Communication';
        $directories[] = APPLICATION_ROOT_DIR . '/src/Pyz/Zed/*/Communication';

        return $directories;
    }
}
