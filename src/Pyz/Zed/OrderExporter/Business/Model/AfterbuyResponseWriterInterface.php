<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyResponseTransfer;

interface AfterbuyResponseWriterInterface
{
    /**
     * @param AfterbuyResponseTransfer $afterbuyTransfer
     * @param $afterbuyResponse
     * @param $orderId
     */
    public function createAfterbuyResponse(AfterbuyResponseTransfer $afterbuyTransfer, $afterbuyResponse, $orderId);
}
