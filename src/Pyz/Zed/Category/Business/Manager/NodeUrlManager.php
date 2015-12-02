<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Category\Business\Manager;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\UrlTransfer;
use SprykerEngine\Zed\Locale\Persistence\LocaleQueryContainer;
use SprykerFeature\Zed\Category\Business\Generator\UrlPathGeneratorInterface;
use SprykerFeature\Zed\Category\Business\Manager\NodeUrlManager as SprykerNodeUrlManager;
use SprykerFeature\Zed\Category\Business\Tree\CategoryTreeReaderInterface;
use SprykerFeature\Zed\Category\Dependency\Facade\CategoryToUrlInterface;
use SprykerFeature\Zed\Category\Persistence\CategoryQueryContainer;

class NodeUrlManager extends SprykerNodeUrlManager
{

    /**
     * @var CategoryQueryContainer
     */
    protected $categoryQueryContainer;

    /**
     * @var LocaleQueryContainer
     */
    protected $localeQueryContainer;

    public function __construct(
        CategoryTreeReaderInterface $categoryTreeReader,
        UrlPathGeneratorInterface $urlPathGenerator,
        CategoryToUrlInterface $urlFacade,
        CategoryQueryContainer $categoryQueryContainer,
        LocaleQueryContainer $localeQueryContainer
    ) {
        parent::__construct($categoryTreeReader, $urlPathGenerator, $urlFacade);
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->localeQueryContainer = $localeQueryContainer;
    }

    /**
     * @param UrlTransfer $urlTransfer
     * @param string $url
     * @param null $idResource
     * @param null $idLocale
     *
     * @return void
     */
    protected function updateTransferUrl(UrlTransfer $urlTransfer, $url, $idResource = null, $idLocale = null)
    {
        if ($idLocale === null) {
            $idLocale = $urlTransfer->getFkLocale();
        }

        $localeTransfer = new LocaleTransfer();
        $localeTransfer->fromArray(
            $this->localeQueryContainer
                ->queryLocales()
                ->filterByIdLocale($idLocale)
                ->findOne()
                ->toArray()
        );
        $locale = mb_substr($localeTransfer->getLocaleName(), 0, 2);

        if (strstr($url, $locale) === false) {
            $url = '/' . $locale . $url;
        }

        parent::updateTransferUrl($urlTransfer, $url, $idResource, $idLocale);
    }

}
