<?php
namespace Sao\Yves\Application\Module\Controller;

use ProjectA\Yves\Library\Controller\Controller;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpFoundation\Response;

class ExceptionController extends Controller
{
    /**
     * @param FlattenException $exception
     * @param string $format
     * @return Response
     */
    public function showAction(FlattenException $exception, $format = 'html')
    {
        return new Response('error');
    }
}
