<?php

namespace Pyz\Zed\HelloWorld\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{
    public function indexAction(Request $request)
    {
        return [
            'hello' => $this->getFacade()->greet(),
        ];
    }
}
