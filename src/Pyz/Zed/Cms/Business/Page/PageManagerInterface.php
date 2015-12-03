<?php

namespace Pyz\Zed\Cms\Business\Page;

use Generated\Shared\Transfer\PageTransfer;
use SprykerFeature\Zed\Cms\Business\Exception\MissingPageException;
use SprykerFeature\Zed\Cms\Business\Page\PageManagerInterface as SpyPageManagerInterface;

interface PageManagerInterface extends SpyPageManagerInterface
{

    /**
     * @param int $idCmsPage
     */
    public function linkDefaultBlocksToPage($idCmsPage);

    /**
     * @param PageTransfer $pageTransfer
     *
     * @throws MissingPageException
     *
     * @return PageTransfer
     */
    public function savePage(PageTransfer $pageTransfer);
}
