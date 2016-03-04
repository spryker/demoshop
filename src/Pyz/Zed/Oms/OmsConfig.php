<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Pyz\Zed\Oms;

use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Oms\OmsConfig as SprykerOmsConfig;

class OmsConfig extends SprykerOmsConfig
{

    const ORDER_PROCESS_NO_PAYMENT_01 = 'Nopayment01';

    const ORDER_PROCESS_PREPAYMENT_01 = 'Prepayment01';

    const ORDER_PROCESS_PAYOLUTION_PAYMENT_01 = 'PayolutionPayment01';

    const ORDER_PROCESS_INVOICE_01 = 'Invoice01';

    /**
     * @return string
     */
    public function getProcessDefinitionLocation()
    {
        return APPLICATION_ROOT_DIR . '/config/Zed/oms/';
    }

    /**
     * @param \Generated\Shared\Transfer\OrderTransfer $orderTransfer
     *
     * @throws \RuntimeException
     *
     * @return string|null
     */
    public function selectProcess(OrderTransfer $orderTransfer)
    {
        $selectedProcessName = $orderTransfer->getProcess();

        if (in_array($selectedProcessName, $this->getActiveProcesses()) === false) {
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
            self::ORDER_PROCESS_INVOICE_01,
        ];
    }

}
