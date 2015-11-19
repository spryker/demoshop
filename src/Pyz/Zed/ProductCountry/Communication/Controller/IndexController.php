<?php

namespace Pyz\Zed\ProductCountry\Communication\Controller;

use Pyz\Zed\ProductCountry\Business\ProductCountryFacade;
use Pyz\Zed\ProductCountry\Communication\ProductCountryDependencyContainer;
use SprykerFeature\Zed\Application\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * @method ProductCountryFacade getFacade
 * @method ProductCountryDependencyContainer getDependencyContainer
 */
class IndexController extends AbstractController
{

    /**
     * @return array
     */
    public function indexAction()
    {
        $productCountryTable = $this->getDependencyContainer()
            ->createProductCountryTable();

        return $this->viewResponse([
            'productCountryTable' => $productCountryTable->render(),
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function productCountryTableAction()
    {
        $productCountryTable = $this->getDependencyContainer()
            ->createProductCountryTable()
        ;

        return $this->jsonResponse(
            $productCountryTable->fetchData()
        );
    }

}
