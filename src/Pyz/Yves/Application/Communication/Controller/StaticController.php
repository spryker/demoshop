<?php
namespace Pyz\Yves\Application\Communication\Controller;

use ProjectA\Yves\Library\Controller\Controller;
use Pyz\Yves\Library\Tracking\PageTypeInterface;
use ProjectA\Yves\Library\Tracking\Tracking;
use Symfony\Component\HttpFoundation\Request;

class StaticController extends Controller
{

    /**
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        $routeName = $request->attributes->get('_route');
        $keyName = 'static.pages.' . $routeName;
        $content = $this->getApplication()->trans($keyName);

        Tracking::getInstance()
            ->setPageType(PageTypeInterface::PAGE_TYPE_STATIC)
            ->buildTracking();

        return [
            'data' => $content
        ];
    }
}
