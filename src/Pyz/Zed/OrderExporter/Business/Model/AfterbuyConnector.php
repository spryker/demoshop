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
     * @param OrderExporterConfig $orderExporterConfig
     * @param AfterbuyResponseWriterInterface $afterbuyResponseWriter
     */
    public function __construct(
        OrderExporterConfig $orderExporterConfig,
        AfterbuyResponseWriterInterface $afterbuyResponseWriter
    ){
        $this->afterbuyUrl = $orderExporterConfig->getAfterbuyUrl();
        $this->afterbuyResponseWriter = $afterbuyResponseWriter;
    }

    /**
     * @param $postVariables
     * @param $orderId
     */
    public function sendToAfterBuy($postVariables, $orderId)
    {
        $afterbuyTransfer = new AfterbuyResponseTransfer();
        $connexion = curl_init();

        curl_setopt($connexion, CURLOPT_TIMEOUT, 120);
        curl_setopt($connexion, CURLOPT_URL, "$this->afterbuyUrl");
        curl_setopt($connexion, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connexion, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($connexion, CURLOPT_POST, 1);
        curl_setopt($connexion, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connexion, CURLOPT_POSTFIELDS, $postVariables);

        $sendingResponse = curl_exec($connexion);
        $afterbuyTransfer->setHttpStatusCode(curl_getinfo($connexion, CURLINFO_HTTP_CODE));
        curl_close($connexion);

        $afterbuyTransfer->setRequest($postVariables);

        $sendingResponse = $this->xmlParser($sendingResponse);
        $this->afterbuyResponseWriter->createAfterbuyResponse($afterbuyTransfer, $sendingResponse, $orderId);
    }

    /**
     * @param $sendingResponse
     * @return array
     */
    public function xmlParser($sendingResponse)
    {
        $sendingResponse = simplexml_load_string($sendingResponse);

        return (array) $sendingResponse;
    }

}
