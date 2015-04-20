<?php
namespace Pyz\Yves\Application\Communication\Controller;

use SprykerCore\Yves\Application\Communication\Controller\AbstractController;
use ProjectA\Yves\Library\Tracking\PageTypeInterface;
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

        return $this->viewResponse(['data' => $content]);
    }
}
