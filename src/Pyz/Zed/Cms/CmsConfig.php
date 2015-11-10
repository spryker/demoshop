<?php

namespace Pyz\Zed\Cms;

use SprykerFeature\Zed\Cms\CmsConfig as SprykerCmsConfig;

class CmsConfig extends SprykerCmsConfig
{
    const CATEGORY_TEMPLATE_FOLDER = 'CATEGORY_TEMPLATE_FOLDER';

    /**
     * @return string
     */
    public function getDemoDataPath()
    {
        return __DIR__.'/File';
    }

    /**
     * @return string
     */
    public function getDemoDataContentKey()
    {
        return 'content';
    }

    /**
     * @return array
     */
    public function getDemoDataTemplates()
    {
        return [
            'static'      => '@Cms/template/static_full_page.twig',
            'quotes'      => '@Cms/template/static_quotes_page.twig',
            'quote_block' => '@Cms/template/quotes_block.twig',
        ];
    }

    /**
     * @return array
     */
    public function getDemoDataTemplateNames()
    {
        return [
            'static'      => 'static full page',
            'quotes'      => 'static quotes page',
            'quote_block' => 'quotes block',
        ];
    }

    /**
     * @return array
     */
    public function getDemoDataFileNames()
    {
        return [
            'page'     => 'initial_pages_data.csv',
            'redirect' => 'initial_redirects_data.csv',
            'block'    => 'initial_blocks_data.csv',
        ];
    }

    /**
     * @param string $templateRelativePath
     *
     * @return string
     */
    public function getCategoryTemplateRealPath($templateRelativePath)
    {
        $templateRelativePath = mb_substr($templateRelativePath, 8);
        $physicalAddress      = $this->get(self::CATEGORY_TEMPLATE_FOLDER).$templateRelativePath;

        return $physicalAddress;
    }
}
