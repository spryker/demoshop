<?php

namespace Pyz\Zed\Cms;

use SprykerFeature\Zed\Cms\CmsConfig as SprykerCmsConfig;

class CmsConfig extends SprykerCmsConfig
{
    /**
     * @return string
     */
    public function getDemoDataPath()
    {
        return __DIR__ . '/File';
    }

    public function getDemoDataContentKey() {
        return 'content';
    }
}
