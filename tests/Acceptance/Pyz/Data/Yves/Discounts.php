<?php

namespace tests\Acceptance\Pyz\Data\Yves;


class Discounts
{
    const ADD_PRODUCT = '[css] => [data-test=name]';
    const ADD_ITEM = '[css] => [data-test=name]';
    const ITEM_PRICE = '[css] => [data-test=name]';
    const DISCOUNT_PRICE = '[css] => [data-test=name]';
    const TOTAL_PRICE = '[css] => [data-test=name]';
    const CHECKOUT = '[css] => [data-test=name]';
    const FIRST_NAME = '[css] => [data-test=name]';
    const LAST_NAME = '[css] => [data-test=name]';
    const EMAIL = '[css] => [data-test=name]';
    const ACCEPT_TERMS = '[css] => [data-test=name]';
    const SUBMIT = '[css] => [data-test=name]';
    const COMPANY = '[css] => [data-test=name]';
    const STREET = '[css] => [data-test=name]';
    const NUMBER = '[css] => [data-test=name]';
    const ADDITION_TO_ADDRESS = '[css] => [data-test=name]';
    const ZIP_CODE = '[css] => [data-test=name]';
    const CITY = '[css] => [data-test=name]';
    const PHONE = '[css] => [data-test=name]';
    const GO_TO_SHIPMENT = '[css] => [data-test=name]';
    const DUMMY_SHIPMENT = '[css] => [data-test=name]';
    const STANDARD_SHIPMENT_METHOD = '[css] => [data-test=name]';
    const GO_TO_PAYMENT = '[css] => [data-test=name]';
    const CREDIT_CARD_NUMBER = '[css] => [data-test=name]';
    const NAME_ON_CREDIT_CARD = '[css] => [data-test=name]';
    const CREDIT_CARD_EXPIRES_MONTH = '[css] => [data-test=name]';
    const CREDIT_CARD_EXPIRES_YEAR = '[css] => [data-test=name]';
    const CREDIT_CARD_SECURITY_CODE = '[css] => [data-test=name]';
    const GO_TO_SUMMARY = '[css] => [data-test=name]';
    const SUBTOTAL = '[css] => [data-test=name]';
    const DISCOUNT = '[css] => [data-test=name]';
    const SUBMIT_YOUR_ORDER = '[css] => [data-test=name]';
    const SUCCESSFUL_ALERT = '[css] => [data-test=name]';

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

    static $discountSummary = [
        'Discount1' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
        'Discount2' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
        'Discount3' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
        'Discount4' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
        'Discount5' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
        'Discount6' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
        'Discount7' => [
            'itemsPrice' => '9,18',
            'subtotal' => '9,18',
            'discount' => '18,36',
        ],
    ];
}