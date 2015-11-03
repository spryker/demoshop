<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;

interface AfterbuyResponseWriterInterface
{
    /**
     * @param AfterbuyExportTransfer $afterbuyTransfer
     * @param $afterbuyResponse
     */
    public function createAfterbuyResponse(AfterbuyExportTransfer $afterbuyTransfer, $afterbuyResponse);

    /**
     * @param AfterbuyExportTransfer $afterbuyTransfer
     * @param $postVariables
     */
    public function saveAfterbuyResponseMocked(AfterbuyExportTransfer $afterbuyTransfer, $postVariables);
}
