<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Pyz\Zed\OrderExporter\OrderExporterConfig;

class AfterbuyConnector extends AbstractAfterbuyConnector
{
    /**
     * @var string
     */
    protected $afterbuyUrl;

    /**
     * @var AbstractAfterbuyResponseWriter
     */
    protected $afterbuyResponseWriter;

    /**
     * @var string
     */
    protected $afterbuyConnectionTimeout;

    /**
     * @param OrderExporterConfig $orderExporterConfig
     * @param AbstractAfterbuyResponseWriter $afterbuyResponseWriter
     */
    public function __construct(
        OrderExporterConfig $orderExporterConfig,
        AbstractAfterbuyResponseWriter $afterbuyResponseWriter
    ){
        $this->afterbuyUrl = $orderExporterConfig->getAfterbuyUrl();
        $this->afterbuyResponseWriter = $afterbuyResponseWriter;
        $this->afterbuyConnectionTimeout = $orderExporterConfig->getAfterbuyConnectionTimeout();
    }

    /**
     * @param $postVariables
     * @param array $orderItems
     * @param int $idOrder
     */
    public function sendToAfterbuy($postVariables, array $orderItems, $idOrder)
    {
        $afterbuyTransfer = new AfterbuyExportTransfer();
        $orderItemTransfers = $this->createOrderItemsTransfer($orderItems);
        $afterbuyTransfer->setOrderItems($orderItemTransfers);
        $afterbuyTransfer->setOrderId($idOrder);
        $this->afterbuyResponseWriter->saveAfterbuyResponse($afterbuyTransfer, $postVariables);
    }

}
