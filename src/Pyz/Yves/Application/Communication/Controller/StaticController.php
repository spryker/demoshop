<?php
namespace Pyz\Yves\Application\Communication\Controller;

use ProjectA\Yves\Application\Communication\Controller\AbstractController;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\Request;

class StaticController extends AbstractController
{

    /**
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        $routeName = $request->attributes->get('_route');
        $content = 'static.pages.' . $routeName;

        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_STATIC)
            ->buildTracking();

        return $this->viewResponse(['data' => $content]);
    }
}
