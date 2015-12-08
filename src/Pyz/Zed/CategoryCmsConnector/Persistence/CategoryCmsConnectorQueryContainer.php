<?php

namespace Pyz\Zed\CategoryCmsConnector\Persistence;

use Orm\Zed\Category\Persistence\Map\SpyCategoryAttributeTableMap;
use Orm\Zed\Category\Persistence\Map\SpyCategoryNodeTableMap;
use Orm\Zed\Category\Persistence\SpyCategoryNodeQuery;
use Orm\Zed\Category\Persistence\SpyCategoryQuery;
use Orm\Zed\Cms\Persistence\Map\SpyCmsPageTableMap;
use Orm\Zed\Cms\Persistence\SpyCmsPageQuery;
use Orm\Zed\Url\Persistence\Map\SpyUrlTableMap;
use PavFeature\Zed\CategoryCmsConnector\Persistence\CategoryCmsConnectorQueryContainer as PavFeatureCategoryCmsConnectorQueryContainer;
use Propel\Runtime\ActiveQuery\Criteria;
use Pyz\Zed\Category\Persistence\CategoryQueryContainer;
use Pyz\Zed\CategoryCmsConnector\CategoryCmsConnectorDependencyProvider;


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

    /**
     * @param int $idLocale
     * @param int|null $idDefaultPage
     *
     * @return SpyCmsPageQuery
     */
    public function queryCategoriesNotLinkedToPage($idLocale, $idDefaultPage = null)
    {
        $categoryQueryContainer = $this->getCategoryQueryContainer();
        $categoryQuery = $categoryQueryContainer->queryCategory($idLocale)
            ->addJoin(
                SpyCategoryNodeTableMap::COL_ID_CATEGORY_NODE,
                SpyCmsPageTableMap::COL_FK_CATEGORY_NODE,
                Criteria::LEFT_JOIN
            )
            ->addAnd(
                SpyCmsPageTableMap::COL_ID_CMS_PAGE,
                null,
                Criteria::ISNULL
            )
        ;

        if ($idDefaultPage !== null) {
            $categoryQuery->addOr(
                SpyCmsPageTableMap::COL_ID_CMS_PAGE,
                $idDefaultPage,
                Criteria::EQUAL
            );
        }

        return $categoryQuery;
    }

    /**
     * @throws \ErrorException
     * @return CategoryQueryContainer
     */
    protected function getCategoryQueryContainer()
    {
        return $this->getProvidedDependency(CategoryCmsConnectorDependencyProvider::QUERY_CONTAINER_CATEGORY);
    }
}
