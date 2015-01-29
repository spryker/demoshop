<?php


namespace Pyz\Zed\Oms\Business;

use ProjectA\Zed\Library\Business\FactoryInterface;
use ProjectA\Zed\Library\Business\Model\FacadeAbstract;
use ProjectA\Zed\Library\Dependency\DependencyFactoryTrait;
use Pyz\Zed\Oms\Communication\Plugin\Oms\FakeAuthPayment;
use Pyz\Zed\Sales\Business\SalesFacade;
use ProjectA\Shared\Sales\Transfer\Order as OrderTransfer;
use ProjectA\Deprecated\Payone\Business\Dependency\PayoneFacadeInterface;
use ProjectA\Deprecated\Payone\Business\Dependency\PayoneFacadeTrait;
use ProjectA\Deprecated\Sales\Business\Dependency\SalesFacadeInterface;
use ProjectA\Deprecated\Sales\Business\Dependency\SalesFacadeTrait;
use ProjectA\Zed\Oms\Business\AbstractOmsSettings;
use ProjectA\Zed\Payone\Business\Model\Api\ApiConstants as PayoneApiConstants;

/**
 * @property SalesFacade $facadeSales
 */
class OmsSettings extends AbstractOmsSettings implements
    PayoneFacadeInterface,
    SalesFacadeInterface
{

    use PayoneFacadeTrait;
    use SalesFacadeTrait;

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
        $method = $orderTransfer->getPayment()->getMethod();
        switch ($method) {
            case PayoneApiConstants::PAYMENT_METHOD_PREPAYMENT:
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

