<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

/**
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Definition
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class PayoneDirectDebit01 extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess,
    PayoneFacadeInterface,
    PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_PAYONE_DIRECT_DEBIT_01)
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
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessNewOrder());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneDirectDebitPayone());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessInvoiceCreation());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessFulfillment());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessCompleted());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneReturnDebitNotePayone());
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
        $this->setup->addTransition(self::STATE_PAYONE_PAID, self::STATE_READY_FOR_INVOICE_CREATION, null, []);
        $this->setup->addTransitionManual(self::STATE_INVOICE_CREATED, self::STATE_INIT_FULFILLMENT_PROCESS, null, []);
        $this->setup->addTransitionManual(self::STATE_FULFILLED, self::STATE_COMPLETED_BUT_REVERSIBLE, null, []);
        $this->setup->addTransitionManual(self::STATE_COMPLETED_BUT_REVERSIBLE, self::STATE_PAYONE_INIT_CANCELLATION, PayoneStateMachineConstants::EVENT_PAYONE_TRANSACTION_STATUS_CANCELATION_RECEIVED);
    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }

}
