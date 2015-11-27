<?php

namespace Pyz\Zed\Url\Persistence;

use Orm\Zed\Url\Persistence\SpyUrlQuery;
use SprykerFeature\Zed\Url\Persistence\UrlQueryContainer as SprykerQueryContainer;

class UrlQueryContainer extends SprykerQueryContainer implements UrlQueryContainerInterface
{

    /**
     * @param $idPage
     * @return SpyUrlQuery
     */
    public function queryUrlByIdPage($idPage)
    {
        $query = SpyUrlQuery::create();
        $query->filterByFkResourcePage($idPage);
        return $query;
    }


}
