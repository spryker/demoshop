<?php

namespace Pyz\Zed\Sales\Component\ConstantsInterface;

interface Orderprocess extends \ProjectA_Zed_Sales_Component_Interface_OrderprocessConstant
{

    const ORDER_PROCESS_DEMO = 'demo';


    const STATE_INVALID = 'invalid';
    const STATE_WAITING_FOR_AUTHORIZE_APPOINTMENT = 'waiting for authorize appointment';
    const STATE_APPOINTED = 'appointed';
    const STATE_INIT_CAPTURE_PROCESS = 'init capture process';
    const STATE_WAITING_FOR_CAPTURE_APPOINTMENT = 'waiting for capture appointment';
    const STATE_CLARIFY_CAPTURE_FAILED = 'clarify capture failed';
    const STATE_CAPTURED = 'captured';

    const STATE_PAYMENT_REDIRECTED = 'payment redirected';
    const STATE_PAYMENT_PREPARED = 'payment prepared';

    // EVENTS

    const EVENT_PAYMENT_INFO_IS_RECEIVED = 'payment info is received';

    // RULES

    const FLAG_CLARIFY = 'clarify';

    /********************/
    /****** EXAMPLE ******/
    /********************/

    const ORDER_PROCESS_EXAMPLE = 'Example Process';

    const STATE_A = 'status A';
    const STATE_B = 'status B';
    const STATE_C = 'status C';
    const STATE_D = 'status D';
    const STATE_E = 'status E';

    const EVENT_GOTO_A = 'goto A';
    const EVENT_GOTO_B = 'goto B';
    const EVENT_GOTO_C = 'goto C';
    const EVENT_GOTO_D = 'goto D';
    const EVENT_GOTO_E = 'goto E';
    const EVENT_SOME_DEFINED_EVENT = 'some defined event';

    const RULE_SOMETHING_EXISTS = 'something exists';

    /********************/
    /****** PAYONE ******/
    /********************/

    // --- PAYONE Payment

    const ORDER_PROCESS_PAYONE_CREDIT_CARD = 'Credit Card (payone)';
    const ORDER_PROCESS_PAYONE_PAYPAL = 'Paypal (payone)';
    const ORDER_PROCESS_PAYONE_DIRECT_DEBIT = 'Direct Debit (payone)';
    const ORDER_PROCESS_PAYONE_PREPAYMENT = 'PrePayment (payone)';
    const ORDER_PROCESS_PAYONE_INVOICE = 'Invoice (payone)';
    const ORDER_PROCESS_PAYONE_SOFORT_UEBERWEISUNG = 'SofortUeberweisung (payone)';

    const STATE_PAYONE_INIT_PAYMENT = 'init payment (payone)';
    const STATE_PAYONE_PAYMENT_REDIRECTED = 'payment redirected (payone)';
    const STATE_PAYONE_PAYMENT_NOT_REDIRECTED = 'payment not redirected (payone)';
    const STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT = 'waiting for authorization appointment (payone)';
    const STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT = 'waiting for preauthorization appointment (payone)';
    const STATE_PAYONE_NO_AUTHORIZATION_APPOINTMENT_RECEIVED = 'no authorization appointment received (payone)';
    const STATE_PAYONE_NO_PREAUTHORIZATION_APPOINTMENT_RECEIVED = 'no presauthorization appointment received (payone)';
    const STATE_PAYONE_PAYMENT_AUTHORIZED = 'payment authorized (payone)';
    const STATE_PAYONE_PAYMENT_PREAUTHORIZED = 'payment preauthorized (payone)';
    const STATE_PAYONE_PAYMENT_INVALID = 'payment invalid (payone)';

    // --- PAYONE Cancelation

    const STATE_PAYONE_INIT_CANCELLATION = 'init cancellation (payone)';
    const STATE_PAYONE_CANCELLATION_CLARIFY = 'cancellation clarify (payone)';
    const STATE_PAYONE_CANCELLATION_RETURN = 'cancellation return (payone)';
    const STATE_PAYONE_CANCELLATION_OBJECTIVE = 'cancellation objective (payone)';

    const EVENT_PAYONE_MANUAL_CLARIFIED_CANCELLATION_OBJECTIVE = 'manual clarified cancellation objective';
    const EVENT_PAYONE_MANUAL_CLARIFIED_CANCELLATION_RETURN = 'manual clarified cancellation return';

    const EVENT_PAYONE_MANUAL_SET_PAYMENT_INVALID = 'manual set payment invalid (payone)';
    const EVENT_PAYONE_MANUAL_SET_PAYMENT_AUTHORIZED = 'manual set payment authorized (payone)';

    // --- PAYONE Capture

    const STATE_PAYONE_INIT_CAPTURE = 'init capture (payone)';
    const STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT = 'waiting for capture appointment (payone)';
    const STATE_PAYONE_CAPTURE_FAILED = 'capture failed (payone)';
    const STATE_PAYONE_CAPTURED = 'captured (payone)';

    const STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT = 'waiting for receipt of payment (payone)';

    // --- PAYONE DUNNING

    const STATE_PAYONE_INIT_DUNNING = 'init dunning (payone)';

    /****** ONLY USED FOR THE TEST SUB-PROCESS ******/

    // states
    const STATE_DEMO_A = 'DEMO A';
    const STATE_DEMO_B = 'DEMO B';
    const STATE_DEMO_C = 'DEMO C';
    const STATE_DEMO_D = 'DEMO D';
    const STATE_DEMO_E = 'DEMO E';
    const STATE_DEMO_F = 'DEMO F';
    const STATE_DEMO_G = 'DEMO G';
    const STATE_DEMO_H = 'DEMO H';
    const STATE_DEMO_I = 'DEMO I';

    // events
    const EVENT_DEMO_START_TEST = 'DEMO Start Test';
    const EVENT_DEMO_AB = 'DEMO Event AB';
    const EVENT_DEMO_CHECK_FLAG = 'DEMO Event Check Flag';

    // rules
    const RULE_DEMO_ORDER_GRAND_TOTAL_GREATER_THAN_1000 = 'DEMO Order GrandTotal Greater Than 1000';
    const RULE_DEMO_ALL_ITEMS_ARE_IN_THE_FLAGGED_TEST_STATE = 'DEMO All Order Items Are In The Flagged Test State';

    // commands
    const COMMAND_DEMO_TEST_ORDER_COMMAND_ONE = 'DEMO TEST ORDER COMMAND ONE';
    const COMMAND_DEMO_TEST_ITEM_COMMAND_ONE = 'DEMO TEST ITEM COMMAND ONE';

    //flags
    const FLAG_DEMO_TEST_FLAG = 'DEMO TEST FLAG';
}
