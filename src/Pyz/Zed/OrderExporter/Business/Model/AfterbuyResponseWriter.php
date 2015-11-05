<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Generated\Shared\Transfer\AfterbuyExportTransfer;
use Orm\Zed\OrderExporter\Persistence\PdAfterbuyResponse;

class AfterbuyResponseWriter extends AbstractAfterbuyResponseWriter
{
    /**
     * In not production environment (dev, staging) afterbuy response is saved as isTest TRUE and isSuccessful TRUE
     *
     * @param AfterbuyExportTransfer $afterbuyExportTransfer
     * @param $postVariables
     * @throws \Propel\Runtime\Exception\PropelException
     */
    public function saveAfterbuyResponse(AfterbuyExportTransfer $afterbuyExportTransfer, $postVariables)
    {
        $afterbuyResponseEntity = new PdAfterbuyResponse();
        $afterbuyResponseEntity
            ->setRequest($postVariables)
            ->setSuccess(true)
            ->setIsTest(true);

        $afterbuyResponseEntity->save();

        $afterbuyExportTransfer
            ->setAfterbuyResponseId($afterbuyResponseEntity->getIdAfterbuyResponse())
            ->setSuccess(true);

        $this->saveOrderItemExport($afterbuyExportTransfer);
    }

}
