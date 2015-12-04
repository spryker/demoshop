<?php

namespace Pyz\Zed\Url\Business;

use Generated\Shared\Transfer\UrlTransfer;
use Generated\Shared\Url\UrlInterface;
use Pyz\Zed\Url\Persistence\UrlQueryContainerInterface;
use SprykerFeature\Zed\Url\Business\UrlManager as SprykerUrlManager;
use Orm\Zed\Url\Persistence\Base\SpyUrl;

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
    public function getOrCreateUrlByIdPage($idPage, $idLocale) {
        $urlEntity = $this->urlQueryContainer->queryUrlByIdPageAndLocale($idPage,$idLocale)->findOneOrCreate();
        return $this->convertUrlEntityToTransfer($urlEntity);
    }

    /**
     * @param $abstractProductId
     * @return SpyUrl
     */
    public function getUrlByAbstractProductId($abstractProductId)
    {
        $idLocale = $this->localeFacade->getCurrentLocale()->getIdLocale();

        return  $this->urlQueryContainer->queryUrlByAbstractProductId($abstractProductId, $idLocale)
            ->findOne();
    }

    /**
     * @param int $idAbstractProduct
     * @param int $idLocale
     * @return UrlInterface
     */
    public function getUrlByIdAbstractProductAndIdLocale($idAbstractProduct, $idLocale) {


        $result = $this->urlQueryContainer->queryUrlByAbstractProductId($idAbstractProduct, $idLocale)
            ->findOne();

        $urlTransfer = new UrlTransfer();
        if ($result !== null) {
            $urlTransfer->fromArray($result->toArray(), true);
        }

        return $urlTransfer;

    }
}
