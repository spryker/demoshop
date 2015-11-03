<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Generated\Shared\Transfer\SalesOrderItemTransfer;
use Pyz\Zed\OrderExporter\OrderExporterConfig;
use SprykerFeature\Zed\Sales\Persistence\Propel\SpySalesOrderItem;

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
     * @param int$orderId
     */
    public function sendToAfterBuy($postVariables, array $orderItems, $orderId)
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

        $this->afterbuyResponseWriter->createAfterbuyResponse($afterbuyTransfer, $sendingResponse);
    }

    /**
     * @param $postVariables
     * @param array $orderItems
     * @param $orderId
     */
    public function mockSendingToAfterbuy($postVariables, array $orderItems, $orderId)
    {
        $afterbuyTransfer = new AfterbuyExportTransfer();
        $orderItemTransfers = $this->createOrderItemsTransfer($orderItems);
        $afterbuyTransfer->setOrderItems($orderItemTransfers);
        $afterbuyTransfer->setOrderId($orderId);
        $this->afterbuyResponseWriter->saveAfterbuyResponseMocked($afterbuyTransfer, $postVariables);
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
