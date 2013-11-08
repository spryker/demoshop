<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use Pyz\Shared\Payone\Code\ProcessConstants as PaymentConstants;

/**
 * Class PaypalPayone
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Definition
 */
class PaypalPayone extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements Orderprocess
{
    /**
     * @var \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;


    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_PAYPAL_PAYONE)
    {
        parent::__construct($processName);
    }

    protected function createDefinition()
    {
        $setup = $this->getNewSetup();
        $setup->setInitialState(self::STATE_NEW);

        $this->addTransitions();
        $this->addTimeouts();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addDefinitions();
        $this->addSubProcessConnections();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransitionManual(
            self::STATE_NEW,
            self::STATE_PAYMENT_REDIRECTED,
            self::EVENT_ON_ENTER,
            PaymentConstants::RULE_PAYMENT_REDIRECTED
        );
        $this->setup->addTransitionManual(
            self::STATE_PAYMENT_REDIRECTED,
            self::STATE_PAYMENT_PREPARED,
            self::EVENT_PAYMENT_INFO_IS_RECEIVED,
            PaymentConstants::RULE_PAYMENT_APPOINTED
        );
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_INVALID, self::EVENT_ON_ENTER);

        $this->setup->addTransitionManual(self::STATE_CLOSED, self::STATE_FINALLY_CLOSED, self::EVENT_CLOSE);
    }

    protected function addTimeouts()
    {
        $this->setup->addTransitionManual(self::STATE_NEW, self::STATE_INVALID, null, 'timeout 1 day');
        $this->setup->addTransitionManual(self::STATE_PAYMENT_REDIRECTED, self::STATE_INVALID, null, 'timeout 1 day');
    }

    protected function addDefinitions()
    {
    }

    protected function addCommands()
    {
        $paypalAuthCommand = $this->factory->createModelOrderprocessCommandPayonePaypalAuthorise();
        $this->setup->addCommand(self::STATE_NEW, self::EVENT_ON_ENTER, $paypalAuthCommand);

        $codePurgeCommands = $this->factory->createModelOrderprocessCommandPurgeCodeUsage();
        $this->setup->addCommand(self::STATE_INVALID, self::EVENT_ON_ENTER, $codePurgeCommands);
    }

    protected function addMetaInfo()
    {
        $this->setStatesMetaInfo(
            [
                self::STATE_NEW,
                self::STATE_INVALID,
                self::STATE_PAYMENT_PREPARED,
                self::STATE_PAYMENT_REDIRECTED,
            ],
            'group',
            $this->getName() . ' Start'
        );

        $this->setStatesMetaInfo(
            [
                self::STATE_CLOSED,
                self::STATE_FINALLY_CLOSED,
            ],
            'group',
            $this->getName() . ' End'
        );

        $this->setup->setHappyCaseStates(
            [
                self::STATE_NEW,
                self::STATE_CLOSED,
                self::STATE_PAYMENT_REDIRECTED,
                self::STATE_PAYMENT_PREPARED
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
