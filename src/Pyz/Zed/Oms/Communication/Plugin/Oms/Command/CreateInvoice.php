<?php

namespace Pyz\Zed\Oms\Communication\Plugin\Oms\Command;

use Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Spryker\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;
use Orm\Zed\Sales\Persistence\SpySalesOrder;

class CreateInvoice extends AbstractCommand implements CommandByOrderInterface
{

    /**
     * @param array $orderItems
     * @param \Orm\Zed\Sales\Persistence\SpySalesOrder $orderEntity
     * @param \Spryker\Zed\Oms\Business\Util\ReadOnlyArrayObject $data
     *
     * @return array
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        return [];
    }

}
