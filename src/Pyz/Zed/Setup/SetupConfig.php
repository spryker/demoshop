<?php

namespace Pyz\Zed\Setup;

use SprykerFeature\Zed\Setup\SetupConfig as SprykerSetupConfig;

class SetupConfig extends SprykerSetupConfig
{

    /**
     * Add schema path pattern for project schemas if needed.
     * Just want to prepare it because one of the projects will
     * definitely need this.
     *
     * @return array
     */
    public function getPropelSchemaPathPattern()
    {
        return array_merge(
            [APPLICATION_SOURCE_DIR . '/*/Zed/*/Persistence/Propel/Schema/'],
            parent::getPropelSchemaPathPattern()
        );
    }

}
