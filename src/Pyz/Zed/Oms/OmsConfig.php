<?php

namespace Pyz\Zed\Oms;

use Generated\Shared\Transfer\OrderTransfer;
use PavFeature\Shared\Adyen\AdyenPaymentMethodConstants;
use Pyz\Shared\Oms\OmsConstants;
use SprykerFeature\Zed\Oms\OmsConfig as SprykerOmsConfig;

class OmsConfig extends SprykerOmsConfig
{

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
        switch ($orderTransfer->getAdyenPayment()->getPaymentMethod()) {
            case 'prepayment':
                $selectedProcessName = OmsConstants::ORDER_PROCESS_PREPAYMENT_01;
                break;
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SEPA:
                $selectedProcessName = OmsConstants::ORDER_PROCESS_SEPA_DIRECT_DEBIT_01;
                break;
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_PAYPAL:
                $selectedProcessName = OmsConstants::ORDER_PROCESS_PAYPAL_01;
                break;
            case AdyenPaymentMethodConstants::ADYEN_PAYMENT_METHOD_SOFORTUEBERWEISUNG:
                $selectedProcessName = OmsConstants::ORDER_PROCESS_SOFORTUEBERWEISUNG_01;
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
            OmsConstants::ORDER_PROCESS_NO_PAYMENT_01,
            OmsConstants::ORDER_PROCESS_PREPAYMENT_01,
            OmsConstants::ORDER_PROCESS_SEPA_DIRECT_DEBIT_01,
            OmsConstants::ORDER_PROCESS_PAYPAL_01
        ];
    }

}
