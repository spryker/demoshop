<?php

namespace Pyz\Zed\Url\Persistence;

use SprykerFeature\Zed\Url\Persistence\UrlQueryContainerInterface as SprykerUrlQueryContainerInterface;
use Orm\Zed\Url\Persistence\SpyUrlQuery;


interface UrlQueryContainerInterface extends SprykerUrlQueryContainerInterface
{
    /**
     * @param int $idPage
     * @return SpyUrlQuery
     */
    public function queryUrlByIdPage($idPage);

    /**
     * @param $idPage
     * @param $idLocale
     * @return SpyUrlQuery
     */
    public function queryUrlByIdPageAndLocale($idPage, $idLocale);

    /**
     * @param int $abstractProductId
     * @return SpyUrlQuery
     */
    public function queryUrlByAbstractProductId($abstractProductId);
}
