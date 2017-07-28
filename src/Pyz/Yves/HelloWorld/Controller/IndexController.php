<?php

namespace Pyz\Yves\HelloWorld\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    public function indexAction()
    {
        return [
            'hello' => $this->getClient()->getGreeting()->getGreeting()
        ];
    }
}
