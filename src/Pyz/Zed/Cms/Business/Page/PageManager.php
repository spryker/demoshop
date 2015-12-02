<?php

namespace Pyz\Zed\Cms\Business\Page;

use SprykerEngine\Shared\Kernel\LocatorLocatorInterface;
use SprykerFeature\Zed\Cms\Business\Block\BlockManagerInterface;
use SprykerFeature\Zed\Cms\Business\Page\PageManager as SprykerPageManager;

use Generated\Shared\Category\NodeInterface;
use Generated\Shared\Cms\PageInterface;
use Generated\Shared\Product\AbstractProductInterface;
use Generated\Shared\Transfer\PageTransfer;
use Pyz\Zed\Cms\Persistence\CmsQueryContainer;
use SprykerFeature\Zed\Cms\Business\Template\TemplateManagerInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToGlossaryInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToTouchInterface;
use SprykerFeature\Zed\Cms\Dependency\Facade\CmsToUrlInterface;
use SprykerFeature\Zed\Cms\Persistence\CmsQueryContainerInterface;

class PageManager extends SprykerPageManager
{

    /** @var CmsQueryContainer */
    protected $cmsQueryContainer;

    public function __construct(
        CmsQueryContainerInterface $cmsQueryContainer,
        TemplateManagerInterface $templateManager,
        BlockManagerInterface $blockManager,
        CmsToGlossaryInterface $glossaryFacade,
        CmsToTouchInterface $touchFacade,
        CmsToUrlInterface $urlFacade,
        LocatorLocatorInterface $locator
    )
    {
        parent::__construct($cmsQueryContainer, $templateManager, $blockManager, $glossaryFacade, $touchFacade, $urlFacade, $locator);
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

}
