<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyResponseTransfer;
use Pyz\Zed\OrderExporter\OrderExporterConfig;

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
     * @param $orderId
     */
    public function sendToAfterBuy($postVariables, $orderId)
    {
        $afterbuyTransfer = new AfterbuyResponseTransfer();
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

        $this->afterbuyResponseWriter->createAfterbuyResponse($afterbuyTransfer, $sendingResponse, $orderId);
    }

}
