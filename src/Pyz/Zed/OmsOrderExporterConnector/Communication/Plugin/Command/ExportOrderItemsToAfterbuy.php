<?php

namespace Pyz\Zed\OmsOrderExporterConnector\Communication\Plugin\Command;

use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandByOrderInterface;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrder;
use SprykerFeature\Zed\Oms\Business\Util\ReadOnlyArrayObject;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\AbstractCommand;
use Pyz\Zed\OmsOrderExporterConnector\Communication\OmsOrderExporterConnectorDependencyContainer;

/**
 * @method OmsOrderExporterConnectorDependencyContainer getDependencyContainer()
 */
class ExportOrderItemsToAfterbuy extends AbstractCommand implements CommandByOrderInterface
{
    /**
     * @param SpySalesOrder[] $orderItems
     * @param SpySalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     *
     * @return array $returnArray
     */
    public function run(array $orderItems, SpySalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $this->getDependencyContainer()->createOrderExporterFacade()->exportOrderItems($orderItems);
    }

}
