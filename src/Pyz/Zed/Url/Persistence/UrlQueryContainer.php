<?php

namespace Pyz\Zed\Url\Persistence;

use Orm\Zed\Url\Persistence\SpyUrlQuery;
use SprykerFeature\Zed\Url\Persistence\UrlQueryContainer as SprykerQueryContainer;
use Orm\Zed\Url\Persistence\Base\SpyUrl;

class UrlQueryContainer extends SprykerQueryContainer implements UrlQueryContainerInterface
{

    /**
     * @param int $idPage
     * @return SpyUrlQuery
     */
    public function queryUrlByIdPage($idPage)
    {
        $query = SpyUrlQuery::create();
        $query->filterByFkResourcePage($idPage);
        return $query;
    }

    /**
     * @param int $abstractProductId
     * @param int $idLocale
     * @return SpyUrl
     */
    public function queryUrlByAbstractProductId($abstractProductId, $idLocale)
    {
        return SpyUrlQuery::create()
            ->useCmsPageQuery()
                ->filterByFkAbstractProduct($abstractProductId)
            ->endUse()
            ->filterByFkLocale($idLocale);
    }

    /**
     * @param $idPage
     * @param $idLocale
     * @return SpyUrlQuery
     */
    public function queryUrlByIdPageAndLocale($idPage, $idLocale)
    {
        $query = SpyUrlQuery::create();
        $query
            ->filterByFkResourcePage($idPage)
            ->filterByFkLocale($idLocale)
            ;
        return $query;
    }

}
