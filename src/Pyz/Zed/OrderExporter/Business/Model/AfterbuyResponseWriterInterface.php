<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;

interface AfterbuyResponseWriterInterface
{
    /**
     * @param $afterbuyResponse
     * @return PdAfterbuyResponse
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function createAfterbuyResponse($afterbuyResponse, $orderId);
}
