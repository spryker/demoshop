<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Generated\Shared\Transfer\SalesOrderItemTransfer;
use Pyz\Zed\OrderExporter\OrderExporterConfig;
use Orm\Zed\Sales\Persistence\SpySalesOrderItem;

class AfterbuyConnector implements AfterbuyConnectorInterface
{
    /**
     * @var string
     */
    protected $afterbuyUrl;

    /**
     * @var AfterbuyResponseWriterInterface
     */
    protected $afterbuyResponseWriter;

    /**
     * @var string
     */
    protected $afterbuyConnectionTimeout;

    /**
     * @param OrderExporterConfig $orderExporterConfig
     * @param AfterbuyResponseWriterInterface $afterbuyResponseWriter
     */
    public function __construct(
        OrderExporterConfig $orderExporterConfig,
        AfterbuyResponseWriterInterface $afterbuyResponseWriter
    ){
        $this->afterbuyUrl = $orderExporterConfig->getAfterbuyUrl();
        $this->afterbuyResponseWriter = $afterbuyResponseWriter;
        $this->afterbuyConnectionTimeout = $orderExporterConfig->getAfterbuyConnectionTimeout();
    }

    /**
     * @param $postVariables
     * @param array $orderItems
     * @param int $orderId
     */
    public function sendToAfterbuy($postVariables, array $orderItems, $orderId)
    {
        $afterbuyTransfer = new AfterbuyExportTransfer();
        $orderItemTransfers = $this->createOrderItemsTransfer($orderItems);
        $afterbuyTransfer->setOrderItems($orderItemTransfers);
        $afterbuyTransfer->setOrderId($orderId);
        $this->afterbuyResponseWriter->saveAfterbuyResponse($afterbuyTransfer, $postVariables);
    }

    /**
     * @param SpySalesOrderItem [] $orderItems
     * @return array
     */
    protected function createOrderItemsTransfer(array $orderItems)
    {
        $orderItemTransfers = new \ArrayObject();

        foreach ($orderItems as $orderItem) {
            $orderItemTransfer = new SalesOrderItemTransfer();
            $orderItemTransfer->setOrderItemId($orderItem->getIdSalesOrderItem());
            $orderItemTransfers[] = $orderItemTransfer;
        }

        return $orderItemTransfers;
    }

}
