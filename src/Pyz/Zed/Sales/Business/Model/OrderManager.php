<?php

namespace Pyz\Zed\Sales\Business\Model;

use Generated\Shared\Transfer\OrderListTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Orm\Zed\Sales\Persistence\SpySalesOrderQuery;
use Propel\Runtime\Collection\ObjectCollection;
use Spryker\Zed\Sales\Business\Model\OrderManager as SprykerOrderManager;

class OrderManager extends SprykerOrderManager
{

    /**
     * @param OrderListTransfer $orderListTransfer
     *
     * @return SpySalesOrder[]|ObjectCollection
     */
    protected function getOrderCollection(OrderListTransfer $orderListTransfer)
    {
        $ordersQuery = $this->createOrderListQuery($orderListTransfer);

        if ($orderListTransfer->getPagination() !== null) {
            return $this->paginateOrderCollection($orderListTransfer, $ordersQuery);
        }

        return $ordersQuery->find();
    }

    /**
     * @param OrderListTransfer $orderListTransfer
     * @param SpySalesOrderQuery $ordersQuery
     *
     * @return ObjectCollection|SpySalesOrder[]
     */
    protected function paginateOrderCollection(OrderListTransfer $orderListTransfer, SpySalesOrderQuery $ordersQuery)
    {
        $paginationTransfer = $orderListTransfer->getPagination();

        $page = $paginationTransfer
            ->requirePage()
            ->getPage();

        $maxPerPage = $paginationTransfer
            ->requireMaxPerPage()
            ->getMaxPerPage();

        $paginationModel = $ordersQuery->paginate($page, $maxPerPage);

        $paginationTransfer->setNbResults($paginationModel->getNbResults());
        $paginationTransfer->setFirstIndex($paginationModel->getFirstIndex());
        $paginationTransfer->setLastIndex($paginationModel->getLastIndex());
        $paginationTransfer->setNextPage($paginationModel->getNextPage());
        $paginationTransfer->setPreviousPage($paginationModel->getPreviousPage());

        $orderListTransfer->setPagination($paginationTransfer);

        $orderEntities = $paginationModel->getResults();

        return $orderEntities;
    }

}
