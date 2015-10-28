<?php

namespace Pyz\Yves\Application\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Error404Controller extends AbstractController
{

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function indexAction(Request $request)
    {
        return $this->viewResponse([
            'error' => $request->get('exception')->getMessage(),
        ]);
    }

}
