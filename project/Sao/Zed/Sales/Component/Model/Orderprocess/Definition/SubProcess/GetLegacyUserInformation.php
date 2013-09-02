<?php

class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_GetLegacyUserInformation
    extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /**
     *
     * @var Generated_Zed_Sales_Component_Factory
     */
    protected $factory;

    /**
     *
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     *
     * @param string $processName
     */
    public function __construct($processName = 'Get Legacy User Information')
    {
        parent::__construct($processName, false);
    }

    /**
     */
    protected function createDefinition()
    {
        $setup = $this->getNewSetup();

        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_LEGACY_GET_USER_INFORMATION, self::STATE_CLARIFY_LEGACY_GET_USER_INFORMATION_FAILED, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_LEGACY_GET_USER_INFORMATION, self::STATE_FETCHED_LEGACY_USER_INFORMATION, self::EVENT_ON_ENTER, self::RULE_LEGACY_GET_USER_INFORMATION_SUCCESSFUL);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_LEGACY_GET_USER_INFORMATION_FAILED, self::STATE_LEGACY_GET_USER_INFORMATION, self::EVENT_RETRY_LEGACY_GET_USER_INFORMATION);
    }

    protected function addCommands()
    {
        $getLegacyUserInformationCommand = $this->factory->getModelOrderprocessCommandArtPortalGetUserInformation();
        $this->setup->addCommand(self::STATE_LEGACY_GET_USER_INFORMATION, self::EVENT_ON_ENTER, $getLegacyUserInformationCommand);
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_LEGACY_GET_USER_INFORMATION,
            self::STATE_CLARIFY_LEGACY_GET_USER_INFORMATION_FAILED,
            self::STATE_FETCHED_LEGACY_USER_INFORMATION,
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }

        $states = array(
            self::STATE_LEGACY_GET_USER_INFORMATION,
            self::STATE_FETCHED_LEGACY_USER_INFORMATION,
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $setup  = $this->getNewSetup();
        $states = array(
            self::STATE_LEGACY_GET_USER_INFORMATION,
            self::STATE_CLARIFY_LEGACY_GET_USER_INFORMATION_FAILED,
            self::STATE_FETCHED_LEGACY_USER_INFORMATION,
        );
        foreach ($states as $stateName) {
            $setup->setReserved($stateName);
        }

        $states = array(
            self::STATE_CLARIFY_LEGACY_GET_USER_INFORMATION_FAILED,
        );
        foreach ($states as $state) {
            $setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }
}
