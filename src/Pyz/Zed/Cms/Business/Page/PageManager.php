<?php

namespace Pyz\Zed\Cms\Business\Page;

use Generated\Shared\CmsBlock\BlockInterface;
use Pyz\Shared\CmsBlock\CmsBlockConfig;
use Pyz\Zed\Cms\Dependency\Facade\CmsToCmsBlockFacade;
use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerFeature\Zed\Cms\Business\Block\BlockManagerInterface;
use PavFeature\Zed\Cms\Business\Model\PageManager as PavPageManager;
use Generated\Shared\Category\NodeInterface;
use Generated\Shared\Cms\PageInterface;
use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Transfer\PageTransfer;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;
use SprykerFeature\Zed\Cms\Business\Exception\MissingPageException;
use SprykerFeature\Zed\Cms\Business\Exception\MissingTemplateException;
use SprykerFeature\Zed\Cms\Business\Exception\PageExistsException;
use SprykerFeature\Zed\Cms\Business\Template\TemplateManagerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToTouchInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Cms\Persistence\CmsQueryContainerInterface;

class PageManager extends PavPageManager
{

    /** @var CmsQueryContainer */
    protected $cmsQueryContainer;

    /**
     * @var CmsToCmsBlockFacade
     */
    protected $cmsBlockFacade;

    /**
     * @param CmsQueryContainerInterface $cmsQueryContainer
     * @param TemplateManagerInterface $templateManager
     * @param BlockManagerInterface $blockManager
     * @param CmsToGlossaryInterface $glossaryFacade
     * @param CmsToTouchInterface $touchFacade
     * @param CmsToUrlInterface $urlFacade
     * @param LocatorLocatorInterface $locator
     * @param CmsToCmsBlockFacade $cmsBlockFacade
     */
    public function __construct(
        CmsQueryContainerInterface $cmsQueryContainer,
        TemplateManagerInterface $templateManager,
        BlockManagerInterface $blockManager,
        CmsToGlossaryInterface $glossaryFacade,
        CmsToTouchInterface $touchFacade,
        CmsToUrlInterface $urlFacade,
        LocatorLocatorInterface $locator,
        CmsToCmsBlockFacade $cmsBlockFacade
    )
    {
        parent::__construct($cmsQueryContainer, $templateManager, $blockManager, $glossaryFacade, $touchFacade, $urlFacade, $locator);
        $this->cmsBlockFacade = $cmsBlockFacade;
    }

    /**
     * @param NodeInterface $nodeTransfer
     * @return PageInterface
     */
    public function getPageByCategoryNode(NodeInterface $nodeTransfer)
    {
        $query = $this->cmsQueryContainer->queryPageByCategoryNodeId($nodeTransfer->getFkCategory());
        $pageEntity = $query->findOne();

        $pageTransfer = $this->convertPageEntityToTransfer($pageEntity);

        return $pageTransfer;
    }

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @return PageTransfer
     */
    public function getOrCreatePageByAbstractProduct(AbstractProductInterface $abstractProductTransfer)
    {
        $query = $this->cmsQueryContainer->queryPageByAbstractProductId($abstractProductTransfer->getIdAbstractProduct());

        $pageEntity = $query->findOneOrCreate();
        $pageTransfer = $this->convertPageEntityToTransfer($pageEntity);
        return $pageTransfer;
    }

    /**
     * @param AbstractProductInterface $abstractProductTransfer
     * @return PageTransfer
     */
    public function getPageByAbstractProduct(AbstractProductInterface $abstractProductTransfer)
    {
        $query = $this->cmsQueryContainer->queryPageByAbstractProductId($abstractProductTransfer->getIdAbstractProduct());

        $pageEntity = $query->findOne();
        $pageTransfer = $this->convertPageEntityToTransfer($pageEntity);
        return $pageTransfer;
    }

    /**
     * @param int $idCmsPage
     */
    public function linkDefaultBlocksToPage($idCmsPage)
    {
        $defaultCmsBlockNames = $this->cmsBlockFacade->getDefaultBlockNames();
        $position = 0;
        foreach ($defaultCmsBlockNames as $defaultCmsBlockName) {
            $position ++;
            $cmsBlock = $this->getCmsBlockByName($defaultCmsBlockName);
            $this->cmsBlockFacade->linkPageToBlock($idCmsPage, $cmsBlock->getIdCmsBlock(), $position);
        }
    }

    /**
     * @param string $blockName
     * @return BlockInterface
     */
    protected function getCmsBlockByName($blockName)
    {
        return $this->cmsBlockFacade->getCmsBlockByName($blockName);
    }

    /**
     * @param PageTransfer $page
     *
     * @throws MissingTemplateException
     * @throws MissingPageException
     * @throws PageExistsException
     *
     * @return PageTransfer
     */
    public function savePage(PageTransfer $page)
    {
        $this->checkTemplateExists($page->getFkTemplate());

        if (is_null($page->getIdCmsPage())) {
            $pageEntity = $this->createPage($page);
            $this->linkDefaultBlocksToPage($pageEntity->getIdCmsPage());
            return $pageEntity;
        } else {
            return $this->updatePage($page);
        }
    }

}
