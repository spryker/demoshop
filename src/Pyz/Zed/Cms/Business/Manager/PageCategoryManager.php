<?php

namespace Pyz\Zed\Cms\Business\Manager;

use Generated\Shared\Category\NodeInterface;
use Generated\Shared\Cms\PageInterface;
use Generated\Shared\Transfer\PageTransfer;
use PavFeature\Zed\Cms\Persistence\CmsQueryContainer;

class PageCategoryManager
{

    protected $cmsQueryContainer;

    public function __construct(CmsQueryContainer $cmsQueryContainer) {
        $this->cmsQueryContainer = $cmsQueryContainer;
    }

    /**
     * @param NodeInterface $nodeTransfer
     * @return PageInterface
     */
    public function getPageByCategoryNode(NodeInterface $nodeTransfer) {
        $query = $this->cmsQueryContainer->queryPageByCategoryNodeId($nodeTransfer->getFkCategory());

        $pageEntity = $query->findOne();
        $pageTransfer = new PageTransfer();
        $pageTransfer->fromArray($pageEntity->toArray());

        return $pageTransfer;
    }

}
