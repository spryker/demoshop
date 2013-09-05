<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Cancellation extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Cancellation Process')
    {
        parent::__construct($processName);
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
        $this->setup->addTransition(self::STATE_INIT_CANCELLATION_PROCESS, self::STATE_CANCELED, self::EVENT_ON_ENTER);
    }

    protected function addCommands()
    {

    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_CANCELLATION_PROCESS,
            self::STATE_CANCELED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }

    protected function addFlags()
    {

    }
}
