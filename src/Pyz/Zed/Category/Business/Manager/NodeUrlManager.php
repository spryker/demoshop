<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Category\Business\Manager;

use Generated\Shared\Transfer\UrlTransfer;
use Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface;
use Spryker\Zed\Category\Business\Manager\NodeUrlManager as SprykerNodeUrlManager;
use Spryker\Zed\Category\Business\Tree\CategoryTreeReaderInterface;
use Spryker\Zed\Category\Dependency\Facade\CategoryToUrlInterface;
use Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface;
use Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface;

class NodeUrlManager extends SprykerNodeUrlManager
{

    /**
     * @var \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface
     */
    protected $categoryQueryContainer;

    /**
     * @var \Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface
     */
    protected $localeQueryContainer;

    /**
     * @param \Spryker\Zed\Category\Business\Tree\CategoryTreeReaderInterface $categoryTreeReader
     * @param \Spryker\Zed\Category\Business\Generator\UrlPathGeneratorInterface $urlPathGenerator
     * @param \Spryker\Zed\Category\Dependency\Facade\CategoryToUrlInterface $urlFacade
     * @param \Spryker\Zed\Category\Persistence\CategoryQueryContainerInterface $categoryQueryContainer
     * @param \Spryker\Zed\Locale\Persistence\LocaleQueryContainerInterface $localeQueryContainer
     */
    public function __construct(
        CategoryTreeReaderInterface $categoryTreeReader,
        UrlPathGeneratorInterface $urlPathGenerator,
        CategoryToUrlInterface $urlFacade,
        CategoryQueryContainerInterface $categoryQueryContainer,
        LocaleQueryContainerInterface $localeQueryContainer
    ) {
        parent::__construct($categoryTreeReader, $urlPathGenerator, $urlFacade);
        $this->categoryQueryContainer = $categoryQueryContainer;
        $this->localeQueryContainer = $localeQueryContainer;
    }

    /**
     * @param \Generated\Shared\Transfer\UrlTransfer $urlTransfer
     * @param string $url
     * @param int|null $idResource
     * @param int|null $idLocale
     *
     * @return void
     */
    protected function updateTransferUrl(UrlTransfer $urlTransfer, $url, $idResource = null, $idLocale = null)
    {
        if ($idLocale === null) {
            $idLocale = $urlTransfer->getFkLocale();
        }

        $localeEntity = $this->localeQueryContainer
            ->queryLocales()
            ->filterByIdLocale($idLocale)
            ->findOne();

        $locale = mb_substr($localeEntity->getLocaleName(), 0, 2);

        if ($url === '/' || strpos('/' . $locale . '/', $url) !== 0) {
            $url = '/' . $locale . $url;
        }

        $url = $this->generateUniqueUrl($url);

        parent::updateTransferUrl($urlTransfer, $url, $idResource, $idLocale);
    }

    /**
     * @param string $url
     *
     * @return string
     */
    protected function generateUniqueUrl($url)
    {
        $max = 20;
        $step = 1;

        $originalUrl = $url;
        while ($this->urlFacade->hasUrl($url)) {
            $url = $originalUrl . '-'. $step;
            if ($step >  $max) {
                break;
            }
            $step++;
        }

        return $url;
    }

}
