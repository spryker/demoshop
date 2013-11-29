<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess\Payone;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Capture
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements PayoneFacadeInterface, Orderprocess, PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payment Capture Subprocess (Payone)')
    {
        parent::__construct($processName);
    }

    protected function createDefinition()
    {
        $this->getNewSetup();
        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_PAYONE_INIT_CAPTURE, self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_PAYONE_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_CAPTURE, self::STATE_PAYONE_CAPTURE_FAILED, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_PAYONE_CAPTURED, self::EVENT_PAYONE_TRANSACTION_STATUS_CAPTURE_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CAPTURE_FAILED, self::STATE_PAYONE_CAPTURED, self::EVENT_PAYONE_TRANSACTION_STATUS_CAPTURE_RECEIVED);
        $this->setup->setTimeout(self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_PAYONE_CAPTURE_FAILED, '1 day');
    }

    protected function addCommands()
    {
        $payoneAuthorizeCommand = $this->facadePayone->createFacadeStateMachine()->getCommandCaptureGrandTotal();
        $this->setup->addCommand(self::STATE_PAYONE_INIT_CAPTURE, self::EVENT_ON_ENTER, $payoneAuthorizeCommand);
    }

    protected function addFlags()
    {
    }

    protected function addMetaInfo()
    {
        $groupStates = [
            self::STATE_PAYONE_INIT_CAPTURE,
            self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT,
            self::STATE_PAYONE_CAPTURE_FAILED,
            self::STATE_PAYONE_CAPTURED,

        ];

        foreach ($groupStates as $groupState) {
            $this->setup->addStateMetaInfo($groupState, 'group', $this->getName());
        }
    }

}
