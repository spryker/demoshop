<?php

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\FilterTransfer;
use Generated\Shared\Transfer\OrderListTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\PaginationTransfer;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractCustomerController
{

    const ORDER_LIST_LIMIT = 10;
    const ORDER_LIST_SORT_FIELD = 'created_at';
    const ORDER_LIST_SORT_DIRECTION = 'DESC';

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $orderListTransfer = $this->createOrderListTransfer($request);

        $orderListTransfer = $this->getFactory()
            ->createSalesClient()
            ->getOrders($orderListTransfer);

        $orderList = $orderListTransfer->getOrders();

        return $this->viewResponse([
            'pagination' => $orderListTransfer->getPagination(),
            'orderList' => $orderList,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return array|RedirectResponse
     */
    public function detailsAction(Request $request)
    {
        $responseData = $this->getOrderDetailsResponseData($request->query->getInt('id'));

        return $this->viewResponse($responseData);
    }

    /**
     * @param Request $request
     *
     * @return OrderListTransfer
     */
    protected function createOrderListTransfer(Request $request)
    {
        $orderListTransfer = new OrderListTransfer();

        $customerTransfer = $this->getLoggedInCustomerTransfer();
        $orderListTransfer->setIdCustomer($customerTransfer->getIdCustomer());

        $filterTransfer = $this->createFilterTransfer();
        $orderListTransfer->setFilter($filterTransfer);

        $paginationTransfer = $this->createPaginationTransfer($request);
        $orderListTransfer->setPagination($paginationTransfer);

        return $orderListTransfer;
    }

    /**
     * @param Request $request
     *
     * @return PaginationTransfer
     */
    protected function createPaginationTransfer(Request $request)
    {
        $paginationTransfer = new PaginationTransfer();
        $paginationTransfer->setPage($request->query->getInt('page', 1));
        $paginationTransfer->setMaxPerPage(self::ORDER_LIST_LIMIT);

        return $paginationTransfer;
    }

    /**
     * @return FilterTransfer
     */
    protected function createFilterTransfer()
    {
        $filterTransfer = new FilterTransfer();
        $filterTransfer->setOrderBy(self::ORDER_LIST_SORT_FIELD);
        $filterTransfer->setOrderDirection(self::ORDER_LIST_SORT_DIRECTION);

        return $filterTransfer;
    }

    /**
     * @param int $idSalesOrder
     *
     * @return array
     */
    protected function getOrderDetailsResponseData($idSalesOrder)
    {
        $customerTransfer = $this->getLoggedInCustomerTransfer();

        $orderTransfer = new OrderTransfer();
        $orderTransfer
            ->setIdSalesOrder($idSalesOrder)
            ->setFkCustomer($customerTransfer->getIdCustomer());

        $orderTransfer = $this->getFactory()
            ->createSalesClient()
            ->getOrderDetails($orderTransfer);

        return [
            'order' => $orderTransfer,
        ];
    }

}
