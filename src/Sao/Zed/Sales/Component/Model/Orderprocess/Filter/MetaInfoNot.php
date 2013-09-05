<?php
/**
 * Class Sao_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfoNot
 *
 * the generic one does not work if testing for false
 *
 */

class Sao_Zed_Sales_Component_Model_Orderprocess_Filter_MetaInfoNot extends FilterIterator implements ProjectA_Zed_Sales_Component_Interface_StateInfoConstant
{

    /**
     * @var ProjectA_Zed_Library_StateMachine_Definition_Factory
     */
    private $factory;
    /**
     * @var ProjectA_Zed_Library_StateMachine_CurrentState
     */
    private $currentState;
    /**
     * @var array
     */
    private $metaInfoConditionMap;

    /**
     *
     * $metaInfoConditionMap example:
     *      array(self::RESERVED => true)
     * or:
     *      array(self::RESERVED => true, self::SOMETHING => false, self::ANOTHER => null)
     *
     * @param Iterator $orderItems
     * @param ProjectA_Zed_Library_StateMachine_Definition_Factory $factory
     * @param ProjectA_Zed_Library_StateMachine_CurrentState $currentState
     * @param array $metaInfoConditionMap
     */
    public function __construct(Iterator $orderItems,
                                ProjectA_Zed_Library_StateMachine_Definition_Factory $factory,
                                ProjectA_Zed_Library_StateMachine_CurrentState $currentState,
                                array $metaInfoConditionMap)
    {
        parent::__construct($orderItems);
        $this->factory = $factory;
        $this->currentState = $currentState;
        $this->metaInfoConditionMap = $metaInfoConditionMap;
    }

    /**
     * @see FilterIterator::accept()
     */
    public function accept()
    {
        /* @var $orderItem ProjectA_Zed_Sales_Persistence_PacSalesOrderItem */
        $orderItem = $this->current();
        $definition = $this->factory->getDefintion($orderItem);
        $stateName = $this->currentState->getCurrentStateName($orderItem);
        $state = $definition->getState($stateName);

        foreach ($this->metaInfoConditionMap as $key => $value) {
            if ($state->getInfo($key) === $value) {
                return false;
            }
        }
        return true;
    }
}