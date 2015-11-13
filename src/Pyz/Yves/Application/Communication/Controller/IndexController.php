<?php

namespace Pyz\Yves\Application\Communication\Controller;

use PavFeature\Yves\Tracking\Business\ContentGroupConstants;
use PavFeature\Yves\Tracking\Business\PageTypeConstants;
use Pyz\Yves\Tracking\Business\Tracking;
use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;

class IndexController extends AbstractController
{

    public function indexAction()
    {
        Tracking::getInstance()->getPageDataContainer()
            ->setPageType(PageTypeConstants::PAGE_TYPE_HOME)
            ->addContentGroupElement(ContentGroupConstants::CONTENT_GROUP_HOMEPAGE)
        ;
    }

}
