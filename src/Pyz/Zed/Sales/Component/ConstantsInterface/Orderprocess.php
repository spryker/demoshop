<?php

namespace Pyz\Zed\Sales\Component\ConstantsInterface;

interface Orderprocess
    extends \ProjectA_Zed_Sales_Component_Interface_OrderprocessConstant
{

    /************************************************************************************************
     *     GENERAL
     ************************************************************************************************/



    // --- GENERAL States

    const STATE_INVALID = 'invalid';
    const STATE_COMPLETED_BUT_REVERSIBLE = 'completed but reversible';
    const STATE_FINALLY_COMPLETED = 'finally completed';

    // --- GENERAL Flags

    const FLAG_CLARIFY = 'clarify';
    const FLAG_READY_FOR_INVOICE = 'ready for invoice';
    const FLAG_EXCLUDE_FROM_INVOICE = 'exclude from invoice';
    const FLAG_ITEM_READY_FOR_EXPORT = 'item ready for export';
    const FLAG_ITEM_EXPORTED = 'item exported';
    const FLAG_RESERVED = 'reserved';







    /************************************************************************************************
     *     PAYONE
     ************************************************************************************************/

    // --- PAYONE Processes

    const ORDER_PROCESS_PAYONE_PRE_PAYMENT_01 = 'PayonePrePayment01';
    const ORDER_PROCESS_PAYONE_CREDIT_CARD_PSEUDO_01 = 'PayoneCreditCardPseudo01';
    const ORDER_PROCESS_PAYONE_DIRECT_DEBIT_01 = 'PayoneDirectDebit01';
    const ORDER_PROCESS_PAYONE_PAYPAL_01 = 'PayonePaypal01';
    const ORDER_PROCESS_PAYONE_INVOICE_01 = 'PayoneInvoice01';
    const ORDER_PROCESS_PAYONE_SOFORT_UEBERWEISUNG_01 = 'PayoneSofortUeberweisung01';

    // --- PAYONE Payment

    const STATE_PAYONE_INIT_PAYMENT = 'init payment (payone)';
    const STATE_PAYONE_WAITING_FOR_AUTHORIZATION_APPOINTMENT = 'waiting for authorization appointment (payone)';
    const STATE_PAYONE_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT = 'waiting for preauthorization appointment (payone)';
    const STATE_PAYONE_CLARIFY_WAITING_FOR_PREAUTHORIZATION_APPOINTMENT = 'clarify waiting for preauthorization appointment (payone)';
    const STATE_PAYONE_CLARIFY_WAITING_FOR_AUTHORIZATION_APPOINTMENT = 'clarify waiting for authorization appointment (payone)';
    const STATE_PAYONE_CLARIFY_WAITING_FOR_PAID = 'clarify waiting for paid (payone)';
    const STATE_PAYONE_PAYMENT_AUTHORIZED = 'payment authorized (payone)';
    const STATE_PAYONE_PAYMENT_PREAUTHORIZED = 'payment preauthorized (payone)';
    const STATE_PAYONE_PAYMENT_NOT_REDIRECTED = 'payment not redirected (payone)';
    const STATE_PAYONE_PAYMENT_REDIRECTED  = 'payment redirected (payone)';
    const STATE_PAYONE_CLARIFY_PAYMENT_REMINDED = 'clarify payment reminded (payone)';

    const STATE_PAYONE_PAID                = 'paid (payone)';
    const STATE_PAYONE_UNDERPAID = 'underpaid (payone)';
    const STATE_PAYONE_CLARIFY_UNDERPAID = 'clarify underpaid (payone)';
    const STATE_PAYONE_CLARIFY_WAITING_FOR_CAPTURE_APPOINTMENT = 'clarify waiting for capture appointment (payone)';

    const STATE_PAYONE_PAYMENT_REMINDED    = 'payment reminded (payone)';


    const EVENT_PAYONE_CANCEL_REMINDED = 'cancel reminded (payone)';
    const EVENT_PAYONE_CANCEL_UNDERPAID = 'cancel underpaid (payone)';
    const EVENT_PAYONE_MANUALLY_SET_PAID = 'manually set paid (payone)';
    const EVENT_PAYONE_MANUALLY_SET_AUTHORIZED = 'manually set authorized (payone)';
    const EVENT_PAYONE_MANUALLY_SET_CAPTURED = 'manually set captured (payone)';
    const EVENT_PAYONE_RETRY_CAPTURE = 'retry capture (payone)';

    // --- PAYONE Cancelation

    const STATE_PAYONE_INIT_CANCELLATION = 'init cancellation (payone)';
    const STATE_PAYONE_CANCELLATION_CLARIFY = 'cancellation clarify (payone)';
    const STATE_PAYONE_CANCELLATION_RETURN = 'cancellation return (payone)';
    const STATE_PAYONE_CANCELLATION_OBJECTIVE = 'cancellation objective (payone)';

    const EVENT_PAYONE_MANUAL_CLARIFIED_CANCELLATION_OBJECTIVE = 'manual clarified cancellation objective (payone)';
    const EVENT_PAYONE_MANUAL_CLARIFIED_CANCELLATION_RETURN = 'manual clarified cancellation return (payone)';

    const EVENT_PAYONE_MANUAL_SET_PAYMENT_INVALID = 'manual set payment invalid (payone)';
    const EVENT_PAYONE_MANUAL_SET_PAYMENT_AUTHORIZED = 'manual set payment authorized (payone)';

    // --- PAYONE Capture

    const STATE_PAYONE_INIT_CAPTURE_PROCESS = 'init capture process (payone)';
    const STATE_PAYONE_WAITING_FOR_CAPTURE_APPOINTMENT = 'waiting for capture appointment (payone)';
    const STATE_PAYONE_CAPTURE_FAILED = 'capture failed (payone)';
    const STATE_PAYONE_CLARIFY_CAPTURE_FAILED = 'clarify capture failed (payone)';
    const STATE_PAYONE_CAPTURED = 'captured (payone)';

    const STATE_PAYONE_WAITING_FOR_RECEIPT_OF_PAYMENT = 'waiting for receipt of payment (payone)';



    /************************************************************************************************
     *     INVOICE CREATION
     ************************************************************************************************/

    const STATE_INIT_INVOICE_CREATION_PROCESS = 'init invoice creation process';
    const STATE_READY_FOR_INVOICE_CREATION = 'ready for invoice creation';
    const STATE_INVOICE_CREATED = 'invoice created';

    const RULE_INVOICE_CREATION_POSSIBLE = 'invoice creation possible';



    /************************************************************************************************
     *     FULFILLMENT
     ************************************************************************************************/

    const STATE_INIT_FULFILLMENT_PROCESS = 'init fulfillment process';
    const STATE_FULFILLED = 'fulfilled';

    const EVENT_START_FULFILLMENT_EXPORT = 'start fulfillment export';



    /************************************************************************************************
     *     FULFILLMENT
     ************************************************************************************************/

    const STATE_INIT_DUNNING = 'init dunning';



    /************************************************************************************************
     *     DEMO
     ************************************************************************************************/

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
