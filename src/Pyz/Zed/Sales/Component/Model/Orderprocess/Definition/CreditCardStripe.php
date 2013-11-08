<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition;

use Generated\Zed\Stripe\Component\Dependency\StripeFacadeInterface;
use Generated\Zed\Stripe\Component\Dependency\StripeFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Stripe\Component\Constants\StateMachineConstants as PaymentConstants;

/**
 * Class CreditCard
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Definition
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class CreditCardStripe extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess,
    StripeFacadeInterface
{

    use StripeFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_CREDIT_CARD_STRIPE)
    {
        parent::__construct($processName);
    }

    protected function createDefinition()
    {
        $setup = $this->getNewSetup();
        $setup->setInitialState(self::STATE_NEW);

        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addDefinitions();
        $this->addSubProcessConnections();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_WAITING_FOR_AUTHORIZE_APPOINTMENT, self::EVENT_ON_ENTER, PaymentConstants::RULE_STRIPE_PAYMENT_TRANSACTION_APPROVED);
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_INVALID, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_AUTHORIZE_APPOINTMENT, self::STATE_APPOINTED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_CLOSED, self::STATE_FINALLY_CLOSED, self::EVENT_CLOSE);
    }

    protected function addDefinitions()
    {
        // TODO: add sub processes
        //$this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessCapture());
    }

    protected function addCommands()
    {
        $stripeChargeCommand = $this->facadeStripe->createFacadeStateMachine()->getCommandChargeGrandTotal();
        $this->setup->addCommand(self::STATE_NEW, self::EVENT_ON_ENTER, $stripeChargeCommand);
    }

    protected function addMetaInfo()
    {
        $this->setStatesMetaInfo(
            [
                self::STATE_NEW,
                self::STATE_INVALID,
                self::STATE_WAITING_FOR_AUTHORIZE_APPOINTMENT,
                self::STATE_APPOINTED,
            ], 'group', $this->getName() . ' Start');

        $this->setStatesMetaInfo(
            [
                self::STATE_CLOSED,
                self::STATE_FINALLY_CLOSED,
            ], 'group', $this->getName() . ' End');

        $this->setup->setHappyCaseStates(
            [
                self::STATE_NEW,
                self::STATE_CLOSED,
                self::STATE_FINALLY_CLOSED
            ]
        );
    }

    protected function addFlags()
    {
    }

    protected function addSubProcessConnections()
    {
    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }

}
