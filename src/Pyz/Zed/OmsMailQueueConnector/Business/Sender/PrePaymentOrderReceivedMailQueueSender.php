<?php

namespace Pyz\Zed\OmsMailQueueConnector\Business\Sender;

use Orm\Zed\Sales\Persistence\SpySalesOrder;
use Generated\Shared\Transfer\MailTransfer;
use Generated\Shared\Transfer\MailRecipientTransfer;
use Orm\Zed\Adyen\Persistence\PavPaymentAdyen;
use PavFeature\Zed\OmsMailQueueConnector\Business\Sender\PrePaymentOrderReceivedMailQueueSender as PavPrePaymentOrderReceivedMailQueueSender;

class PrePaymentOrderReceivedMailQueueSender extends PavPrePaymentOrderReceivedMailQueueSender
{

    /**
     * 7914489607127574 -> 791-4489-6071-27574
     * @param $psp
     * @return mixed
     */
    public function formatPSP($psp)
    {
        if (preg_match('#^[0-9]{16}$#', $psp)) {
            return substr($psp, 0, 3) . '-' .
            substr($psp, 3, 4) . '-' .
            substr($psp, 7, 4) . '-' .
            substr($psp, 11, 5);
        } else {
            return false;
        }
    }

    /**
     * @param SpySalesOrder $orderEntity
     * @return MailTransfer
     */
    public function getMailTransfer(SpySalesOrder $orderEntity)
    {
        $mailTransfer = parent::getMailTransfer($orderEntity);
        /** @var PavPaymentAdyen $adyenPayment */
        $adyenPayment = $orderEntity->getPavPaymentAdyens()->getFirst();
        $psp = $adyenPayment->getPspReference();

        if (empty($psp) === false
            && $this->formatPSP($psp) !== false
        ) {
            $mergeVars = $this->getOrderMergeVars($orderEntity);
            $mergeVars['psp'] = $this->formatPSP($psp);
            $recipients = $mailTransfer->getRecipients();
            foreach ($recipients as $mailRecipientTransfer) {
                $mailRecipientTransfer->setMergeVars($mergeVars);
            }

            return $mailTransfer;
        }

        return false;
    }
}
