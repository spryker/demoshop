<?php

namespace Pyz\Zed\Adyen\Business\Model;

use PavFeature\Zed\Adyen\Persistence\AdyenQueryContainerInterface;
use Orm\Zed\Payone\Persistence\SpyPaymentPayone;

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
     * @return SpyPaymentPayone
     */
    public function getPaymentBySalesOrderId($salesOrderId)
    {
        return $this->queryContainer->getPaymentByOrderId($salesOrderId)
            ->find()
            ->getFirst();
    }

}
