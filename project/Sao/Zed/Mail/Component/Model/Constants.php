<?php
interface Sao_Zed_Mail_Component_Model_Constants extends ProjectA_Zed_Mail_Component_Model_Constants
{

    // Mail types
    const MAIL_TYPE_CUSTOMER = 'customer';
    const MAIL_TYPE_ARTIST = 'artist';
    const MAIL_TYPE_OPERATIONS = 'operations';
    const MAIL_TYPE_ACCOUNTING = 'accounting';

    // Customer
    const ORDER_CONFIRMATION = 'order_confirmation';
    const SHIPPING_INFO_PRINT = 'shipping_info_print';
    const SHIPPING_INFO_ORIGINAL = 'shipping_info_original';
    const PRE_SHIPPING_INFO_ORIGINAL = 'pre_shipping_info_original';

    // Artist
    const ARTIST_SALES_NOTIFICATION_MARKETPLACE = 'artist_sales_notification';
    const ARTIST_SALES_NOTIFICATION_MANUFACTURED = 'artist_sales_notification_manufactured';
    const FIRST_ARTIST_ARTWORK_AVAILABILTY_REMINDER = 'first_artist_artwork_availability_reminder';
    const SECOND_ARTIST_ARTWORK_AVAILABILTY_REMINDER = 'second_artist_artwork_availability_reminder';
    const CONFIRM_ARTWORK_AVAILABILTY = 'confirm_artwork_availability';
    const BLOCK_ARTIST = 'block_artist';
    const PAYOUT_REQUEST_POSSIBLE = 'payout_request_possible';
    const PRINT_FILE_CHECK_FAILURE = 'print_file_check_failure';

    // Ops mails
    const MANUAL_PROCESS = 'manual_process';
    const CLARIFY_ARTWORK_AVAILABILTY = 'clarify_artwork_availability';
    const ITEM_NOT_DELIVERED = 'item_not_delivered';
    const CLARIFY_HANDPICKED = 'clarify_handpicked';

    // Accounting mails
    const ACCOUNTING_AWAITING_REFUND = 'accounting_awaiting_refund';
    
    //cart abandoned step cart
    const CART_ABANDONED_STEP_CART_SEQUENCE1 = 'cart_abandoned_step_cart_sequence1';
    const CART_ABANDONED_STEP_CART_SEQUENCE2 = 'cart_abandoned_step_cart_sequence2';
    const CART_ABANDONED_STEP_CART_SEQUENCE3 = 'cart_abandoned_step_cart_sequence3';

    //cart abandoned step payment
    const CART_ABANDONED_STEP_PAYMENT_SEQUENCE1 = 'cart_abandoned_step_payment_sequence1';
    const CART_ABANDONED_STEP_PAYMENT_SEQUENCE2 = 'cart_abandoned_step_payment_sequence2';
    const CART_ABANDONED_STEP_PAYMENT_SEQUENCE3 = 'cart_abandoned_step_payment_sequence3';

    //cart abandoned step review
    const CART_ABANDONED_STEP_REVIEW_SEQUENCE1 = 'cart_abandoned_step_review_sequence1';
    const CART_ABANDONED_STEP_REVIEW_SEQUENCE2 = 'cart_abandoned_step_review_sequence2';
    const CART_ABANDONED_STEP_REVIEW_SEQUENCE3 = 'cart_abandoned_step_review_sequence3';
}

