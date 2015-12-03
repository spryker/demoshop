<?php

namespace Pyz\Zed\Cms\Dependency\Facade;

use Generated\Shared\CmsBlock\BlockInterface;
use PavFeature\Zed\CmsBlock\Business\Exception\CmsBlockNotFoundException;

interface CmsToCmsBlockFacade
{
    /**
     * @param int $idCmsPage
     * @param int $idCmsBlock
     * @param int $position
     */
    public function linkPageToBlock($idCmsPage, $idCmsBlock, $position = 999);

    /**
     * @param string $name
     * @return BlockInterface
     * @throws CmsBlockNotFoundException
     */
    public function getCmsBlockByName($name);

    /**
     * @return array
     */
    public function getDefaultBlockNames();
}
