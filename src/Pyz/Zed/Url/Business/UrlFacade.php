<?php

namespace Pyz\Zed\Url\Business;

use Generated\Shared\Url\UrlInterface;
use Pyz\Zed\CmsBlock\Dependency\Facade\CmsBlockToUrlInterface;
use Pyz\Zed\OrderExporter\Dependency\Facade\OrderExporterToUrlFacade;
use SprykerFeature\Zed\Category\Dependency\Facade\CategoryToUrlInterface;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToUrlInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Url\Business\UrlFacade as SprykerUrlFacade;
use SprykerFeature\Zed\Url\Business\UrlDependencyContainer;
use Orm\Zed\Url\Persistence\Base\SpyUrl;

/**
 * @method UrlDependencyContainer getDependencyContainer()
 */
class UrlFacade extends SprykerUrlFacade implements
    CategoryToUrlInterface,
    CmsToUrlInterface,
    CmsBlockToUrlInterface,
    ProductToUrlInterface,
    OrderExporterToUrlFacade
{

    /**
     * @param $idPage
     * @param $idLocale
     * @return UrlInterface
     */
    public function getUrlByIdPage($idPage, $idLocale)
    {
        return $this->getDependencyContainer()->getUrlManager()->getUrlByIdPage($idPage, $idLocale);
    }

    /**
     * @param $idPage
     * @param $idLocale
     * @return UrlInterface
     */
    public function getOrCreateUrlByIdPage($idPage, $idLocale)
    {
        return $this->getDependencyContainer()->getUrlManager()->getOrCreateUrlByIdPage($idPage, $idLocale);
    }

    /**
     * @param int $idAbstractProduct
     * @return SpyUrl
     */
    public function getUrlByAbstractProductId($idAbstractProduct)
    {
        return $this->getDependencyContainer()->getUrlManager()->getUrlByAbstractProductId($idAbstractProduct);
    }

}
