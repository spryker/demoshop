<?php

namespace Pyz\Zed\OrderExporter\Business;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Generated\Shared\Sales\OrderListInterface;
use SprykerFeature\Zed\Sales\Persistence\Propel\Base\SpySalesOrder;

/**
 * @method OrderExporterDependencyContainer getDependencyContainer()
 */
class OrderExporterFacade extends AbstractFacade
{

    /**
     * @param SpySalesOrder $order
     */
    public function exportOrder(SpySalesOrder $order)
    {
        $this->getDependencyContainer()
            ->createOrderExporterManager()
            ->exportOrder($order);

    }

    /**
     * @param int $saleOrderId
     * @return SpySalesOrder
     */
    public function getOrderBySalesOrderId($saleOrderId)
    {
        return $this->getDependencyContainer()
            ->getSalesFacade()
            ->getOrderBySalesOrderId($saleOrderId);
    }
}
