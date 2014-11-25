<?php


namespace Pyz\Zed\Oms;

use ProjectA\Zed\Oms\Component\Command\AbstractCommand;
use ProjectA\Zed\Oms\Component\Command\CommandByOrderInterface;
use ProjectA\Zed\Oms\Component\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Payment\Component\Model\PaymentConstantsInterface;
use ProjectA\Zed\Payment\Component\Model\PaymentResponse;

/**
 * Class FakeAuthPayment
 * @package Pyz\Zed\Oms
 */
class FakeAuthPayment extends AbstractCommand implements CommandByOrderInterface
{
    /**
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrderItem[] $orderItems
     * @param \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity
     * @param ReadOnlyArrayObject $data
     * @return array $returnArray
     */
    public function run(array $orderItems, \ProjectA_Zed_Sales_Persistence_PacSalesOrder $orderEntity, ReadOnlyArrayObject $data)
    {
        $response = new PaymentResponse(true);

        return [
            PaymentConstantsInterface::PAYMENT_TRANSACTION_RESPONSE_KEY => $response
        ];
    }

}
 