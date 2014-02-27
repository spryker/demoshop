<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\Subprocess\Payone;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

/**
 * Class CreditCard
 * @package Mig\Zed\Sales\Component\Model\Orderprocess\Definition
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class CreditCardPseudoPayone
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements PayoneFacadeInterface, Orderprocess, PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payone Credit Card Pseudo Subprocess')
    {
        parent::__construct($processName);
    }

    protected function createDefinition()
    {
        $setup = $this->getNewSetup();
        $setup->setInitialState(self::STATE_PAYONE_INIT_PAYMENT);

        $this->addTransitions();
        $this->addMetaInfo();
        $this->addTimeouts();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_PAYONE_PAYMENT_REDIRECTED, self::EVENT_ON_ENTER, self::RULE_PAYONE_TRANSACTION_IS_REDIRECT);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_PAYONE_PAYMENT_NOT_REDIRECTED, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_NOT_REDIRECTED, self::STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_PAYONE_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_NOT_REDIRECTED, self::STATE_INVALID, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_TRANSACTION_STATUS_APPOINTED_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_INVALID, self::EVENT_REDIRECT_PAYMENT_CANCELLED_REGULAR);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_TRANSACTION_STATUS_APPOINTED_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_TRANSACTION_STATUS_APPOINTED_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_MANUALLY_SET_AUTHORIZED);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_AUTHORIZED, null, self::RULE_PAYONE_TRANSACTION_APPOINTED_EXISTS);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_MANUALLY_SET_PAID);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::STATE_PAYONE_PAID, null, self::RULE_PAYONE_TRANSACTION_PAID_EXISTS);
    }

    protected function addTimeouts()
    {
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_INVALID, null, array('timeout 1 day', \ProjectA_Zed_Library_StateMachine_Condition::negation(self::RULE_PAYONE_TRANSACTION_APPOINTED_EXISTS)));
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_PAYONE_PAYMENT_AUTHORIZED, null, self::RULE_PAYONE_TRANSACTION_APPOINTED_EXISTS);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT, null, 'timeout 1 day');
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, null, 'timeout 1 day');
    }

    protected function addCommands()
    {
        $payoneStateMachineFacade = $this->facadePayone->createFacadeStateMachine();
        $this->setup->addCommand(self::STATE_PAYONE_INIT_PAYMENT, self::EVENT_ON_ENTER, $payoneStateMachineFacade->getCommandAuthorizeGrandTotal());
        $this->setup->addCommand(self::STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandMailOrderConfirmationMail());
        $this->setup->addCommand(self::STATE_INVALID, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandPurgeCodeUsage());
        $this->setup->addCommand(self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT, self::EVENT_PAYONE_MANUALLY_SET_AUTHORIZED, $payoneStateMachineFacade->getCommandSimulateTransactionStatusAuthorizationAppointedGrandTotal());
        $this->setup->addCommand(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::EVENT_PAYONE_MANUALLY_SET_PAID, $payoneStateMachineFacade->getCommandSimulateTransactionStatusAuthorizationPaidGrandTotal());
    }

    protected function addMetaInfo()
    {
        $this->setStatesMetaInfo(
            [
                self::STATE_PAYONE_INIT_PAYMENT,
                self::STATE_INVALID,
                self::STATE_PAYONE_PAYMENT_REDIRECTED,
                self::STATE_PAYONE_PAYMENT_NOT_REDIRECTED,
                self::STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT,
                self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT,
                self::STATE_PAYONE_PAYMENT_AUTHORIZED,
                self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID,
                self::STATE_PAYONE_PAID,
            ], 'group', $this->getName());

        $this->setup->setHappyCaseStates(
            [
                self::STATE_PAYONE_INIT_PAYMENT,
                self::STATE_PAYONE_PAYMENT_NOT_REDIRECTED,
                self::STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT,
                self::STATE_PAYONE_PAYMENT_AUTHORIZED,
                self::STATE_PAYONE_PAID,
            ]
        );
    }

    protected function addFlags()
    {
        $this->setup->addStateMetaInfo(self::STATE_INVALID, self::FLAG_EXCLUDE_FROM_INVOICE, true);
        $reservedStates = [
            self::STATE_PAYONE_INIT_PAYMENT,
            self::STATE_PAYONE_PAYMENT_REDIRECTED,
            self::STATE_PAYONE_PAYMENT_NOT_REDIRECTED,
            self::STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT,
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT,
            self::STATE_PAYONE_PAYMENT_AUTHORIZED,
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID,
            self::STATE_PAYONE_PAID
        ];
        $this->setStatesMetaInfo($reservedStates, self::FLAG_RESERVED, true);

        $clarifyStates = [
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID,
            self::STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT
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
