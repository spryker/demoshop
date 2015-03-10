<?php
namespace Pyz\Yves\Application\Communication\Controller;

use Pyz\Yves\Library\Tracking\PageTypeInterface;
use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use ProjectA\Yves\Library\Tracking\Tracking;

class IndexController extends \SprykerCore\Yves\Application\Communication\Controller\AbstractController
{

    public function indexAction()
    {
         Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_HOME)
            ->buildTracking();
    }
}
