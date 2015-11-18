<?php

namespace Pyz\Zed\Propel;

use SprykerEngine\Zed\Propel\PropelConfig as SprykerPropelConfig;

class PropelConfig extends SprykerPropelConfig
{
    public function getPropelSchemaPathPatterns()
    {
        return array_merge(
            [APPLICATION_SOURCE_DIR.'/*/Zed/*/Persistence/Propel/Schema/'],
            parent::getPropelSchemaPathPatterns()
        );
    }
}
