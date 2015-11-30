<?php

namespace Pyz\Zed\Adyen\Business\Model;

use Orm\Zed\Adyen\Persistence\PavPaymentAdyen;
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
     * @param $salesOrderId
     * @return PavPaymentAdyen
     */
    public function getPaymentBySalesOrderId($salesOrderId)
    {
        return $this->queryContainer->queryPaymentBySalesOrderId($salesOrderId)
            ->find()
            ->getFirst();
    }

}
