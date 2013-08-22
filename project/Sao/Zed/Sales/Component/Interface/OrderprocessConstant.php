<?php

interface Sao_Zed_Sales_Component_Interface_OrderprocessConstant
    extends ProjectA_Zed_Sales_Component_Interface_OrderprocessConstant
{

    const ORDER_PROCESS_PAY_PAL_ORIGINAL_PRODUCT = 'paypal-originalproduct';
    const ORDER_PROCESS_PAY_PAL_PRINT_PRODUCT = 'paypal-printproduct';
    const ORDER_PROCESS_CEDIT_CARD_ORIGINAL_PRODUCT = 'creditcard-originalproduct';
    const ORDER_PROCESS_CEDIT_CARD_PRINT_PRODUCT = 'creditcard-printproduct';

    const ORDER_PROCESS_PAY_PAL_MARKETPLACE = 'paypal-marketplace';
    const ORDER_PROCESS_PAY_PAL_MANUFACTURED = 'paypal-manufactured';

    const ORDER_PROCESS_CEDIT_CARD_MARKETPLACE = 'creditcard-marketplace';
    const ORDER_PROCESS_CEDIT_CARD_MANUFACTURED = 'creditcard-manufactured';

    const ORDER_PROCESS_MANUAL_MANUFACTURED = 'manual-manufactured';
    const ORDER_PROCESS_MANUAL_MARKETPLACE = 'manual-marketplace';
    const ORDER_PROCESS_OPERATIONS_MANUAL_PROCESS = 'operations-manual-process';

    const ORDER_PROCESS_TEST_PAYMENT = 'testPayment';
    const ORDER_PROCESS_MANUAL_CHECKOUT = 'manual';

    // STATES
    const STATE_LEGACY_GET_USER_INFORMATION = 'legacy get user information';
    const STATE_CLARIFY_LEGACY_GET_USER_INFORMATION_FAILED = 'clarify legacy get user information failed';
    const STATE_INIT_CANCELLATION_PROCESS = 'init cancellation process';
    const STATE_INIT_CANCELLATION_WITH_REFUND_PROCESS = 'init cancellation with refund process';


    // payment subprocess
    const STATE_WAITING_FOR_AUTHORISE_APPOINTMENT = 'waiting for authorise appointment';
    const STATE_APPOINTED = 'appointed';

    // capture subprocess
    const STATE_INIT_CAPTURE_PROCESS = 'init capture process';
    const STATE_WAITING_FOR_CAPTURE_APPOINTMENT = 'waiting for capture appointment';
    const STATE_CLARIFY_CAPTURE_FAILED = 'clarify capture failed';
    const STATE_CAPTURED = 'captured';

    // artwork availability subprocess
    const STATE_INIT_ARTWORK_AVAILABILITY_CHECK = 'init artwork availability check';
    const STATE_SET_SALES_NOTIFICATION = 'set sales notification';
    const STATE_ARTWORK_AVAILABLE = 'artwork available';
    const STATE_ARTWORK_NOT_AVAILABLE = 'artwork not available';
    const STATE_ARTIST_NOTIFICATION_SENT = 'artist notification sent';
    const STATE_FIRST_ARTIST_CONFIRMATION_REMINDER_SENT = 'first artist confirmation reminder sent';
    const STATE_SECOND_ARTIST_CONFIRMATION_REMINDER_SENT = 'second artist confirmation reminder sent';
    const STATE_CLARIFY_ARTWORK_AVAILABILITY = 'clarify artwork availability';
    const STATE_ARTIST_BLOCKED = 'artist blocked';
    const STATE_ARTIST_NOT_REACHABLE = 'artist not reachable';
    const STATE_ARTWORK_AVAILABLE_AND_WAITING_FOR_EXPORT = 'artwork available and waiting for export';

    // delivery subprocess
    const STATE_INIT_SHIPMENT_PROCESS = 'init shipment process';
    const STATE_CLARIFY_EXPORT_FAILED = 'clarify export failed';
    const STATE_CLARIFY_NO_SHIPMENT_INFO_RECEIVED = 'clarify no shipment info received';
    const STATE_NOT_SHIPPED = 'not shipped';
    const STATE_SHIPMENT_FORM_SENT = 'shipment form sent';
    const STATE_INIT_DELIVERY_PROCESS = 'init delivery process';
    const STATE_WAITING_FOR_PICKUP = 'waiting for pickup';
    const STATE_PICKUP_BOOKED = 'pickup booked';
    const STATE_PICKED_UP_AND_WAITING_FOR_DELIVERY = 'picked up and waiting for delivery';
    const STATE_CLARIFY_NO_PICKUP_INFO_RECEIVED = 'clarify no pickup info received';
    const STATE_CLARIFY_NO_DELIVERY_INFO_RECEIVED = 'clarify no delivery info received';
    const STATE_DELIVERED = 'delivered';
    const STATE_FULFILLED = 'fulfilled';
    const STATE_NOT_DELIVERED = 'not delivered';
    const STATE_WAITING_MANUAL_SHIPMENT_ORDER_EXPORT = 'waiting for manual shipping appointment order';
    const STATE_DELIVERY_EXCEPTION = 'delivery exception';
    const STATE_DELIVERY_HOLD = 'delivery hold';
    const EVENT_MARK_AS_LONG_DELIVERY = 'mark as long delivery';
    const EVENT_MANUAL_SET_CLARIFY_NO_PICKUP_INFO_RECEIVED = 'manual set clarify no pickup info reveived';

    // handpicked subprocess
    const STATE_INIT_HANDPICKED_PROCESS = 'init handpicked process';
    const STATE_CANCELLATION_NO_HANDPICKED = 'cancellation no handpicking';
    const STATE_CLARIFY_HANDPICKED = 'clarify handpicked';
    const EVENT_MANUAL_RE_INIT_ARTWORK_AVAILABILITY = 'manual re init artwork availability';

    // payout subprocess
    const STATE_INIT_PAYOUT_PROCESS = 'init payout process';
    const STATE_PAYOUT_PROCESS_FINISHED = 'payout process finished';

    // print file check subprocess
    const STATE_INIT_PRINT_FILE_CHECK = 'init print file check';
    const STATE_PRINT_FILE_CHECK_SUCCESS = 'print file check success';
    const STATE_PRINT_FILE_CHECK_FAILURE = 'print file check failure';
    const STATE_PRINT_FILE_CHECK_REQUIRED = 'print file check required';
    const STATE_WAITING_FOR_PRINT_FILE_CHECK_CONFIRMATION = 'waiting for print file check confirmation';
    const STATE_CLARIFY_NO_PRINT_FILE_CHECK_CONFIRMATION_RECEIVED = 'clarify no print file check confirmation received';

    // printer export subprocess
    const STATE_INIT_PRINTER_EXPORT = 'init printer export';
    const STATE_CLARIFY_PRINTER_EXPORT_FAILED = 'clarify printer export failed';
    const STATE_READY_FOR_EXPORT = 'ready for export';
    const STATE_EXPORTED_TO_PRINTER = 'exported to printer';
    const STATE_EXPORTABLE = 'exportable';
    const EVENT_CHECK_IF_ALL_ITEMS_OF_QUOTE_PRINTABLE = 'check if all items of quote printable';
    const STATE_PRINT_SHIPPED = 'print shipped';
    const STATE_PRINT_CLARIFY_NO_SHIPMENT_INFO_RECEIVED = 'clarify no print shipment info received';
    const STATE_GENERATING_PACKING_SLIP = 'generating packing slip';
    const STATE_SHIPPING_INFO_SENT = 'shipping info sent';

    // refund process
    const STATE_INIT_REFUND_PROCESS = 'init refund process';
    const STATE_REMOVED_SALE_IN_ARTPORTAL = 'removed sale in artportal';
    const STATE_CLARIFY_COULD_NOT_REMOVE_SALE_IN_ARTPORTAL = 'clarify could not remove sale in artportal';
    const STATE_BLOCKING_ARTWORK_IN_ARTPORTAL = 'blocking artwork in artportal';
    const STATE_EMAIL_SENT_TO_ACCOUNTING = 'email sent to accounting';
    const STATE_AWAITING_REFUND = 'awaiting refund';
    const STATE_REFUNDED = 'refunded';

    // stock updates
    const STATE_INIT_STOCK_UPDATE = 'init stock update';
    const STATE_ART_PORTAL_SALES_NOTIFICATION_SENT = 'art portal sales notification sent';
    const STATE_CLARIFY_SEND_SALES_NOTIFICATION_FAILED = 'clarify send sales notification failed';

    // manual order
    const STATE_MANUAL_PROCESS_INFORMATION_MAIL_SENT = 'manual process information mail sent';
    const STATE_CLARIFY_MANUAL_ORDER = 'clarify manual order';
    const STATE_MANUAL_ORDER_IN_PROGRESS = 'manual order in progress';
    const EVENT_MANUAL_ORDER_COMPLETED_WORK = 'completed manual order';
    const STATE_QUOTE_CALL_SUCCESSFULLY_REPEATED = 'quote call successfully repeated';

    // send order confirmation
    const STATE_INIT_SEND_ORDER_CONFIRMATION = 'init send order confirmation';
    const STATE_FETCHED_LEGACY_USER_INFORMATION = 'fetched legacy user information';

    // manual checkout
    const STATE_CLARIFY_ADDRESSES = 'clarify addresses';

    // EVENTS

    const EVENT_START_PAYMENT = 'start payment';
    const EVENT_START_CAPTURE = 'start capture';
    const EVENT_RETRY_CAPTURE = 'retry capture';
    const EVENT_MARK_AS_CAPTURED = 'mark as captured';
    const EVENT_CHECK_ARTWORK_AVAILABILITY = 'check artwork availability';
    const EVENT_ARTIST_CONFIRMED_AVAILABILITY = 'artist confirmed availability';
    const EVENT_ARTIST_DISCONFIRMED_AVAILABILITY = 'artist disconfirmed availability';
    const EVENT_ARTIST_NOT_REACHABLE = 'artist not reachable';
    const EVENT_ARTWORK_IS_AVAILABLE = 'event artwork is available';
    const EVENT_ARTWORK_IS_NOT_AVAILABLE = 'event artwork is not available';
    const EVENT_ARTWORK_AVAILABILITY_INFO_RECEIVED = 'artwork availability info received';
    const EVENT_SHIPMENT_INFO_RECEIVED = 'shipment info received';
    const EVENT_MANUAL_SET_SHIPPED = 'manual set shipped';
    const EVENT_MANUAL_SET_NOT_SHIPPED = 'manual set not shipped';
    const EVENT_PICKUP_INFO_RECEIVED = 'pickup info received';
    const EVENT_DELIVERY_INFO_RECEIVED = 'delivery info received';
    const EVENT_MANUAL_SET_PICKEDUP = 'manual set picked up';
    const EVENT_MANUAL_SET_BOOKED = 'manual set booked';
    const EVENT_MANUAL_SET_DELIVERED = 'manual set delivered';
    const EVENT_MANUAL_SET_NOT_DELIVERED = 'manual set not delivered';
    const EVENT_MANUAL_PAYOUT_DONE = 'manual payout done';
    const EVENT_ENTER_HANDPICKED_PROCESS = 'enter handpicked process';
    const EVENT_CHECK_IF_PRINT_IS_APPROVED = 'check if print is approved';
    const EVENT_MANUAL_APPROVE_PRINT_FILE_CHECK = 'manual approve print file check';
    const EVENT_MANUAL_DISAPPROVE_PRINT_FILE_CHECK = 'manual disapprove print file check';
    const EVENT_MOVE_TO_EXPORT = 'move to export';
    const EVENT_PRINT_SHIPPING_NOTIFICATION_RECEIVED = 'print shipping notification received';
    const EVENT_MANUAL_SET_PRINT_SHIPPED = 'manually set print shipped';
    const EVENT_LEAVE_HANDPICKED_PROCESS = 'manually finished handpicked';
    const EVENT_MANUAL_ORDER_START_WORK = 'starting progress on manual order';
    const EVENT_MANUAL_ORDER_FINISHED_WORK = 'completed manual order';
    const EVENT_RETRY_SEND_SALES_NOTIFICATION = 'retry send sales notification';
    const EVENT_RESEND_TO_PRINTER = 'resend to printer';
    const EVENT_RESEND_TO_FULFILLER = 'resend to fulfiller';
    const EVENT_WAS_SUCCESSFULLY_EXPORTED = 'was successfully exported';
    const EVENT_RESEND = 'resend';
    const EVENT_RECREATE_PACKING_SLIP = 'recreate packing slip';
    const EVENT_RETRY_LEGACY_GET_USER_INFORMATION = 'retry legacy get user information';
    const EVENT_MANUAL_SEND_ITEMS_TO_PRINTER = 'manually send items to printer';
    const EVENT_MANUAL_ENTER_CONFIRMATION_PROCESS = 'manual enter confirmation process';
    const EVENT_MANUAL_REFUND = 'manual refund';
    const EVENT_MANUAL_REFUND_SENT_ACCOUNTING_MAIL = 'manual refund sent accounting mail';
    const EVENT_MANUAL_SHIPMENT_ORDER_EXPORT = 'send shipment order manually';
    const EVENT_MANUAL_REPEAT_QUOTE_CALL = 'repeat quote call';
    const EVENT_START_FULFILLMENT = 'start fulfillment';
    const EVENT_MANUAL_REMOVED_SALE_FROM_ARTPORTAL = 'manual removed sale from artportal';
    const EVENT_INIT_FULFILLED = 'init fulfilled';
    const EVENT_INIT_CANCELLATION = 'init cancellation';
    const EVENT_INIT_DELIVERY_EXCEPTION = 'init delivery exception';

    // RULES

    const RULE_PAYMENT_TRANSACTION_APPROVED = 'payment transaction approved';
    const RULE_IS_NATIONAL_SHIPMENT = 'is national shipment';
    const RULE_ARTIST_REPLIED_BUT_ARTWORK_NOT_AVAILABLE = 'artist replied but artwork not available';
    const RULE_ITEM_PRICE_GREATER_THAN_1500 = 'item price greater than $1500';
    const RULE_PRINT_FILE_APPROVED = 'print file approved';
    const RULE_PRINTER_CONFIRMATION_ACCEPTED = 'printer confirmation accepted';
    const RULE_IS_ARTWORK_AVAILABLE = 'is artwork available';
    const RULE_IS_ORIGINAL_PRODUCT = 'is original product';
    const RULE_IS_PRINT_PRODUCT = 'is print product';
    const RULE_IS_LIMITED_EDITION_PRODUCT = 'is limited edition product';
    const RULE_ALL_ITEMS_OF_QUOTE_PRINTABLE = 'all items of quote printable';
    const RULE_EXPORT_SUCCESSFUL = 'export successful';
    const RULE_IS_ARTWORK_BLOCK_NEEDED = 'is artwork block needed';
    const RULE_SEND_SALES_NOTIFICATION_SUCCESSFUL = 'send sale notification to legacy successful';
    const RULE_REMOVE_SALES_NOTIFICATION_SUCCESSFUL = 'remove sale notification to legacy successful';
    const RULE_LEGACY_GET_USER_INFORMATION_SUCCESSFUL = 'get legacy user information successful';
    const RULE_ITEM_HAS_QUOTE = 'item has quote';
    const RULE_HAS_RECEIVED_BOOK_INFO = 'has received book info';
    const RULE_HAS_RECEIVED_PICKUP_INFO = 'has received pickup info';
    const RULE_HAS_RECEIVED_DELIVERY_INFO = 'has received delivery info';
    const RULE_HAS_RECEIVED_TRACKING_NUMBER = 'has received tracking number';
    const RULE_LESS_THAN_THIRTY_UNIQUE_ITEMS_IN_QUOTE = 'less than thirty unique items in quote';
    const RULE_IS_MARKED_FOR_REFUND = 'is marked for refund';

    // FLAGS
    const FLAG_PRINTABLE = 'printable';
    const FLAG_CLARIFY = 'clarify';
    const FLAG_HIDDEN_FROM_USER = 'hidden from user';

    const FLAG_CLARIFY_REFUND = 'clarify refund';

}
