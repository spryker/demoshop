<?php

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
<<<<<<< HEAD

class Pyz_Zed_Sales_Component_Model_Orderprocess_Definition_Subprocess_Payment extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
=======
class Pyz_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Payment extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
>>>>>>> 339f3cd03951fe311fcc3e5dd49913a0e016b4f4
    Pyz_Zed_Sales_Component_Interface_OrderprocessConstant,
    \Generated\Zed\DemoPayment\Component\Dependency\DemoPaymentFacadeInterface
{

    use \Generated\Zed\DemoPayment\Component\Dependency\DemoPaymentFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct ($processName = 'Payment Subprocess')
    {
        parent::__construct($processName);
    }

    protected function createDefinition ()
    {
        $this->getNewSetup();
        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_WAITING_FOR_PAYMENT, self::STATE_AUTHORIZED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(self::STATE_AUTHORIZED, self::STATE_CAPTURED, self::EVENT_CAPTURE_PAYMENT);
    }

    protected function addCommands()
    {
        $this->setup->addCommand(self::STATE_WAITING_FOR_PAYMENT, self::EVENT_ON_ENTER, $this->facadeDemoPayment->createFacadeStateMachine()->getCommandAuthorizeGrandTotal());
        $this->setup->addCommand(self::STATE_AUTHORIZED, self::EVENT_CAPTURE_PAYMENT, $this->facadeDemoPayment->createFacadeStateMachine()->getCommandCaptureGrandTotal());
    }

    protected function addFlags()
    {
    }

    protected function addMetaInfo()
    {
        $states = [
            self::STATE_WAITING_FOR_PAYMENT,
            self::STATE_AUTHORIZED,
            self::STATE_CAPTURED
        ];

        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
    }
}
