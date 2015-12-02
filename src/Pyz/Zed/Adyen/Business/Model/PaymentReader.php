<?php

namespace Pyz\Zed\Adyen\Business\Model;

use Generated\Shared\Adyen\AdyenPaymentInterface;
use Generated\Shared\Transfer\AdyenPaymentDetailTransfer;
use Generated\Shared\Transfer\AdyenPaymentTransfer;
use Generated\Shared\Transfer\PaymentDetailTransfer;
use Pyz\Zed\Adyen\Persistence\AdyenQueryContainerInterface;

class PaymentReader implements PaymentReaderInterface
{
    /**
     * @var AdyenQueryContainerInterface
     */
    protected $queryContainer;

    /**
     * @param AdyenQueryContainerInterface $queryContainer
     */
    public function __construct(AdyenQueryContainerInterface $queryContainer)
    {
        $this->queryContainer = $queryContainer;
    }

    /**
     * @param int $idSalesOrder
     * @return AdyenPaymentInterface
     */
    public function getPaymentBySalesOrderId($idSalesOrder)
    {
        $entity = $this->queryContainer->queryPaymentBySalesOrderId($idSalesOrder)
            ->find()
            ->getFirst();

        $paymentDetails = $entity->getPavPaymentAdyenDetail();
        $detailsTransfer = new AdyenPaymentDetailTransfer();
        $detailsTransfer->fromArray($paymentDetails->toArray(), true);

        $transfer = new AdyenPaymentTransfer();
        $transfer->fromArray($entity->toArray(), true);
        $transfer->setPaymentDetail($detailsTransfer);

        return $transfer;
    }

}
