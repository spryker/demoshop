<?php


namespace Pyz\Zed\Category;


use Spryker\Zed\CmsBlockCategoryConnector\CmsBlockCategoryConnectorConfig;

class CategoryConfig extends \Spryker\Zed\Category\CategoryConfig
{

    /**
     * @return array
     */
    public function getTemplateList()
    {
        return array_merge(
            parent::getTemplateList(), [
                CmsBlockCategoryConnectorConfig::CATEGORY_TEMPLATE_ONLY_CMS_BLOCK => '@Catalog/catalog/cms-block.twig',
                CmsBlockCategoryConnectorConfig::CATEGORY_TEMPLATE_WITH_CMS_BLOCK => '@Catalog/catalog/catalog-cms-block.twig',
            ]
        );
    }

}