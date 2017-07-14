<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category;

use Spryker\Zed\Category\CategoryConfig as CategoryCategoryConfig;
use Spryker\Zed\CmsBlockCategoryConnector\CmsBlockCategoryConnectorConfig;

class CategoryConfig extends CategoryCategoryConfig
{

    /**
     * @return array
     */
    public function getTemplateList()
    {
        return array_merge(
            parent::getTemplateList(),
            [
                CmsBlockCategoryConnectorConfig::CATEGORY_TEMPLATE_ONLY_CMS_BLOCK => '@Catalog/catalog/cms-block.twig',
                CmsBlockCategoryConnectorConfig::CATEGORY_TEMPLATE_WITH_CMS_BLOCK => '@Catalog/catalog/catalog-cms-block.twig',
            ]
        );
    }

}
