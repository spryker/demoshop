<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Orm\Zed\OrderExporter\Persistence\PdAfterbuyResponse;
use Orm\Zed\OrderExporter\Persistence\PdSalesOrderItemAfterbuyExport;

interface MailSenderInterface
{
    /**
     * @param PdAfterbuyResponse $afterbuyResponseEntity
     * @param PdSalesOrderItemAfterbuyExport [] $orderItemAfterbuyResponseEntity
     */
    public function sendAfterbuyResultMail(PdAfterbuyResponse $afterbuyResponseEntity, array $orderItemAfterbuyResponseEntity);
}
