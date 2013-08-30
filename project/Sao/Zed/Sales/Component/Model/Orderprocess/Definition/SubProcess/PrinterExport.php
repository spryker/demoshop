<?php
/**
 * @property Generated_Zed_Sales_Component_Factory $factory
 */
class Sao_Zed_Sales_Component_Model_Orderprocess_Definition_SubProcess_PrinterExport extends ProjectA_Zed_Sales_Component_Model_Orderprocess_Definition_Abstract implements
    Sao_Zed_Sales_Component_Interface_OrderprocessConstant
{
    /**
     * @var Sao_Zed_Sales_Component_Model_Orderprocess_StateMachine_Setup
     */
    protected $setup;

    /**
     * @param string $processName
     */
    public function __construct($processName = 'Printer Export Process')
    {
        parent::__construct($processName);
    }

    /**
     *
     */
    protected function createDefinition()
    {
        $setup = $this->getNewSetup();

        $this->addMetaInfo();
        $this->addTransitions();
        $this->addCommands();
        $this->addFlags();
    }

    protected function addTransitions()
    {
        $this->addTransition(self::STATE_INIT_PRINTER_EXPORT, self::STATE_EXPORTABLE, self::EVENT_CHECK_IF_ALL_ITEMS_OF_QUOTE_PRINTABLE, self::RULE_ALL_ITEMS_OF_QUOTE_PRINTABLE);

        $this->setup->addTransition(self::STATE_EXPORTABLE, self::STATE_GENERATING_PACKING_SLIP, null, self::RULE_LESS_THAN_THIRTY_UNIQUE_ITEMS_IN_QUOTE);
        $this->setup->addTransition(self::STATE_EXPORTABLE, self::STATE_READY_FOR_EXPORT, null);

        $this->setup->addTransition(self::STATE_GENERATING_PACKING_SLIP, self::STATE_READY_FOR_EXPORT, self::EVENT_ON_ENTER);

        $this->setup->addTransition(self::STATE_READY_FOR_EXPORT, self::STATE_EXPORTED_TO_PRINTER, self::EVENT_ON_ENTER, self::RULE_EXPORT_SUCCESSFUL);
       // $this->setup->addTransitionManual(self::STATE_READY_FOR_EXPORT, self::STATE_EXPORTABLE, self::EVENT_RECREATE_PACKING_SLIP);
        $this->setup->addTransition(self::STATE_READY_FOR_EXPORT, self::STATE_CLARIFY_PRINTER_EXPORT_FAILED, self::EVENT_ON_ENTER);


        $this->setup->addTransitionManual(self::STATE_CLARIFY_PRINTER_EXPORT_FAILED, self::STATE_EXPORTABLE, self::EVENT_RESEND_TO_PRINTER);
        $this->setup->addTransitionManual(self::STATE_CLARIFY_PRINTER_EXPORT_FAILED, self::STATE_EXPORTED_TO_PRINTER, self::EVENT_WAS_SUCCESSFULLY_EXPORTED);

        $this->setup->addTransition(self::STATE_EXPORTED_TO_PRINTER, self::STATE_PRINT_SHIPPED, self::EVENT_PRINT_SHIPPING_NOTIFICATION_RECEIVED);
        $this->addTransition(self::STATE_EXPORTED_TO_PRINTER, self::STATE_PRINT_SHIPPED, null, self::RULE_HAS_RECEIVED_TRACKING_NUMBER);

        //$this->setup->addTransitionManual(self::STATE_EXPORTED_TO_PRINTER, self::STATE_EXPORTABLE, self::EVENT_RESEND_TO_PRINTER);

        $this->setup->setTimeout(self::STATE_EXPORTED_TO_PRINTER, self::STATE_PRINT_CLARIFY_NO_SHIPMENT_INFO_RECEIVED, '7 days');

        $this->setup->addTransition(self::STATE_PRINT_CLARIFY_NO_SHIPMENT_INFO_RECEIVED, self::STATE_PRINT_SHIPPED, null, self::RULE_HAS_RECEIVED_TRACKING_NUMBER);
        $this->setup->addTransitionManual(self::STATE_PRINT_CLARIFY_NO_SHIPMENT_INFO_RECEIVED, self::STATE_PRINT_SHIPPED, self::EVENT_MANUAL_SET_PRINT_SHIPPED);

        $this->setup->addTransition(self::STATE_PRINT_SHIPPED, self::STATE_SHIPPING_INFO_SENT, self::EVENT_ON_ENTER);
        $this->setup->setTimeout(self::STATE_SHIPPING_INFO_SENT, self::STATE_FULFILLED, '7 days');

        $this->setup->addTransitionManual(self::STATE_FULFILLED, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::EVENT_ON_ENTER, self::RULE_IS_MARKED_FOR_REFUND);

        //add delivery excpetion transitions
        $this->setup->addTransitionManual(self::STATE_SHIPPING_INFO_SENT, self::STATE_DELIVERY_EXCEPTION, self::EVENT_INIT_DELIVERY_EXCEPTION);
        $this->setup->addTransitionManual(self::STATE_DELIVERY_EXCEPTION, self::STATE_FULFILLED, self::EVENT_INIT_FULFILLED);
        $this->setup->addTransitionManual(self::STATE_DELIVERY_EXCEPTION, self::STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS, self::EVENT_INIT_CANCELLATION);

    }

    protected function addCommands()
    {
        // this is the real command for later again
        //$this->setup->addCommand(self::STATE_EXPORTABLE, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandCreatePackingSlip());

        $this->setup->addCommand(self::STATE_GENERATING_PACKING_SLIP, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandCreatePackingSlip());
        $this->setup->addCommand(self::STATE_READY_FOR_EXPORT, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandAppointShipping());
        $this->setup->addCommand(self::STATE_PRINT_SHIPPED, self::EVENT_ON_ENTER, $this->factory->getModelOrderprocessCommandMailShippingInfoPrint());
    }

    protected function addMetaInfo()
    {
        $states = array(
            self::STATE_INIT_PRINTER_EXPORT,
            self::STATE_EXPORTABLE,
            self::STATE_CLARIFY_PRINTER_EXPORT_FAILED,
            self::STATE_EXPORTED_TO_PRINTER,
            self::STATE_PRINT_SHIPPED,
            self::STATE_PRINT_CLARIFY_NO_SHIPMENT_INFO_RECEIVED,
            self::STATE_FULFILLED,
            self::STATE_SHIPPING_INFO_SENT,
            self::STATE_GENERATING_PACKING_SLIP,
            self::STATE_READY_FOR_EXPORT,
            self::STATE_DELIVERY_EXCEPTION
        );
        $clarifyRefundStates = array(
            self::STATE_INIT_PRINTER_EXPORT,
            self::STATE_EXPORTABLE,
            self::STATE_CLARIFY_PRINTER_EXPORT_FAILED,
            self::STATE_EXPORTED_TO_PRINTER,
            self::STATE_PRINT_SHIPPED,
            self::STATE_PRINT_CLARIFY_NO_SHIPMENT_INFO_RECEIVED,
            self::STATE_FULFILLED,
            self::STATE_SHIPPING_INFO_SENT,
            self::STATE_GENERATING_PACKING_SLIP,
            self::STATE_READY_FOR_EXPORT
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, 'group', $this->getName());
        }
        foreach ($clarifyRefundStates as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY_REFUND, true);
        }

        $states = array(
            self::STATE_INIT_PRINTER_EXPORT,
            self::STATE_EXPORTABLE,
            self::STATE_EXPORTED_TO_PRINTER,
            self::STATE_PRINT_SHIPPED,
            self::STATE_FULFILLED,
            self::STATE_SHIPPING_INFO_SENT,
            self::STATE_GENERATING_PACKING_SLIP,
            self::STATE_READY_FOR_EXPORT
        );
        $this->setup->setHappyCaseStates($states);
    }

    protected function addFlags()
    {
        $states = array(
            self::STATE_INIT_PRINTER_EXPORT,
            self::STATE_EXPORTABLE
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_PRINTABLE, true);
        }

        $states = array(
            self::STATE_PRINT_CLARIFY_NO_SHIPMENT_INFO_RECEIVED,
            self::STATE_CLARIFY_PRINTER_EXPORT_FAILED
        );
        foreach ($states as $state) {
            $this->setup->addStateMetaInfo($state, self::FLAG_CLARIFY, true);
        }
    }
}
