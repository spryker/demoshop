<?php

namespace Pyz\Zed\Oms\Business;

use ProjectA\Zed\Library\Business\FactoryInterface;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;
use Pyz\Zed\Oms\Communication\Plugin\Oms\FakeAuthPayment;
use Pyz\Zed\Sales\Business\SalesFacade;
use ProjectA\Shared\Sales\Transfer\Order as OrderTransfer;
use ProjectA\Zed\Oms\Business\AbstractOmsSettings;

class OmsSettings extends AbstractOmsSettings
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

