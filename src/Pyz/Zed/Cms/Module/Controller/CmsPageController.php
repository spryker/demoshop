<?php

namespace Pyz\Zed\Cms\Module\Controller;

use Generated\Zed\Cms\Component\Dependency\CmsFacadeInterface;
use Generated\Zed\Cms\Component\Dependency\CmsFacadeTrait;
use ProjectA\Zed\Cms\Module\Controller\CmsPageController as ProjectACmsPageController;

class CmsPageController extends ProjectACmsPageController
{

    public function addAction()
    {
        $this->appendStyle('Cms/styles/template.css');
        parent::addAction();
    }

}
