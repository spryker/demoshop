<?php

namespace Pyz\Zed\Propel;

use SprykerEngine\Zed\Propel\PropelConfig as SprykerPropelConfig;

class PropelConfig extends SprykerPropelConfig
{
    /**
     * @return array
     */
    public function getPropelSchemaPathPatterns()
    {
        $sprykerPathPatterns = parent::getPropelSchemaPathPatterns();

        return array_merge([
            __DIR__.'/../*/Persistence/Propel/Schema/',
        ], $sprykerPathPatterns);
    }
}
