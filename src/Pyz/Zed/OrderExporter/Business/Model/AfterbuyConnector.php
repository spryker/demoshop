<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\OrderExporterConfig;

class AfterbuyConnector implements AfterbuyConnectorInterface
{
    /**
     * @var string
     */
    protected $afterbuyUrl;
    /**
     * @param OrderExporterConfig $orderExporterConfig
     */
    public function __construct(OrderExporterConfig $orderExporterConfig)
    {
        $this->afterbuyUrl = $orderExporterConfig->getAfterbuyUrl();
    }

    /**
     * @param array $postVariables
     * @return mixed
     */
    public function sendToAfterBuy(array $postVariables)
    {
        die('do not send for test');
        $connexion = curl_init();
        curl_setopt($connexion, CURLOPT_URL, "$this->afterbuyUrl");
        curl_setopt($connexion, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($connexion, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($connexion, CURLOPT_POST, 1);
        curl_setopt($connexion, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($connexion, CURLOPT_POSTFIELDS, $postVariables);

        $sendingResponse = curl_exec($connexion);
        curl_close($connexion);

        return $resultConnexion;
    }


    public function xmlParser($sendingResponse)
    {
        $sendingResponse = simplexml_load_string($sendingResponse);
        $sendingResponse = (array) $sendingResponse;


    }
}
