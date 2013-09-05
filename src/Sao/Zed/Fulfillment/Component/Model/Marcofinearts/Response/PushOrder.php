<?php

class Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_PushOrder
    extends Sao_Zed_Fulfillment_Component_Model_Marcofinearts_Response_Abstract
{
    const CODE_AUTHENTICATION_FAILED = 101; // Authentication failed. Invalid username, password or secret key or you don’t have permission to access the API.
    const CODE_MISSING_FIELD = 102; // Required field(s) not found.
    const CODE_INVALID_URL = 103; // Invalid url.
    const CODE_INVALID_DATA_TYPE_NUMERIC = 104; // Numeric field contains non-numeric characters.
    const CODE_INVALID_DATA_TYPE_INTEGER = 105; // Integer field contains non-integer characters.
    const CODE_INVALID_FORMAT_DATE = 106; // Date field must be in format YYYY-MM-DD HH:MM:SS
    const CODE_INVALID_SHIP_DATE = 107; // Invalid date for ship deadline (minimum 1 day(s) difference from today).
    const CODE_INVALID_FORMAT_TIME = 108; // Date field must be in format YYYY-MM-DD HH:MM:SS
    const CODE_INVALID_COUNTRY = 109; // Invalid country code.
    const CODE_INVALID_STATE = 110; // Invalid state code (for USA and Canada only).
    const CODE_INVALID_CARRIER = 111; // Invalid carrier.
    const CODE_INVALID_SERVICE_TYPE = 112; // Invalid shipping method .
    const CODE_DUPLICATE_ORDER = 121; // Order with that xid already exists.

    /** @var string */
    protected $receipt_id;

}
