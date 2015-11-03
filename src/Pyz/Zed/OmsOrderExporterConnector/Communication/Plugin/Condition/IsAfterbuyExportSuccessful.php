<?php

namespace Pyz\Zed\OmsOrderExporterConnector\Communication\Plugin\Condition;

use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Condition\AbstractCondition;
use Pyz\Zed\OmsOrderExporterConnector\Communication\OmsOrderExporterConnectorDependencyContainer;

/**
 * @method OmsOrderExporterConnectorDependencyContainer getDependencyContainer()
 */
class IsAfterbuyExportSuccessful extends AbstractCondition
{

    /**
     * @param SpySalesOrderItem $orderItem
     *
     * @return bool
     */
    public function check(SpySalesOrderItem $orderItem)
    {
        return $this->getDependencyContainer()->createOrderExporterFacade()->isOrderItemsAfterbuyExportSuccessful($orderItem);
    }
}
