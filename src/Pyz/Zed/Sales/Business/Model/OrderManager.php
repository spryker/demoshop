<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Sales\Business\Model;

use Generated\Shared\Transfer\OrderListTransfer;
use Orm\Zed\Sales\Persistence\SpySalesOrderQuery;
use Spryker\Zed\Sales\Business\Model\OrderManager as SprykerOrderManager;

class OrderManager extends SprykerOrderManager
{

    /**
     * @param \Generated\Shared\Transfer\OrderListTransfer $orderListTransfer
     *
     * @return \Orm\Zed\Sales\Persistence\SpySalesOrder[]|\Propel\Runtime\Collection\ObjectCollection
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
     * @param \Generated\Shared\Transfer\OrderListTransfer $orderListTransfer
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrderQuery $ordersQuery
     *
     * @return \Propel\Runtime\Collection\ObjectCollection|\Orm\Zed\Sales\Persistence\SpySalesOrder[]
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
