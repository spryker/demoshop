<?php

namespace Pyz\Zed\CmsBlock\Dependency\Facade;

use Generated\Shared\Transfer\UrlTransfer;

interface CmsBlockToUrlInterface
{

    /**
     * @param $urlString
     *
     * @return UrlTransfer
     */
    public function getUrlByPath($urlString);

}
