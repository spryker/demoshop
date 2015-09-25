<?php

namespace Pyz\Zed\Oms;

use Generated\Shared\Transfer\OrderTransfer;
use SprykerFeature\Zed\Oms\OmsConfig as SprykerOmsConfig;

class OmsConfig extends SprykerOmsConfig
{

    const ORDER_PROCESS_NO_PAYMENT_01 = 'Nopayment01';

    const ORDER_PROCESS_PREPAYMENT_01 = 'Prepayment01';

    const ORDER_PROCESS_PAYOLUTION_PAYMENT_01 = 'PayolutionPayment01';

    /**
     * @return string
     */
    public function getProcessDefinitionLocation()
    {
        return APPLICATION_ROOT_DIR . '/config/Zed/oms/';
    }

    /**
     * @param OrderTransfer $orderTransfer
     *
     * @throws \RuntimeException
     *
     * @return string|null
     */
    public function selectProcess(OrderTransfer $orderTransfer)
    {
        $selectedProcessName = null;
        $method = 'payolution';

        switch ($method) {
            case 'prepayment':
                $selectedProcessName = self::ORDER_PROCESS_PREPAYMENT_01;
                break;
            case 'payolution':
                $selectedProcessName = self::ORDER_PROCESS_PAYOLUTION_PAYMENT_01;
                break;
            default:
                throw new \RuntimeException('Could not find any statemachine process for new order in ' . get_class($this));
        }

        if (!in_array($selectedProcessName, $this->getActiveProcesses())) {
            throw new \RuntimeException("Process $selectedProcessName is not actived in " . get_class($this));
        }

        return $selectedProcessName;
    }

    /**
     * @return array
     */
    public function getActiveProcesses()
    {
        return [
            self::ORDER_PROCESS_NO_PAYMENT_01,
            self::ORDER_PROCESS_PREPAYMENT_01,
            self::ORDER_PROCESS_PAYOLUTION_PAYMENT_01,
        ];
    }

}
