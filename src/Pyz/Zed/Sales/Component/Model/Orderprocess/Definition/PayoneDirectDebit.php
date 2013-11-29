<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

/**
 * Class CreditCard
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Definition
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class PayoneDirectDebit extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess,
    PayoneFacadeInterface,
    PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_PAYONE_DIRECT_DEBIT)
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

    }

    protected function addDefinitions()
    {
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessNewOrder());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneDirectDebit());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessClosed());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneCancellation());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessTest());
    }

    protected function addCommands()
    {

    }

    protected function addMetaInfo()
    {
        $this->setStatesMetaInfo(
            [
                self::STATE_NEW
            ], 'group', $this->getName() . ' Start');

        $this->setup->setHappyCaseStates(
            [
                self::STATE_NEW
            ]
        );
    }

    protected function addFlags()
    {
    }

    protected function addSubProcessConnections()
    {
        $this->setup->addTransition(self::STATE_NEW, self::STATE_PAYONE_INIT_PAYMENT, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_AUTHORIZED, self::STATE_CLOSED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_CLOSED, self::STATE_DEMO_A, self::EVENT_DEMO_START_TEST);
        $this->setup->addTransition(self::STATE_CLOSED, self::STATE_PAYONE_INIT_CANCELLATION, self::EVENT_PAYONE_TRANSACTION_STATUS_CANCELATION_RECEIVED);
    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }

}
