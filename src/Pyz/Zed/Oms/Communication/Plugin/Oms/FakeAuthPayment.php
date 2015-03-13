<?php

namespace Pyz\Zed\Oms\Communication\Plugin\Oms;

use ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder;
use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use ProjectA\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;

/**
 * Class FakeAuthPayment
 * @package Pyz\Zed\Oms
 */
class FakeAuthPayment extends AbstractCommand implements CommandByOrderInterface
{
    /**
     * @param \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrderItem[] $orderItems
     * @param \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array $returnArray
     */
    public function run(array $orderItems, PacSalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        return [];
    }
}
