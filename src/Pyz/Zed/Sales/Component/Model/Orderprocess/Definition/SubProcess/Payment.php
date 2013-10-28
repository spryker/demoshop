<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\Subprocess;

use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Payment extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    \Generated\Zed\DemoPayment\Component\Dependency\DemoPaymentFacadeInterface,
//    \ProjectA_Zed_Sales_Component_Interface_OrderprocessConstant,
    Orderprocess
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
