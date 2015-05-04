<?php

namespace Pyz\Zed\Oms;

use Pyz\Zed\Oms\Communication\Plugin\Oms\FakeAuthPayment;
use Generated\Shared\Transfer\SalesOrder as OrderTransferTransfer;
use SprykerFeature\Zed\Oms\OmsConfig as SprykerOmsConfig;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Command\CommandInterface;
use SprykerFeature\Zed\Oms\Communication\Plugin\Oms\Condition\ConditionInterface;

class OmsConfig extends SprykerOmsConfig
{

    const ORDER_PROCESS_PAYONE_PRE_PAYMENT_01 = 'PayonePrePayment01';

    /**
     * @return string
     */
    public function getProcessDefinitionLocation()
    {
        return APPLICATION_ROOT_DIR . '/config/Zed/oms/';
    }

    /**
     * @return array
     */
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
        $method = 'prepayment';
        switch ($method) {
            case 'prepayment':
                $selectedProcessName =  self::ORDER_PROCESS_PAYONE_PRE_PAYMENT_01;
                break;
            default:
                throw new \RuntimeException("Could not find any statemachine process for new order in ".get_class($this));
        }

        if (!in_array($selectedProcessName, $this->getActiveProcesses())) {
            throw new \RuntimeException("Process $selectedProcessName is not actived in ".get_class($this));
        }

        return $selectedProcessName;
    }

    /**
     * @return CommandInterface[]
     */
    public function getCommands()
    {
        return [
            'FakeProvider/AuthPay' => new FakeAuthPayment()
        ];
    }

    /**
     * @return ConditionInterface[]
     */
    public function getConditions()
    {
        return [];
    }
}
