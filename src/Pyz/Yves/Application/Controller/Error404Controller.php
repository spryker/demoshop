<?php

namespace Pyz\Yves\Application\Controller;

use Spryker\Yves\Application\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Error404Controller extends AbstractController
{

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        return $this->viewResponse([
            'error' => $request->get('exception')->getMessage(),
        ]);
    }

}
