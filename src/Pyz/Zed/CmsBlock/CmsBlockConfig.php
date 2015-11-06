<?php

namespace Pyz\Zed\CmsBlock;

use PavFeature\Zed\CmsBlock\CmsBlockConfig as PavFeatureCmsBlockConfig;

class CmsBlockConfig extends PavFeatureCmsBlockConfig
{
    /**
     * @return string
     */
    public function getBlockSchemaPath()
    {
        return __DIR__ . '/Schema/';
    }
}
