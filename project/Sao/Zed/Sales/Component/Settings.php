<?php

/**
 * @author jstick
 */
class Sao_Zed_Sales_Component_Settings extends ProjectA_Zed_Sales_Component_Settings implements ProjectA_Zed_Library_Dependency_Factory_Interface
{

    use ProjectA_Zed_Library_Dependency_Factory_Trait;

    /**
     * @var Sao_Zed_Sales_Component_Factory
     */
    protected $factory;

    /**
     * @var ProjectA_Zed_Library_StateMachine_Definition_Container
     */
    protected static $definition;

    /**
     * @var ProjectA_Zed_Sales_Component_Interface_StatemachineFactoryHook
     */
    protected static $hook;
    
    /**
     * @return ProjectA_Zed_Library_StateMachine_Definition_Matcher
     */
    public function getStateMachineMatcher()
    {
        return $this->factory->getModelOrderprocessStateMachineMatcherOrderItem();
    }

    /**
     * @return Pac_Sales_Interface_StateMachineFactoryHook
     */
    public function getStateMachineFactoryHook()
    {
        if (null === self::$hook) {
            self::$hook = $this->factory->getModelOrderprocessStateMachineFactoryHook();
        }
        return self::$hook;
    }

    /**
     * @param string $paymentMethod
     * @return string
     */
    public function getProcessNameByPaymentMethod($paymentMethod)
    {
        $query = new ProjectA_Zed_Sales_Persistence_PacSalesOrderProcessQuery();
        return $query->findOneByName($paymentMethod)->getName();
    }

    /**
     * @return ProjectA_Zed_Library_StateMachine_Definition_Container
     */
    public function getStatemachineDefinitionContainer()
    {
        if (null === self::$definition) {
            self::$definition = $this->factory->getModelOrderprocessDefinitionContainer();
        }
        return self::$definition;
    }

    /**
     * @return array
     */
    public function getExpenseCalculators()
    {
        return array();
    }

    /**
     *
     * @return array
     */
    public function getOrderIncrementKeys()
    {
        return array('2', '5', '9', '3', '8', '1', '7', '6', '4');
    }

    /**
     *
     * @return array
     */
    public function getOrderIncrementPrefix()
    {
        return '1';
    }

    /**
     *
     * @return int
     */
    public function getOrderIncrementDigits()
    {
        return 11;
    }

}
