<?php

namespace Pyz\Yves\Application\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class Error404Controller extends AbstractController
{

    /**
     * @param Request $request
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
