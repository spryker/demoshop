<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Zed\Category\Business\Manager;

use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use SprykerEngine\Zed\Locale\Persistence\LocaleQueryContainer;
use SprykerFeature\Shared\Category\CategoryConfig;
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
     * @param NodeTransfer $categoryNodeTransfer
     * @param LocaleTransfer $localeTransfer
     *
     * @return void
     */
    public function createUrl(NodeTransfer $categoryNodeTransfer, LocaleTransfer $localeTransfer)
    {
        $categoryAttributes = $this->categoryQueryContainer->queryAttributeByCategoryId($categoryNodeTransfer->getFkCategory())->find();

        foreach ($categoryAttributes as $categoryAttribute) {
            $localeEntity = $this->localeQueryContainer->queryLocales()->filterByIdLocale($categoryAttribute->getFkLocale())->findOne();
            $localeTransfer = new LocaleTransfer();
            $localeTransfer->fromArray($localeEntity->toArray());

            $this->createLocalizedUrl($categoryNodeTransfer, $localeTransfer);
        }
    }

    /**
     * @param NodeTransfer $categoryNodeTransfer
     * @param LocaleTransfer $localeTransfer
     *
     * @return void
     */
    protected function createLocalizedUrl(NodeTransfer $categoryNodeTransfer, LocaleTransfer $localeTransfer)
    {
        $path = $this->categoryTreeReader->getPath($categoryNodeTransfer->getIdCategoryNode(), $localeTransfer);
        $categoryUrl = $this->generateUrlFromPathTokens($path);
        $idNode = $categoryNodeTransfer->getIdCategoryNode();
        $url = $this->urlFacade->createUrl('/' . mb_substr($localeTransfer->getLocaleName(), 0, 2) . $categoryUrl, $localeTransfer, CategoryConfig::RESOURCE_TYPE_CATEGORY_NODE, $idNode);
        $this->urlFacade->touchUrlActive($url->getIdUrl());
    }

}
