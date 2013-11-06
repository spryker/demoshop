<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess;

use Generated\Zed\Stripe\Component\Dependency\StripeFacadeInterface;
use Generated\Zed\Stripe\Component\Dependency\StripeFacadeTrait;
use ProjectA\Zed\Stripe\Component\Constants\StateMachineConstants as PaymentConstants;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * Class Capture
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Capture extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess,
    StripeFacadeInterface
{

    use StripeFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Capture Process')
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
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_INIT_CAPTURE_PROCESS, self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT, self::EVENT_ON_ENTER, PaymentConstants::RULE_STRIPE_PAYMENT_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_INIT_CAPTURE_PROCESS, self::STATE_CLARIFY_CAPTURE_FAILED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT, self::STATE_CAPTURED, self::EVENT_ON_ENTER);
    }

    protected function addCommands()
    {
        $this->setup->addCommand(self::STATE_INIT_CAPTURE_PROCESS, self::EVENT_ON_ENTER,
            $this->facadeStripe->createFacadeStateMachine()->getCommandCaptureGrandTotal()
        );
    }

    protected function addMetaInfo()
    {
        $groupStates = [
            self::STATE_INIT_CAPTURE_PROCESS,
            self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT,
            self::STATE_CLARIFY_CAPTURE_FAILED,
            self::STATE_CAPTURED,
        ];
        foreach ($groupStates as $groupState) {
            $this->setup->addStateMetaInfo($groupState, 'group', $this->getName());
        }

        $this->setup->setHappyCaseStates(
            [
                self::STATE_INIT_CAPTURE_PROCESS,
                self::STATE_WAITING_FOR_CAPTURE_APPOINTMENT,
                self::STATE_CAPTURED,
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
            self::STATE_CLARIFY_CAPTURE_FAILED,
        ];
        foreach ($clarifyStates as $stateName) {
            $this->setup->addStateMetaInfo($stateName, self::FLAG_CLARIFY, true);
        }
    }

}
