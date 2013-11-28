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
class DirectDebitCancellation
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements PayoneFacadeInterface, Orderprocess, PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payment Direct Debit Cancellation Subprocess (Payone)')
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
        $this->setup->addTransition(self::STATE_PAYONE_INIT_DIRECT_DEBIT_CANCELLATION, self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_OBJECTIVE, self::EVENT_ON_ENTER, self::RULE_PAYONE_DIRECT_DEBIT_CANELLATION_IS_OBJECTIVE);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_DIRECT_DEBIT_CANCELLATION, self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_RETURN, self::EVENT_ON_ENTER, self::RULE_PAYONE_DIRECT_DEBIT_CANELLATION_IS_RETURN);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_DIRECT_DEBIT_CANCELLATION, self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_CLARIFY, self::EVENT_ON_ENTER);

        $this->setup->addTransitionManual(self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_CLARIFY, self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_RETURN, self::EVENT_PAYONE_MANUAL_CLARIFIED_CANCELLATION_RETURN);
        $this->setup->addTransitionManual(self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_CLARIFY, self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_OBJECTIVE, self::EVENT_PAYONE_MANUAL_CLARIFIED_CANCELLATION_OBJECTIVE);
    }

    protected function addCommands()
    {
        $payoneAuthorizeCommand = $this->facadePayone->createFacadeStateMachine()->getCommandAuthorizeGrandTotal();
        $this->setup->addCommand(self::STATE_PAYONE_INIT_PAYMENT, self::EVENT_ON_ENTER, $payoneAuthorizeCommand);
    }

    protected function addFlags()
    {
    }

    protected function addMetaInfo()
    {
        $groupStates = [
            self::STATE_PAYONE_INIT_DIRECT_DEBIT_CANCELLATION,
            self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_OBJECTIVE,
            self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_RETURN,
            self::STATE_PAYONE_DIRECT_DEBIT_CANCELLATION_CLARIFY,

        ];

        foreach ($groupStates as $groupState) {
            $this->setup->addStateMetaInfo($groupState, 'group', $this->getName());
        }
    }

}
