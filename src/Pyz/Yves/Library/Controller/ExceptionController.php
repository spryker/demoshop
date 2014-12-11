<?php
namespace Pyz\Yves\Library\Controller;

use ProjectA\Yves\Library\Controller\ExceptionController as CoreExceptionController;
use Symfony\Component\Debug\Exception\FlattenException;
use WebDriver\Exception;

class ExceptionController extends CoreExceptionController
{
    /**
     * @param FlattenException $exception
     * @param string $format
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(FlattenException $exception, $format = 'html')
    {
        return $this->getApplication()->render('@Library/exception/show.twig');
    }
}
