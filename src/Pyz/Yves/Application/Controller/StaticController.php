<?php

namespace Pyz\Yves\Application\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class StaticController extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $routeName = $request->attributes->get('_route');
        $content = 'static.pages.' . $routeName;

        return $this->viewResponse(['data' => $content]);
    }

}
