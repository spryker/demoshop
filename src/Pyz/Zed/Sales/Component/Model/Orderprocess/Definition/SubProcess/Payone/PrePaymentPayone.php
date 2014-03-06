<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\Subprocess\Payone;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

class PrePaymentPayone
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements PayoneFacadeInterface, Orderprocess, PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @var \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;


    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payone PrePayment Subprocess')
    {
        parent::__construct($processName);
    }


    protected function createDefinition()
    {
        $setup = $this->getNewSetup();
        $setup->setInitialState(self::STATE_PAYONE_INIT_PAYMENT);

        $this->addTransitions();
        $this->addTimeouts();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_PAYONE_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_INVALID, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_TRANSACTION_STATUS_APPOINTED_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_PAYONE_UNDERPAID, self::EVENT_PAYONE_TRANSACTION_STATUS_UNDERPAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_UNDERPAID, self::STATE_PAYONE_UNDERPAID, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_UNDERPAID, self::STATE_PAYONE_UNDERPAID, self::EVENT_PAYONE_TRANSACTION_STATUS_UNDERPAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_UNDERPAID, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_TRANSACTION_STATUS_APPOINTED_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, null, self::RULE_PAYONE_TRANSACTION_APPOINTED_EXISTS);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_MANUALLY_SET_AUTHORIZED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REMINDED, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED, self::STATE_PAYONE_UNDERPAID, self::EVENT_PAYONE_TRANSACTION_STATUS_UNDERPAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REMINDED, self::STATE_PAYONE_UNDERPAID, self::EVENT_PAYONE_TRANSACTION_STATUS_UNDERPAID_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_MANUALLY_SET_PAID);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED, self::STATE_PAYONE_PAID, null, self::RULE_PAYONE_TRANSACTION_PAID_EXISTS);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_UNDERPAID, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_UNDERPAID, self::STATE_PAYONE_PAID, null, self::RULE_PAYONE_TRANSACTION_PAID_EXISTS);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_UNDERPAID, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_MANUALLY_SET_PAID);
    }

    protected function addTimeouts()
    {
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, null, 'timeout 1 day');
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_PAYONE_PAYMENT_REMINDED, null, 'timeout 7 days');
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REMINDED, self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED, null, array('timeout 23 days', \ProjectA_Zed_Library_StateMachine_Condition::negation(self::RULE_PAYONE_TRANSACTION_PAID_EXISTS)));
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REMINDED, self::STATE_PAYONE_PAID, null, self::RULE_PAYONE_TRANSACTION_PAID_EXISTS);
        $this->setup->addTransition(self::STATE_PAYONE_UNDERPAID, self::STATE_PAYONE_CLARIFY_UNDERPAID, null, 'timeout 7 days');
    }

    protected function addCommands()
    {
        $payoneStateMachineFacade = $this->facadePayone->createFacadeStateMachine();
        $this->setup->addCommand(self::STATE_PAYONE_INIT_PAYMENT, self::EVENT_ON_ENTER, $payoneStateMachineFacade->getCommandPreAuthorizeGrandTotal());
        $this->setup->addCommand(self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandMailOrderConfirmationMail());
        $this->setup->addCommand(self::STATE_INVALID, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandPurgeCodeUsage());
        $this->setup->addCommand(self::STATE_PAYONE_PAYMENT_REMINDED, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandMailPaymentReminderMail());
        $this->setup->addCommand(self::STATE_PAYONE_PAID, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandMailPaymentReceivedMail());
        $this->setup->addCommand(self::STATE_PAYONE_UNDERPAID, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandMailUnderpaidReminderMail());
        $this->setup->addCommand(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::EVENT_PAYONE_MANUALLY_SET_AUTHORIZED, $payoneStateMachineFacade->getCommandSimulateTransactionStatusPreAuthorizationAppointedGrandTotal());
        $this->setup->addCommand(self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED, self::EVENT_PAYONE_MANUALLY_SET_PAID, $payoneStateMachineFacade->getCommandSimulateTransactionStatusPreAuthorizationPaidGrandTotal());
        $this->setup->addCommand(self::STATE_PAYONE_CLARIFY_UNDERPAID, self::EVENT_PAYONE_MANUALLY_SET_PAID, $payoneStateMachineFacade->getCommandSimulateTransactionStatusPreAuthorizationPaidGrandTotal());
    }

    protected function addMetaInfo()
    {
        $this->setStatesMetaInfo(
            [
                self::STATE_PAYONE_INIT_PAYMENT,
                self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT,
                self::STATE_PAYONE_PAYMENT_AUTHORIZED,
                self::STATE_PAYONE_PAID,
                self::STATE_PAYONE_UNDERPAID,
                self::STATE_PAYONE_CLARIFY_UNDERPAID,
                self::STATE_PAYONE_PAYMENT_REMINDED,
                self::STATE_INVALID,
                self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED,
                self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT
            ],
            'group',
            $this->getName()
        );

        $this->setup->setHappyCaseStates(
            [
                self::STATE_PAYONE_INIT_PAYMENT,
                self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT,
                self::STATE_PAYONE_PAYMENT_AUTHORIZED,
                self::STATE_PAYONE_PAID,
                //self::STATE_PAYONE_COMPLETED,
            ]
        );
    }

    protected function addFlags()
    {
        $this->setup->addStateMetaInfo(self::STATE_INVALID, self::FLAG_EXCLUDE_FROM_INVOICE, true);

        $reservedStates = [
            self::STATE_PAYONE_INIT_PAYMENT,
            self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT,
            self::STATE_PAYONE_PAYMENT_AUTHORIZED,
            self::STATE_PAYONE_PAYMENT_REMINDED,
            self::STATE_PAYONE_PAID,
            self::STATE_PAYONE_UNDERPAID,
            self::STATE_PAYONE_CLARIFY_UNDERPAID,
            self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED,
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT
        ];
        $this->setStatesMetaInfo($reservedStates, self::FLAG_RESERVED, true);

        $clarifyStates = [
            self::STATE_PAYONE_CLARIFY_UNDERPAID,
            self::STATE_PAYONE_CLARIFY_PAYMENT_REMINDED,
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT
        ];
        $this->setStatesMetaInfo($clarifyStates, self::FLAG_CLARIFY, true);
    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }
}
