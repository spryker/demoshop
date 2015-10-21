<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;

class AfterbuyResponseWriter implements AfterbuyResponseWriterInterface
{
    /**
     * @param $afterbuyResponse
     * @param $orderId
     * @return PdAfterbuyResponse
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function createAfterbuyResponse($afterbuyResponse, $orderId)
    {
        $afterbuyResponseEntity = new PdAfterbuyResponse();
        $afterbuyResponseEntity->setFullResponse(json_encode($afterbuyResponse));
        $afterbuyResponseEntity->setFkOrder($orderId);

        if (array_key_exists('success', $afterbuyResponse)) {
            $afterbuyResponseEntity->setSuccess($afterbuyResponse['success']);
        }

        if (array_key_exists('errorlist', $afterbuyResponse)) {
            $afterbuyResponseEntity->setErrorsList(json_encode($afterbuyResponse['errorlist']));
        }
        $afterbuyResponseEntity->save();

        return $afterbuyResponseEntity;
    }

}