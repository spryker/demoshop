<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Yves\Customer\Controller;

use Generated\Shared\Transfer\FilterTransfer;
use Generated\Shared\Transfer\OrderListTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Generated\Shared\Transfer\PaginationTransfer;
use Symfony\Component\HttpFoundation\Request;

class OrderController extends AbstractCustomerController
{

    const ORDER_LIST_LIMIT = 10;
    const ORDER_LIST_SORT_FIELD = 'created_at';
    const ORDER_LIST_SORT_DIRECTION = 'DESC';

    const PARAM_PAGE = 'page';
    const DEFAULT_PAGE = 1;

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $orderListTransfer = $this->createOrderListTransfer($request);

        $orderListTransfer = $this->getFactory()
            ->getSalesClient()
            ->getOrders($orderListTransfer);

        $orderList = $orderListTransfer->getOrders();

        return $this->viewResponse([
            'pagination' => $orderListTransfer->getPagination(),
            'orderList' => $orderList,
        ]);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function detailsAction(Request $request)
    {
        $responseData = $this->getOrderDetailsResponseData($request->query->getInt('id'));

        return $this->viewResponse($responseData);
    }

    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\OrderListTransfer
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
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Generated\Shared\Transfer\PaginationTransfer
     */
    protected function createPaginationTransfer(Request $request)
    {
        $paginationTransfer = new PaginationTransfer();
        $paginationTransfer->setPage($request->query->getInt(self::PARAM_PAGE, self::DEFAULT_PAGE));
        $paginationTransfer->setMaxPerPage(self::ORDER_LIST_LIMIT);

        return $paginationTransfer;
    }

    /**
     * @return \Generated\Shared\Transfer\FilterTransfer
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
            ->getSalesClient()
            ->getOrderDetails($orderTransfer);

        $bundleItemGrouper = $this->getFactory()->createProductBundleGroupper();
        $items = $bundleItemGrouper->getGroupedBundleItems(
            $orderTransfer->getItems(),
            $orderTransfer->getBundleItems()
        );

        return [
            'order' => $orderTransfer,
            'items' => $items,
        ];
    }

}
