<?php

namespace Pyz\Zed\Url\Business;

use Generated\Shared\Url\UrlInterface;
use Pyz\Zed\CmsBlock\Dependency\Facade\CmsBlockToUrlInterface;
use SprykerFeature\Zed\Category\Dependency\Facade\CategoryToUrlInterface;
use SprykerFeature\Zed\Product\Dependency\Facade\ProductToUrlInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Url\Business\UrlFacade as SprykerUrlFacade;
use SprykerFeature\Zed\Url\Business\UrlDependencyContainer;

/**
 * @method UrlDependencyContainer getDependencyContainer()
 */
class UrlFacade extends SprykerUrlFacade implements
    CategoryToUrlInterface,
    CmsToUrlInterface,
    CmsBlockToUrlInterface,
    ProductToUrlInterface
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
}
