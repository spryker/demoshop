<?php
namespace Pyz\Zed\Mail\Business;

use ProjectA\Zed\Mail\Business\MailFacade as CoreMailFacade;

/**
 * Class MailFacade
 * @package Pyz\Zed\Mail\Business
 * @property \ProjectA\Deprecated\Mail\Business\MailFactory $factory
 */
class MailFacade extends CoreMailFacade
{

    /**
     * @param $mailType
     * @param \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $orderEntity
     * @param bool $isUnique
     * @return MailTransfer
     */
    public function buildUnderpaidPaymentTransfer($mailType, \ProjectA\Zed\Sales\Persistence\Propel\PacSalesOrder $orderEntity, array $additionalData, $isUnique = true)
    {
        return $this->factory
            ->createModelCollectorOrderMailWithAdditionalDataCollector($mailType, $orderEntity, $additionalData, $isUnique)
            ->getMailTransfer();
    }

}
