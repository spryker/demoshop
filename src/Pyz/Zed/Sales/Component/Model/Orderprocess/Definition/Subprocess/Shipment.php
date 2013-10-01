<?php

class Pyz_Zed_Sales_Component_Model_Orderprocess_Definition_Subprocess_Shipment
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements Pyz_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ()
    {
        parent::__construct('Demo shipment');
    }

    /**
     *
     */
    protected function createDefinition ()
    {
        $setup = $this->getNewSetup();

        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransitionManual(self::STATE_INIT_SHIPMENT, self::STATE_EXPORTED, self::EVENT_START_SHIPMENT_EXPORT);
        $this->setup->addTransitionManual(self::STATE_EXPORTED, self::STATE_SHIPPED, self::EVENT_SHIPMENT_NOTIFICATION_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_EXPORTED, self::STATE_CLARIFY_SHIPMENT, self::EVENT_NO_SHIPMENT_NOTIFICATION_RECEIVED);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_SHIPMENT, self::STATE_INIT_SHIPMENT, self::EVENT_MANUAL_REEXPORT);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_SHIPMENT, self::STATE_SHIPPED, self::EVENT_MANUAL_SHIPMENT_CLARIFIED);
    }

    protected function addCommands()
    {

    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_SHIPMENT,
            self::STATE_EXPORTED,
            self::STATE_SHIPPED,
            self::STATE_CLARIFY_SHIPMENT
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', 'shipment');
        }

        $states = array(
            self::STATE_INIT_SHIPMENT,
            self::STATE_EXPORTED,
            self::STATE_SHIPPED
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {

    }

}
