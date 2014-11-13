<?php


namespace Pyz\Zed\Oms\Component;

use Pyz\Zed\Oms\FakeAuthPayment;
use Pyz\Zed\Sales\Component\SalesFacade;
use Generated\Shared\Sales\Transfer\Order as OrderTransfer;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Generated\Zed\Sales\Component\Dependency\SalesFacadeInterface;
use Generated\Zed\Sales\Component\Dependency\SalesFacadeTrait;
use ProjectA\Zed\Oms\Component\OmsSettings as CoreOmsSettings;
use ProjectA\Zed\Payone\Component\Model\Api\ApiConstants as PayoneApiConstants;

/**
 * @property SalesFacade $facadeSales
 */
class OmsSettings extends CoreOmsSettings implements
    PayoneFacadeInterface,
    SalesFacadeInterface
{

    use PayoneFacadeTrait;
    use SalesFacadeTrait;

    const ORDER_PROCESS_PAYONE_PRE_PAYMENT_01 = 'PayonePrePayment01';

    public function getActiveProcesses()
    {
        return [
            self::ORDER_PROCESS_PAYONE_PRE_PAYMENT_01,
        ];
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @return string|null
     * @throws \RuntimeException
     */
    public function selectProcess(OrderTransfer $orderTransfer)
    {
        $selectedProcessName = null;
        $method = $orderTransfer->getPayment()->getMethod();
        switch ($method) {
            case PayoneApiConstants::PAYMENT_METHOD_PREPAYMENT:
                $selectedProcessName =  self::ORDER_PROCESS_PAYONE_PRE_PAYMENT_01;
                break;
            default:
                throw new \RuntimeException("Could not find any statemachine process for new order in ".get_class($this));
        }

        if (!in_array($selectedProcessName, $this->getActiveProcesses())){
            throw new \RuntimeException("Process $selectedProcessName is not actived in ".get_class($this));
        }

        return $selectedProcessName;
    }

    /**
     * @return array
     */
    public function getCommands()
    {
        return [
            'FakeProvider/AuthPay' => new FakeAuthPayment()
        ];
    }

    /**
     * @return array
     */
    public function getConditions()
    {
        return [];
    }
}

 