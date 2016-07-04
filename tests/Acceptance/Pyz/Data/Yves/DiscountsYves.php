<?php

namespace tests\Acceptance\Pyz\Data\Yves;


class DiscountsYves
{
    const ADD_PRODUCT = '';
    const ADD_ITEM = '';
    const ITEM_PRICE = '';
    const DISCOUNT_PRICE = '';
    const TOTAL_PRICE = '';
    const CHECKOUT = '';
    const FIRST_NAME = '';
    const LAST_NAME = '';
    const EMAIL = '';
    const ACCEPT_TERMS = '';
    const SUBMIT = '';
    const COMPANY = '';
    const STREET = '';
    const NUMBER = '';
    const ADDITION_TO_ADDRESS = '';
    const ZIP_CODE = '';
    const CITY = '';
    const PHONE = '';
    const GO_TO_SHIPMENT = '';
    const DUMMY_SHIPMENT = '';
    const STANDARD_SHIPMENT_METHOD = '';
    const GO_TO_PAYMENT = '';
    const CREDIT_CARD_NUMBER = '';
    const NAME_ON_CREDIT_CARD = '';
    const CREDIT_CARD_EXPIRES_MONTH = '';
    const CREDIT_CARD_EXPIRES_YEAR = '';
    const CREDIT_CARD_SECURITY_CODE = '';
    const GO_TO_SUMMARY = '';
    const SUBTOTAL = '';
    const DISCOUNT = '';
    const SUBMIT_YOUR_ORDER = '';
    const SUCCESSFUL_ALERT = '';

    static $customerData = [
        'first_name' => '9,18',
        'last_name' => '18,36',
        'email' => '2,30',
        'company' => '4,59',
        'street' => '6,88',
        'number' => '13,77',
        'addition_to_address' => '9,18',
        'zip_code' => '18,36',
        'city' => '2,30',
        'phone' => '4,59',
        'card_number' => '6,88',
        'month_exp' => '13,77',
        'year_exp' => '13,77',
        'security_code' => '13,77'

    ];

    static $discountPrices = [
        'validExclusiveDiscount' => [
            'one_item_price' => '9,18',
            'two_items_price' => '18,36',
            'discount_amount_one' => '2,30',
            'discount_amount_two' => '4,59',
            'discount_total_one' => '6,88',
            'discount_total_two' => '13,77',
        ],
        'validNonExclusiveDiscount' => [
            'one_item_price' => '9,18',
            'two_items_price' => '18,36',
            'discount_amount_one' => '2,30',
            'discount_amount_two' => '4,59',
            'discount_total_one' => '6,88',
            'discount_total_two' => '13,77',

        ]
    ];

    static $discountSummary = [
        'validExclusiveDiscount' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
        'validNonExclusiveDiscount' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ]
    ];
}