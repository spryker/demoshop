<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Pyz\Zed\OrderExporter\OrderExporterConfig;

class AfterbuyConnectorProduction extends  AbstractAfterbuyConnector
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
     * @param int$orderId
     */
    public function sendToAfterbuy($postVariables, array $orderItems, $orderId)
    {
        $afterbuyTransfer = new AfterbuyExportTransfer();
        $connection = curl_init();

        curl_setopt($connection, CURLOPT_TIMEOUT, $this->afterbuyConnectionTimeout);
        curl_setopt($connection, CURLOPT_URL, "$this->afterbuyUrl");
        curl_setopt($connection, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connection, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($connection, CURLOPT_POST, 1);
        curl_setopt($connection, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connection, CURLOPT_POSTFIELDS, $postVariables);

        $sendingResponse = curl_exec($connection);
        $afterbuyTransfer->setHttpStatusCode(curl_getinfo($connection, CURLINFO_HTTP_CODE));
        curl_close($connection);

        $afterbuyTransfer->setRequest($postVariables);
        $orderItemTransfers = $this->createOrderItemsTransfer($orderItems);
        $afterbuyTransfer->setOrderItems($orderItemTransfers);
        $afterbuyTransfer->setOrderId($orderId);

        $this->afterbuyResponseWriter->saveAfterbuyResponse($afterbuyTransfer, $sendingResponse);
    }

}
