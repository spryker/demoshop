<?php

namespace Pyz\Yves\CmsBlock\Dependency\Plugin;

use Symfony\Component\HttpFoundation\Request;

interface BlockControllerInterface
{

    /**
     * @return string
     */
    public function getBlockName();

    /**
     * @param array $pageAttributes
     * @param Request $request
     *
     * @return array
     */
    public function blockAction(array $pageAttributes, Request $request);
}
