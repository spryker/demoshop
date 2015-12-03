<?php

namespace Pyz\Zed\CmsBlock;

use PavFeature\Zed\CmsBlock\CmsBlockConfig as PavFeatureCmsBlockConfig;
use Pyz\Shared\CmsBlock\CmsBlockConfig as CmsBlockConstants;

class CmsBlockConfig extends PavFeatureCmsBlockConfig
{
    /**
     * @return string
     */
    public function getBlockSchemaPath()
    {
        return __DIR__ . '/Schema/';
    }

    /**
     * @return array
     */
    public function getDefaultCmsBlocks()
    {
        return [
            CmsBlockConstants::DEFAULT_HEADER_BLOCK_NAME,
            CmsBlockConstants::DEFAULT_NAVIGATION_BLOCK_NAME,
            CmsBlockConstants::DEFAULT_FOOTER_COMMUNICATION_BLOCK_NAME,
            CmsBlockConstants::DEFAULT_FOOTER_PAYMENT_BLOCK_NAME,
            CmsBlockConstants::DEFAULT_FOOTER_NEWSLETTER_BLOCK_NAME,
            CmsBlockConstants::DEFAULT_FOOTER_NAVIGATION_BLOCK_NAME
        ];
    }
}
