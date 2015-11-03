<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;
use Pyz\Zed\OrderExporter\Persistence\Propel\PdSalesOrderItemAfterbuyExport;

interface MailSenderInterface
{
    /**
     * @param PdAfterbuyResponse $afterbuyResponseEntity
     * @param PdSalesOrderItemAfterbuyExport [] $orderItemAfterbuyResponseEntity
     */
    public function sendAfterbuyResultMail(PdAfterbuyResponse $afterbuyResponseEntity, array $orderItemAfterbuyResponseEntity);

}
