<?php

namespace Pyz\Zed\Url\Persistence;

use SprykerFeature\Zed\Url\Persistence\UrlQueryContainerInterface as SprykerUrlQueryContainerInterface;
use Orm\Zed\Url\Persistence\SpyUrlQuery;


interface UrlQueryContainerInterface extends SprykerUrlQueryContainerInterface
{
    /**
     * @param $idPage
     * @return SpyUrlQuery
     */
    public function queryUrlByIdPage($idPage);
}
