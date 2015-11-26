<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Pyz\Yves\Challenge\Communication\Controller;

use SprykerEngine\Yves\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BasicsController extends AbstractController
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function helloAction(Request $request)
    {
        return $this->viewResponse([
            // any data for template
        ]);
    }

}
