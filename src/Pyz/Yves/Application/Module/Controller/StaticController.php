<?php
namespace Pyz\Yves\Application\Module\Controller;

use ProjectA\Yves\Library\Controller\Controller;
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

        return [
            'data' => $content
        ];
    }
}
