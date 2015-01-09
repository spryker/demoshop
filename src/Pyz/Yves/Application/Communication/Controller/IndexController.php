<?php
namespace Pyz\Yves\Application\Communication\Controller;

use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Application\Communication\Controller\AbstractController;
use ProjectA\Yves\Library\Tracking\Tracking;

class IndexController extends AbstractController
{

    public function indexAction()
    {
         Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_HOME)
            ->buildTracking();
    }
}
