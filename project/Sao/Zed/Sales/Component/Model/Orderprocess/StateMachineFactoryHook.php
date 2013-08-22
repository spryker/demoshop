<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_StateMachineFactoryHook implements
    ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook,
    ProjectA_Zed_Stripe_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Adyen_Component_Dependency_Facade_Interface,
    ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Stripe_Component_Dependency_Facade_Trait;
    use ProjectA_Zed_Adyen_Component_Dependency_Facade_Trait;
    /**
     * @var Sao_Zed_Sales_Component_Factory
     */
    private $factory;

    /**
     * @param ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory
     */
    public function setFactory (ProjectA_Zed_Library_Component_Interface_FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * @return ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule_Collection
     */
    protected function getRules ()
    {
        $rules = new ProjectA_Zed_Library_StateMachine_Transition_Guard_Rule_Collection();
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleIsNationalShipment());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleItemPriceGreaterThan1500());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleIsArtworkAvailable());
        $rules->addRule($this->factory->getModelOrderprocessGuardRulePrintFileApproved());
        $rules->addRule($this->facadeStripe->getFacadeStateMachine()->getRulePaymentTransactionApproved());
        $rules->addRule($this->facadeAdyen->getFacadeStateMachine()->getRulePaymentTransactionApproved());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleProductIsOriginal());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleProductIsPrint());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleProductIsLimitedEdition());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleAllItemsOfQuotePrintable());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleExportSuccessful());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleSendSalesNotification());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleGetCustomerInformation());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleItemHasQuote());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleTrackingHasReceivedTrackingNumber());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleTrackingHasReceivedPickupInfo());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleTrackingHasReceivedDeliveryInfo());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleTrackingHasReceivedBookInfo());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleIsArtworkBlockNeeded());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleRemoveSalesNotification());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleLessThanThirtyUniqueItems());
        $rules->addRule($this->factory->getModelOrderprocessGuardRuleIsMarkedForRefund());
        return $rules;
    }

    /**
     * @param ProjectA_Zed_Library_StateMachine $stateMachine
     * @return ProjectA_Zed_Library_StateMachine
     */
    public function onStateMachineWasCreated (ProjectA_Zed_Library_StateMachine $stateMachine)
    {
        $guards = new ProjectA_Zed_Library_StateMachine_Transition_Guard_Composite();
        $guards->addGuard($this->getRules());
        $guards->addGuard($stateMachine->getGuard());
        $stateMachine->setGuard($guards);
        $stateMachine->attach($this->factory->getModelOrderprocessStateMachineWatchdogObserver());
        return $stateMachine;
    }

}
