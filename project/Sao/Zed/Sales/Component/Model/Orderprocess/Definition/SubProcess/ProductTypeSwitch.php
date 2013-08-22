<?php
/**
 * @property Sao_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_ProductTypeSwitch extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant,
    ProjectA_Zed_Adyen_Component_Dependency_Facade_Interface
{

    use ProjectA_Zed_Adyen_Component_Dependency_Facade_Trait;

    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Product Type Switch')
    {
        parent::__construct($processName);
    }

    protected function createDefinition ()
    {
        $setup = $this->getNewSetup();
        $this->addTransitions();
        $this->addMetaInfo();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_INIT_PRODUCT_TYPE_SWITCH, self::STATE_ORIGINAL_PRODUCT_DETECTED, self::EVENT_ON_ENTER, self::RULE_IS_ORIGINAL_PRODUCT);
        $this->setup->addTransition(self::STATE_INIT_PRODUCT_TYPE_SWITCH, self::STATE_PRINT_PRODUCT_DETECTED, self::EVENT_ON_ENTER, self::RULE_IS_PRINT_PRODUCT);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_PRODUCT_TYPE_SWITCH,
            self::STATE_ORIGINAL_PRODUCT_DETECTED,
            self::STATE_PRINT_PRODUCT_DETECTED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }

        $states = array(
            self::STATE_INIT_PRODUCT_TYPE_SWITCH,
            self::STATE_ORIGINAL_PRODUCT_DETECTED,
            self::STATE_PRINT_PRODUCT_DETECTED
        );
        $this->setup->setHappyCaseStates($states);
    }
}
