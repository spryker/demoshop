<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess\Payone;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

/**
 * Class PaypalPayone
 * @package Mig\Zed\Sales\Component\Model\Orderprocess\Definition
 */
class PaypalPayone extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements Orderprocess, PayoneFacadeInterface, PayoneStateMachineConstants
{

    use PayoneFacadeTrait;
    /**
     * @var \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;


    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payone Paypal Subprocess')
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
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_PAYONE_PAYMENT_REDIRECTED, self::EVENT_ON_ENTER, self::RULE_PAYONE_TRANSACTION_IS_REDIRECT);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_PAYONE_TRANSACTION_STATUS_APPOINTED_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_INVALID, self::EVENT_REDIRECT_PAYMENT_CANCELLED_REGULAR);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_MANUALLY_SET_PAID);
        $this->setup->addTransition(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::STATE_PAYONE_PAID, null, self::RULE_PAYONE_TRANSACTION_PAID_EXISTS);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_PAYONE_PAID, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_INVALID, self::EVENT_ON_ENTER);
    }

    protected function addTimeouts()
    {
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_INVALID, null, 'timeout 1 day');
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, null, 'timeout 1 day');
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_INVALID, null, array('timeout 1 day', \ProjectA_Zed_Library_StateMachine_Condition::negation(self::RULE_PAYONE_TRANSACTION_APPOINTED_EXISTS)));
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::STATE_PAYONE_PAYMENT_AUTHORIZED, null, self::RULE_PAYONE_TRANSACTION_APPOINTED_EXISTS);
    }

    protected function addCommands()
    {
        $payoneStateMachineFacade = $this->facadePayone->createFacadeStateMachine();
        $this->setup->addCommand(self::STATE_PAYONE_INIT_PAYMENT, self::EVENT_ON_ENTER,$payoneStateMachineFacade->getCommandAuthorizeGrandTotal());
        $this->setup->addCommand(self::STATE_INVALID, self::EVENT_ON_ENTER,$this->factory->createModelOrderprocessCommandPurgeCodeUsage());
        $this->setup->addCommand(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::EVENT_ON_ENTER,$this->factory->createModelOrderprocessCommandMailOrderConfirmationMail());
        $this->setup->addCommand(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::EVENT_PAYONE_MANUALLY_SET_PAID, $payoneStateMachineFacade->getCommandSimulateTransactionStatusAuthorizationPaidGrandTotal());
    }

    protected function addMetaInfo()
    {
        $this->setStatesMetaInfo(
            [
                self::STATE_PAYONE_INIT_PAYMENT,
                self::STATE_INVALID,
                self::STATE_PAYONE_PAYMENT_AUTHORIZED,
                self::STATE_PAYONE_PAYMENT_REDIRECTED,
                self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID,
                self::STATE_PAYONE_PAID
            ],
            'group',
            $this->getName()
        );

        $this->setup->setHappyCaseStates(
            [
                self::STATE_PAYONE_INIT_PAYMENT,
                self::STATE_PAYONE_PAYMENT_REDIRECTED,
                self::STATE_PAYONE_PAYMENT_AUTHORIZED,
                self::STATE_PAYONE_PAID
            ]
        );
    }

    protected function addFlags()
    {
        $this->setup->addStateMetaInfo(self::STATE_INVALID, self::FLAG_EXCLUDE_FROM_INVOICE, true);
        $this->setup->addStateMetaInfo(self::STATE_PAYONE_INIT_PAYMENT, self::FLAG_RESERVED, true);
        $this->setup->addStateMetaInfo(self::STATE_PAYONE_PAYMENT_REDIRECTED, self::FLAG_RESERVED, true);
        $this->setup->addStateMetaInfo(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::FLAG_RESERVED, true);
        $this->setup->addStateMetaInfo(self::STATE_PAYONE_PAID, self::FLAG_RESERVED, true);
        $this->setup->addStateMetaInfo(self::STATE_PAYONE_CLARIFY_WAITING_FOR_PAID, self::FLAG_RESERVED, true);
    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }
}
