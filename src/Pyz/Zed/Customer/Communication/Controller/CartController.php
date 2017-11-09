<?php

namespace Pyz\Zed\Customer\Communication\Controller;

use Spryker\Shared\Customer\CustomerConstants;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Customer\Communication\CustomerCommunicationFactory getFactory()
 */
class CartController extends AbstractController
{

    public function indexAction(Request $request)
    {
        $cartTable = $this->getFactory()
            ->createCartTable($request->get(CustomerConstants::PARAM_ID_CUSTOMER));

        return $this->viewResponse([
            'cartTable' => $cartTable->render(),
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function tableAction(Request $request)
    {
        $idCustomer = $this->castId($request->get(CustomerConstants::PARAM_ID_CUSTOMER));

        $table = $this->getFactory()
            ->createCartTable($idCustomer);

        return $this->jsonResponse($table->fetchData());
    }

}