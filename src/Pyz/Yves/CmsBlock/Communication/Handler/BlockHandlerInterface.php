<?php

namespace Pyz\Yves\CmsBlock\Communication\Handler;

use Symfony\Component\HttpFoundation\Request;

interface BlockHandlerInterface
{

    /**
     * @param array $pageData
     * @param Request $request
     *
     * @return array
     */
    public function fetchBlocks(array $pageData, Request $request);

}
