<?php
namespace Pyz\Yves\Application\Communication\Controller;

use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Library\Controller\Controller;
use ProjectA\Yves\Library\Tracking\Tracking;

class IndexController extends Controller
{

    public function indexAction()
    {
         Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_HOME)
            ->buildTracking();
    }
}
