<?php

namespace Pyz\Yves\Library\Controller;

use Symfony\Component\Debug\Exception\FlattenException;
use WebDriver\Exception;

class ExceptionController extends \SprykerCore\Yves\Application\Communication\Controller\ExceptionController
{
    /**
     * @param FlattenException $exception
     * @param string $format
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(FlattenException $exception, $format = 'html')
    {
        return $this->renderView('@Library/exception/show.twig');
    }
}
