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
class PayoneInvoice extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess,
    PayoneFacadeInterface,
    PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_PAYONE_INVOICE)
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
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneInvoice());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneCapture());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubProcessClosed());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneDunning());
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

        $this->setStatesMetaInfo(
            [
                self::STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT,
                self::STATE_CLOSED
            ], 'group', $this->getName() . ' Invoice End');


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
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_PREAUTHORIZED, self::STATE_PAYONE_INIT_CAPTURE, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_CAPTURED, self::STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT, self::STATE_CLOSED, self::EVENT_PAYONE_TRANSACTION_STATUS_PAID_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_CLOSED, self::STATE_DEMO_A, self::EVENT_DEMO_START_TEST);
        $this->setup->setTimeout(self::STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT, self::STATE_PAYONE_INIT_DUNNING, '15 days');
    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }

}
