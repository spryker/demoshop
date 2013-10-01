<?php

interface Pyz_Zed_Sales_Component_Interface_OrderprocessConstant
    extends ProjectA_Zed_Sales_Component_Interface_OrderprocessConstant
{

    // DEMO PROCESS

    const ORDER_PROCESS_DEMO = 'demo';

    // STATE_NEW        -> parent class
    // STATE_INVALID    -> parent class
    const STATE_WAITING_FOR_AUTHORISE_APPOINTMENT = 'waiting for authorise appointment (demo)';
    const STATE_APPOINTED = 'authorisation appointed (demo)';

    const STATE_INIT_SHIPMENT = 'init shipment (demo)';
    const STATE_EXPORTED = 'shipment exported (demo)';
    const STATE_SHIPPED = 'shipped (demo)';
    const STATE_CLARIFY_SHIPMENT = 'clarify shipment (demo)';

    const EVENT_PAYMENT_AUTHORISATION_APPOINTED = 'payment authorisation appointed (demo)';
    const EVENT_START_PAYMENT = 'start payment (demo)';
    const EVENT_START_CAPTURE = 'start capture (demo)';
    const EVENT_RETRY_CAPTURE = 'retry capture (demo)';

    const EVENT_START_SHIPMENT_EXPORT = 'start shipment export (demo)';
    const EVENT_SHIPMENT_NOTIFICATION_RECEIVED = 'shipment notification received (demo)';
    const EVENT_NO_SHIPMENT_NOTIFICATION_RECEIVED = 'no shipment notification received (demo)';
    const EVENT_MANUAL_REEXPORT = 'manual re-export (demo)';
    const EVENT_MANUAL_SHIPMENT_CLARIFIED = 'manual shipment clarified (demo)';

    const RULE_PAYMENT_TRANSACTION_APPROVED = 'payment transaction approved (demo)';

}
