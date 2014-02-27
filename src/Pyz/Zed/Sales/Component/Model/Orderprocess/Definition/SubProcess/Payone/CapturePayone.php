<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\Subprocess\Payone;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * Class Capture
 * @package Mig\Zed\Sales\Component\Model\Orderprocess\Definition\Subprocess
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class CapturePayone
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
    implements PayoneFacadeInterface, Orderprocess, PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payone Capture Process')
    {
        parent::__construct($processName);
    }

    /**
     */
    protected function createDefinition()
    {
        $this->getNewSetup();
        $this->addTransitions();
        $this->addMetaInfo();
        $this->addTimeouts();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_PAYONE_INIT_CAPTURE_PROCESS, self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_PAYONE_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_CAPTURE_PROCESS, self::STATE_PAYONE_CLARIFY_CAPTURE_FAILED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_CAPTURE_FAILED, self::STATE_PAYONE_INIT_CAPTURE_PROCESS, self::EVENT_PAYONE_RETRY_CAPTURE);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_PAYONE_CAPTURED, self::EVENT_PAYONE_TRANSACTION_STATUS_CAPTURE_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_PAYONE_CAPTURED, self::EVENT_PAYONE_TRANSACTION_STATUS_CAPTURE_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_PAYONE_CAPTURED, self::EVENT_PAYONE_MANUALLY_SET_CAPTURED);
    }

    protected function addCommands()
    {
        $payoneStateMachineFacade = $this->facadePayone->createFacadeStateMachine();
        $this->setup->addCommand(self::STATE_PAYONE_INIT_CAPTURE_PROCESS, self::EVENT_ON_ENTER, $payoneStateMachineFacade->getCommandCaptureGrandTotal());
        $this->setup->addCommand(self::STATE_PAYONE_CLARIFY_WAITING_FOR_CAPTURE_APPOINTMENT, self::EVENT_PAYONE_MANUALLY_SET_CAPTURED, $payoneStateMachineFacade->getCommandSimulateTransactionStatusCaptureGrandTotal());
    }

    protected function addTimeouts()
    {
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_PAYONE_CLARIFY_WAITING_FOR_CAPTURE_APPOINTMENT, null, 'timeout 1 day');
    }

    protected function addMetaInfo()
    {
        $groupStates = [
            self::STATE_PAYONE_INIT_CAPTURE_PROCESS,
            self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT,
            self::STATE_PAYONE_CLARIFY_CAPTURE_FAILED,
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_CAPTURE_APPOINTMENT,
            self::STATE_PAYONE_CAPTURED,
        ];
        foreach ($groupStates as $groupState) {
            $this->setup->addStateMetaInfo($groupState, 'group', $this->getName());
        }

        $this->setup->setHappyCaseStates(
            [
                self::STATE_PAYONE_INIT_CAPTURE_PROCESS,
                self::STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT,
                self::STATE_PAYONE_CAPTURED,
            ]
        );


    }

    protected function addFlags()
    {
        $reservedStates = $this->getStateNameList();
        foreach ($reservedStates as $stateName) {
            $this->setup->setReserved($stateName);
        }

        $clarifyStates = [
            self::STATE_PAYONE_CLARIFY_CAPTURE_FAILED,
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_CAPTURE_APPOINTMENT
        ];
        foreach ($clarifyStates as $stateName) {
            $this->setup->addStateMetaInfo($stateName, self::FLAG_CLARIFY, true);
        }
    }

}
