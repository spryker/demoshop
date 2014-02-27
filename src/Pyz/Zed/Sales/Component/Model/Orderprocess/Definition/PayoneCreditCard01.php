<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * @package Pyz\Zed\Sales\Component\Model\Orderprocess\Definition
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class PayoneCreditCard01 extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Orderprocess,
    PayoneFacadeInterface
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = self::ORDER_PROCESS_PAYONE_CREDIT_CARD_PSEUDO_01)
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
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessPayoneCreditCardPseudoPayone());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessInvoiceCreation());
        $this->setup->addDefinition($this->factory->createModelOrderprocessDefinitionSubprocessFulfillment());
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
    }

    protected function setStatesMetaInfo(array $states, $metaInfoName, $metaInfoValue)
    {
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, $metaInfoName, $metaInfoValue);
        }
    }

}
