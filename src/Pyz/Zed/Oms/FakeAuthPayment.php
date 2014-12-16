<?php


namespace Pyz\Zed\Oms;

use ProjectA\Zed\Oms\Business\Command\AbstractCommand;
use ProjectA\Zed\Oms\Business\Command\CommandByOrderInterface;
use ProjectA\Zed\Oms\Business\Model\Util\ReadOnlyArrayObject;
use ProjectA\Zed\Payment\Business\Model\PaymentConstantsInterface;
use ProjectA\Zed\Payment\Business\Model\PaymentResponse;

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
 