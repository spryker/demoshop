<?php

namespace Pyz\Zed\OrderExporter\Business;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerEngine\Zed\Kernel\Business\AbstractFacade;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Generated\Shared\Sales\OrderListInterface;

/**
 * @method OrderExporterDependencyContainer getDependencyContainer()
 */
class OrderExporterFacade extends AbstractFacade
{

    /**
     * @param int $saleOrderId
     */
    public function exportOrder($saleOrderId)
    {
        $this->getDependencyContainer()
            ->createOrderExporterManager()
            ->exportOrder($this->getOrderBySalesOrderId($saleOrderId));

    }

    /**
     * @param int $saleOrderId
     * @return \Generated\Shared\Transfer\OrderTransfer
     */
    public function getOrderBySalesOrderId($saleOrderId)
    {
        return $this->getDependencyContainer()
            ->getSalesFacade()
            ->getOrderBySalesOrderId($saleOrderId);
    }
}
