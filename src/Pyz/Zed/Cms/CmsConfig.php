<?php

namespace Pyz\Zed\Cms;

use SprykerFeature\Zed\Cms\CmsConfig as SprykerCmsConfig;

/**
 * Class CmsConfig
 *
 * @package Pyz\Zed\Cms
 */
class CmsConfig extends SprykerCmsConfig
{

    /**
     * @return string
     */
    public function getDemoDataPath()
    {
        return __DIR__ . '/File';
    }

    /**
     * @return string
     */
    public function getDemoDataContentKey()
    {
        return 'content';
    }

    /**
     * @return string
     */
    public function getDemoDataTemplate()
    {
        return '@Cms/template/static_full_page.twig';
    }

    /**
     * @return string
     */
    public function getDemoDataTemplateName()
    {
        return 'static full page';
    }
}
