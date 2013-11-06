<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess;

use Generated\Zed\DemoPayment\Component\Dependency\DemoPaymentFacadeInterface;
use Generated\Zed\DemoPayment\Component\Dependency\DemoPaymentFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\DemoPayment\Component\Constants\StatemachineConstants as PaymentConstants;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Payment extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    DemoPaymentFacadeInterface,
    Orderprocess
{

    use DemoPaymentFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payment Subprocess')
    {
        parent::__construct($processName);
    }

    protected function createDefinition()
    {
        $this->getNewSetup();
        $this->addTransitions();
        $this->addMetaInfo();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->setup->addTransition(self::STATE_WAITING_FOR_PAYMENT, PaymentConstants::STATE_DEMO_AUTHORIZED, self::EVENT_ON_ENTER);
        $this->setup->addTransitionManual(PaymentConstants::STATE_DEMO_AUTHORIZED, PaymentConstants::STATE_DEMO_CAPTURED, PaymentConstants::EVENT_DEMO_CAPTURE_PAYMENT);
    }

    protected function addCommands()
    {
        $this->setup->addCommand(self::STATE_WAITING_FOR_PAYMENT, self::EVENT_ON_ENTER, $this->facadeDemoPayment->createFacadeStateMachine()->getCommandAuthorizeGrandTotal());
        $this->setup->addCommand(PaymentConstants::STATE_DEMO_AUTHORIZED, PaymentConstants::EVENT_DEMO_CAPTURE_PAYMENT, $this->facadeDemoPayment->createFacadeStateMachine()->getCommandCaptureGrandTotal());
        $this->setup->addCommand(PaymentConstants::STATE_DEMO_AUTHORIZED, self::EVENT_ON_ENTER, $this->factory->createModelOrderprocessCommandMailOrderConfirmationMail());
    }

    protected function addFlags()
    {
    }

    protected function addMetaInfo()
    {
        $groupStates = [
            self::STATE_WAITING_FOR_PAYMENT,
            PaymentConstants::STATE_DEMO_AUTHORIZED,
            PaymentConstants::STATE_DEMO_CAPTURED
        ];

        foreach ($groupStates as $groupState) {
            $this->setup->addStateMetaInfo($groupState, 'group', $this->getName());
        }
    }

}
