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
     * @return UrlInterface
     */
    public function getUrlByIdPage($idPage) {
        $urlEntity = $this->urlQueryContainer->queryUrlByIdPage($idPage)->findOne();
        return $this->convertUrlEntityToTransfer($urlEntity);
    }
}
