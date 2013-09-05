<?php
namespace Sao\Yves\Application\Module\Controller;

use ProjectA\Yves\Library\Controller\Controller;
use ProjectA\Yves\Library\Silex\Application;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ExceptionController extends Controller
{
    /**
     * @param Request $request
     * @param Application $app
     * @param FlattenException $exception
     * @param string $format
     * @return Response
     */
    public function showAction(Request $request, Application $app, FlattenException $exception, $format = 'html')
    {
        return new Response('error');
    }
}
