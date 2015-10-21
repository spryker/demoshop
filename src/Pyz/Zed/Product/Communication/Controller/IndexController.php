<?php

namespace Pyz\Zed\Product\Communication\Controller;

use SprykerFeature\Zed\Product\Communication\Controller\IndexController as SprykerIndexController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method ProductFacade getFacade()
 * @method ProductQueryContainer getQueryContainer()
 * @method ProductDependencyContainer getDependencyContainer()
 */
class IndexController extends SprykerIndexController
{

    /**
     * @param Request $request
     *
     * @return array
     */
    public function viewAction(Request $request)
    {
        $response = parent::viewAction($request);
        $response['json'] = $response;

        return $this->viewResponse($response);
    }

}
