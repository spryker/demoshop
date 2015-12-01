<?php

namespace Pyz\Zed\Url\Business;

use Generated\Shared\Url\UrlInterface;
use Pyz\Zed\Url\Persistence\UrlQueryContainerInterface;
use SprykerFeature\Zed\Url\Business\UrlManager as SprykerUrlManager;

class UrlManager extends SprykerUrlManager
{

    /** @var  UrlQueryContainerInterface */
    protected $urlQueryContainer;

    /**
     * @param $idPage
     * @param $idLocale
     * @return UrlInterface
     */
    public function getUrlByIdPage($idPage, $idLocale) {
        $urlEntity = $this->urlQueryContainer->queryUrlByIdPageAndLocale($idPage,$idLocale)->findOne();
        return $this->convertUrlEntityToTransfer($urlEntity);
    }

    /**
     * @param $idPage
     * @param $idLocale
     * @return UrlInterface
     */
    public function getOrCrateUrlByIdPage($idPage, $idLocale) {
        $urlEntity = $this->urlQueryContainer->queryUrlByIdPageAndLocale($idPage,$idLocale)->findOneOrCreate();
        return $this->convertUrlEntityToTransfer($urlEntity);
    }
}
