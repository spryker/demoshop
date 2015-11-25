<?php

namespace Pyz\Zed\Category\Business\Manager;
use Generated\Shared\Transfer\LocaleTransfer;
use Generated\Shared\Transfer\NodeTransfer;
use Generated\Shared\Transfer\PageTransfer;
use SprykerFeature\Zed\Category\Business\Generator\UrlPathGeneratorInterface;
use SprykerFeature\Zed\Category\Business\Manager\NodeUrlManager as SprykerNodeUrlManager;
use SprykerFeature\Zed\Category\Business\Tree\CategoryTreeReaderInterface;
use SprykerFeature\Zed\Category\Dependency\Facade\CategoryToUrlInterface;
use SprykerFeature\Zed\Cms\Business\CmsFacade;

class NodeUrlManager extends SprykerNodeUrlManager
{

    /**
     * @var CmsFacade CmsFacade
     */
    protected $cmsFacade;

    /**
     * @param CategoryTreeReaderInterface $categoryTreeReader
     * @param UrlPathGeneratorInterface $urlPathGenerator
     * @param CategoryToUrlInterface $urlFacade
     * @param CmsFacade $cmsFacade
     */
    public function __construct(
        CategoryTreeReaderInterface $categoryTreeReader,
        UrlPathGeneratorInterface $urlPathGenerator,
        CategoryToUrlInterface $urlFacade,
        CmsFacade $cmsFacade
    ) {
        parent::__construct($categoryTreeReader, $urlPathGenerator, $urlFacade);
        $this->cmsFacade = $cmsFacade;
    }

    /**
     * @param NodeTransfer $categoryNodeTransfer
     * @param LocaleTransfer $localeTransfer
     *
     * @return void
     */
    public function createUrl(NodeTransfer $categoryNodeTransfer, LocaleTransfer $localeTransfer)
    {
        $path = $this->categoryTreeReader->getPath($categoryNodeTransfer->getIdCategoryNode(), $localeTransfer);
        $categoryUrl = $this->generateUrlFromPathTokens($path);
        $idNode = $categoryNodeTransfer->getIdCategoryNode();

        $pageTransfer = new PageTransfer();
        $pageTransfer
            ->setFkCategoryNode($idNode)
            ->setFkTemplate(1)
            ->setIsActive(true);

        $pageTransfer = $this->cmsFacade->savePage($pageTransfer);
        $this->cmsFacade->touchPageActive($pageTransfer);

        $url = $this->cmsFacade->createPageUrl($pageTransfer, $categoryUrl);
        $this->urlFacade->touchUrlActive($url->getIdUrl());
    }
}
