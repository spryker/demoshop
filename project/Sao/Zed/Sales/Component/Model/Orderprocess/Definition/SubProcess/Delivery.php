<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_Delivery extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Shipment and Delivery Process')
    {
        parent::__construct($processName);
    }

    /**
     *
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
        // SHIPMENT
        $this->setup->addTransition(self::STATE_INIT_SHIPMENT_PROCESS, self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT, self::EVENT_ON_ENTER);
        $this->setup->addTransition(self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT, self::STATE_SHIPMENT_FORM_SENT, self::EVENT_ON_ENTER, self::RULE_EXPORT_SUCCESSFUL);
        $this->setup->addTransition(self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT, self::STATE_CLARIFY_EXPORT_FAILED, self::EVENT_ON_ENTER);

        $this->setup->addTransitionManual(self::STATE_CLARIFY_EXPORT_FAILED, self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT, self::EVENT_RESEND_TO_FULFILLER);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_EXPORT_FAILED, self::STATE_SHIPMENT_FORM_SENT, self::EVENT_WAS_SUCCESSFULLY_EXPORTED);

        $this->setup->addTransition(self::STATE_SHIPMENT_FORM_SENT, self::STATE_WAITING_FOR_PICKUP, self::EVENT_ON_ENTER);

        // DELIVERY
        $this->setup->addTransition(self::STATE_WAITING_FOR_PICKUP, self::STATE_PICKUP_BOOKED, null, self::RULE_HAS_RECEIVED_BOOK_INFO);
        $this->setup->addTransition(self::STATE_WAITING_FOR_PICKUP, self::STATE_PICKUP_BOOKED, null, self::RULE_HAS_RECEIVED_PICKUP_INFO);
        $this->setup->addTransition(self::STATE_WAITING_FOR_PICKUP, self::STATE_PICKUP_BOOKED, null, self::RULE_HAS_RECEIVED_DELIVERY_INFO);
        $this->setup->addTransitionManual(self::STATE_WAITING_FOR_PICKUP, self::STATE_PICKUP_BOOKED, self::EVENT_MANUAL_SET_BOOKED);
        $this->setup->setTimeout(self::STATE_WAITING_FOR_PICKUP, self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED, '7 days');

        $this->setup->addTransition(self::STATE_WAITING_FOR_PICKUP, self::STATE_DELIVERY_HOLD, self::EVENT_MARK_AS_LONG_DELIVERY);
        $this->setup->addTransition(self::STATE_DELIVERY_HOLD, self::STATE_PICKUP_BOOKED, null, self::RULE_HAS_RECEIVED_BOOK_INFO);
        $this->setup->addTransition(self::STATE_DELIVERY_HOLD, self::STATE_PICKUP_BOOKED, null, self::RULE_HAS_RECEIVED_PICKUP_INFO);
        $this->setup->addTransition(self::STATE_DELIVERY_HOLD, self::STATE_PICKUP_BOOKED, null, self::RULE_HAS_RECEIVED_DELIVERY_INFO);
        $this->setup->addTransitionManual(self::STATE_DELIVERY_HOLD, self::STATE_PICKUP_BOOKED, self::EVENT_MANUAL_SET_BOOKED);
        $this->setup->addTransitionManual(self::STATE_DELIVERY_HOLD, self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED, self::EVENT_MANUAL_SET_CLARIFY_NO_PICKUP_INFO_RECEIVED);

        $this->setup->addTransition(self::STATE_PICKUP_BOOKED, self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, null, self::RULE_HAS_RECEIVED_PICKUP_INFO);
        $this->setup->addTransition(self::STATE_PICKUP_BOOKED, self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, null, self::RULE_HAS_RECEIVED_DELIVERY_INFO);
        $this->setup->addTransition(self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::STATE_DELIVERED, null, self::RULE_HAS_RECEIVED_DELIVERY_INFO);


        $this->setup->setTimeout(self::STATE_PICKUP_BOOKED, self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED, '7 days');
        $this->setup->addTransitionManual(self::STATE_PICKUP_BOOKED, self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::EVENT_MANUAL_SET_PICKEDUP);

        $this->setup->addTransition(self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED, self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, null, self::RULE_HAS_RECEIVED_PICKUP_INFO);
        $this->setup->addTransition(self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED, self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, null, self::RULE_HAS_RECEIVED_DELIVERY_INFO);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED, self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::EVENT_MANUAL_SET_PICKEDUP);

        $this->setup->setTimeout(self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED, '3 weeks');
        $this->setup->addTransitionManual(self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::STATE_DELIVERED, self::EVENT_MANUAL_SET_DELIVERED);
        $this->setup->addTransitionManual(self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::STATE_NOT_DELIVERED, self::EVENT_MANUAL_SET_NOT_DELIVERED);

        $this->setup->addTransitionManual(self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED, self::STATE_DELIVERED, self::EVENT_MANUAL_SET_DELIVERED);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED, self::STATE_NOT_DELIVERED, self::EVENT_MANUAL_SET_NOT_DELIVERED);
        $this->setup->addTransition(self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED, self::STATE_DELIVERED, self::EVENT_DELIVERY_INFO_RECEIVED);

        $this->setup->addTransition(self::STATE_NOT_DELIVERED, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, null);

        $this->setup->setTimeout(self::STATE_DELIVERED, self::STATE_FULFILLED, '7 days');

        //add delivery excpetion transitions
        $this->setup->addTransitionManual(self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::STATE_DELIVERY_EXCEPTION, self::EVENT_INIT_DELIVERY_EXCEPTION);
        $this->setup->addTransitionManual(self::STATE_DELIVERED, self::STATE_DELIVERY_EXCEPTION, self::EVENT_INIT_DELIVERY_EXCEPTION);

        $this->setup->addTransitionManual(self::STATE_DELIVERY_EXCEPTION, self::STATE_FULFILLED, self::EVENT_INIT_FULFILLED);
        $this->setup->addTransitionManual(self::STATE_DELIVERY_EXCEPTION, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::EVENT_INIT_CANCELLATION);
    }

    protected function addCommands()
    {
        $appointShippingCommand = $this->factory->getModelOrderprocessCommandAppointShipping();
        $this->setup->addCommand(self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT, self::EVENT_ON_ENTER, $appointShippingCommand);

        $this->setup->addCommand(self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandMailShippingInfoOriginal());

        $itemNotDeliveredMailCommand = $this->factory->getModelOrderprocessCommandMailOpsItemNotDelivered();
        $this->setup->addCommand(self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED, self::EVENT_ON_ENTER, $itemNotDeliveredMailCommand);

        $this->setup->addCommand(self::STATE_INIT_SHIPMENT_PROCESS, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandMailPreShippingInfoOriginal());
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_SHIPMENT_PROCESS,
            self::STATE_SHIPMENT_FORM_SENT,
            self::STATE_WAITING_FOR_PICKUP,
            self::STATE_PICKUP_BOOKED,
            self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY,
            self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED,
            self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED,
            self::STATE_DELIVERED,
            self::STATE_FULFILLED,
            self::STATE_NOT_DELIVERED,
            self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT,
            self::STATE_DELIVERY_EXCEPTION,
            self::STATE_DELIVERY_HOLD,
            self::STATE_CLARIFY_EXPORT_FAILED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }

        $clarifyRefundStates = array(
            self::STATE_INIT_SHIPMENT_PROCESS,
            self::STATE_SHIPMENT_FORM_SENT,
            self::STATE_WAITING_FOR_PICKUP,
            self::STATE_PICKUP_BOOKED,
            self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY,
            self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED,
            self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED,
            self::STATE_DELIVERED,
            self::STATE_FULFILLED,
            self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT,
            self::STATE_DELIVERY_EXCEPTION,
            self::STATE_CLARIFY_EXPORT_FAILED
        );
        foreach ($clarifyRefundStates as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY_REFUND, true);
        }

        $states = array(
            self::STATE_INIT_SHIPMENT_PROCESS,
            self::STATE_SHIPMENT_FORM_SENT,
            self::STATE_WAITING_FOR_PICKUP,
            self::STATE_PICKUP_BOOKED,
            self::STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY,
            self::STATE_DELIVERED,
            self::STATE_FULFILLED,
            self::STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED,
            self::STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED,
            self::STATE_CLARIFY_EXPORT_FAILED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }
}
