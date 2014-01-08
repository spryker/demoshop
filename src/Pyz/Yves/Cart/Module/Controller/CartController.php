<?php
namespace Pyz\Yves\Cart\Module\Controller;

use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Cart\Module\Controller\CartController as ProjectACartController;
use ProjectA\Yves\Library\Tracking\Tracking;

class CartController extends ProjectACartController
{

    public function indexAction()
    {
        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_CART)
            ->buildTracking();

        return parent::indexAction();
    }
}
