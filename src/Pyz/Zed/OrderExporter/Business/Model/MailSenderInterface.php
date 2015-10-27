<?php

namespace Pyz\Zed\OrderExporter\Business\Model;

use Pyz\Zed\OrderExporter\Persistence\Propel\PdAfterbuyResponse;

interface MailSenderInterface
{
    /**
     * @param PdAfterbuyResponse $afterbuyResponseEntity
     */
    public function sendAfterbuyResultMail(PdAfterbuyResponse $afterbuyResponseEntity);

}
