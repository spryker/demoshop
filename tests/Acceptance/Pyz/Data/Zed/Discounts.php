<?php

namespace tests\Acceptance\Pyz\Data\Zed;


class Discounts
{


    const SUCCESSFUL_ALERT_CREATION = '[css] => [data-test=name]';
    const SUCCESSFUL_ALERT_ACTIVATION = '[css] => [data-test=name]';
    const ACTIVATE_BUTTON = '[css] => [data-test=name]';
    const DEACTIVATE_BUTTON = '[css] => [data-test=name]';
    const ORDERS_PAGE = '[css] => [data-test=name]';
    const SEARCH = '[css] => [data-test=name]';
    const VIEW = '[css] => [data-test=name]';
    const DISCOUNT_LIST = '[css] => [data-test=name]';
    const CREATE_NEW_DISCOUNT = '[css] => [data-test=name]';
    const DISCOUNT_TYPE = '[css] => [data-test=name]';
    const DISCOUNT_NAME = '[css] => [data-test=name]';
    const DISCOUNT_DESCRIPTION = '[css] => [data-test=name]';
    const DISCOUNT_EXCL = '[css] => [data-test=name]';
    const VALID_FROM = '[css] => [data-test=name]';
    const VALID_TO = '[css] => [data-test=name]';
    const GENERAL_INFORMATION_TAB = '[css] => [data-test=name]';
    const DISCOUNT_CALCULATION_TAB = '[css] => [data-test=name]';
    const DISCOUNT_CONDITIONS_TAB = '[css] => [data-test=name]';
    const DISCOUNT_CALCULATOR_TYPE = '[css] => [data-test=name]';
    const DISCOUNT_AMOUNT = '[css] => [data-test=name]';
    const DISCOUNT_APPLY_TO = '[css] => [data-test=name]';
    const DISCOUNT_APPLY_TO_QUERY = '[css] => [data-test=name]';
    const DISCOUNT_APPLY_WHEN = '[css] => [data-test=name]';
    const DISCOUNT_APPLY_QUERY = '[css] => [data-test=name]';
    const DISCOUNT_SAVE = '[css] => [data-test=name]';

    static $SuccessfulAlertMessageCreation = '';
    static $SuccessfulAlertMessageActivation = '';

    static $discountData = [
        'Discount1' => [
            'type' => 'Cart rule',
            'name' => 'Test Discount 1',
            'description' => 'test test test',
            'excl' => '1',
            'calcType' => 'Calculator fixed',
            'amount' => '18,36',
            'applyTo' => '',
            'applyWhen' => '18,36',
        ],
        'Discount2' => [
            'type' => '9,18',
            'name' => '9,18',
            'description' => '18,36',
            'excl' => '18,36',
            'calcType' => '18,36',
            'amount' => '18,36',
            'applyTo' => '18,36',
            'applyWhen' => '18,36',
        ]
    ];
    static $discountPrices = [
        'Discount1' => [
            'one_item_price' => '9,18',
            'two_items_price' => '18,36',
            'discount_amount_one' => '2,30',
            'discount_amount_two' => '4,59',
            'discount_total_one' => '6,88',
            'discount_total_two' => '13,77',
        ],
        'Discount2' => [
            'one_item_price' => '9,18',
            'two_items_price' => '18,36',
            'discount_amount_one' => '2,30',
            'discount_amount_two' => '4,59',
            'discount_total_one' => '6,88',
            'discount_total_two' => '13,77',

        ]
    ];
}