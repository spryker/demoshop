<?php

namespace Pyz\Zed\CategoryCmsConnector\Persistence;

use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use PavFeature\Zed\CategoryCmsConnector\Persistence\CategoryCmsConnectorQueryContainer as PavFeatureCategoryCmsConnectorQueryContainer;
use Propel\Runtime\ActiveQuery\Criteria;

class CategoryCmsConnectorQueryContainer extends PavFeatureCategoryCmsConnectorQueryContainer
{
    /**
     * @param string $categoryName
     *
     * @return SpyCategoryNodeQuery
     */
    public function queryNodeByCategoryName($categoryName)
    {
        return SpyCategoryNodeQuery::create()
            ->useCategoryQuery()
            ->innerJoinAttribute()
            ->addAnd(
                SpyCategoryAttributeTableMap::COL_NAME,
                $categoryName,
                Criteria::EQUAL
            )
            ->endUse();
    }

    /**
     * @param string $urlPath
     *
     * @return SpyCmsPageQuery
     */
    public function queryPageByUrlPath($urlPath)
    {
        return SpyCmsPageQuery::create()
            ->innerJoinSpyUrl()
            ->addAnd(
                SpyUrlTableMap::COL_URL,
                $urlPath,
                Criteria::EQUAL
            );
    }
}
