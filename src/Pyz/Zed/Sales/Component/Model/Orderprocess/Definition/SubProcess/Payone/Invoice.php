<?php

namespace Pyz\Zed\Sales\Component\Model\Orderprocess\Definition\SubProcess\Payone;

use Generated\Zed\Payone\Component\Dependency\PayoneFacadeInterface;
use Generated\Zed\Payone\Component\Dependency\PayoneFacadeTrait;
use Pyz\Zed\Sales\Component\ConstantsInterface\Orderprocess;
use ProjectA\Zed\Payone\Component\Model\Zed\StateMachine\StateMachineConstants as PayoneStateMachineConstants;

/**
 * @property \Generated\Zed\Sales\Component\SalesFactory $factory
 * @property \ProjectA_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup $setup
 */
class Invoice
    extends \ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract
        implements PayoneFacadeInterface, Orderprocess, PayoneStateMachineConstants
{

    use PayoneFacadeTrait;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Payment Invoice Subprocess (Payone)')
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
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::EVENT_ON_ENTER, self::RULE_PAYONE_TRANSACTION_APPROVED);
        $this->setup->addTransition(self::STATE_PAYONE_INIT_PAYMENT, self::STATE_PAYONE_PAYMENT_INVALID, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_PREAUTHORIZED, self::EVENT_PAYONE_TRANSACTION_STATUS_APPOINTED_RECEIVED);
        $this->setup->setTimeout(self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT, self::STATE_PAYONE_PAYMENT_INVALID, '1 day');
        $this->setup->addTransition(self::STATE_PAYONE_PAYMENT_PREAUTHORIZED, self::STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT, self::EVENT_ON_ENTER);
    }

    protected function addCommands()
    {
        $payonePreAuthorizeCommand = $this->facadePayone->createFacadeStateMachine()->getCommandPreAuthorizeGrandTotal();
        $this->setup->addCommand(self::STATE_PAYONE_INIT_PAYMENT, self::EVENT_ON_ENTER, $payonePreAuthorizeCommand);
    }

    protected function addFlags()
    {
    }

    protected function addMetaInfo()
    {
        $groupStates = [
            self::STATE_PAYONE_INIT_PAYMENT,
            self::STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT,
            self::STATE_PAYONE_PAYMENT_INVALID,
            self::STATE_PAYONE_PAYMENT_PREAUTHORIZED,
            self::STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT

        ];

        foreach ($groupStates as $groupState) {
            $this->setup->addStateMetaInfo($groupState, 'group', $this->getName());
        }
    }

}
