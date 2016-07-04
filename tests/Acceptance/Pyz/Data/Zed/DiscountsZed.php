<?php

namespace tests\Acceptance\Pyz\Data\Zed;


class DiscountsZed
{
    const SUCCESSFUL_ALERT = '';
    const ACTIVATE_BUTTON = '';
    const DEACTIVATE_BUTTON = '';
    const ORDERS_PAGE = '';
    const SEARCH = '';
    const VIEW = '';
    const DISCOUNT_LIST = '';
    const CREATE_NEW_DISCOUNT = '';
    const DISCOUNT_TYPE = '';
    const DISCOUNT_NAME = '';
    const DISCOUNT_DESCRIPTION = '';
    const DISCOUNT_EXCL = '';
    const VALID_FROM = '';
    const VALID_TO = '';
    const GENERAL_INFORMATION_TAB = '';
    const DISCOUNT_CALCULATION_TAB = '';
    const DISCOUNT_CONDITIONS_TAB = '';
    const DISCOUNT_CALCULATOR_TYPE = '';
    const DISCOUNT_AMOUNT = '[';
    const DISCOUNT_APPLY_TO = '';
    const DISCOUNT_APPLY_TO_QUERY = '';
    const DISCOUNT_APPLY_WHEN = '';
    const DISCOUNT_APPLY_QUERY = '';
    const DISCOUNT_SAVE = '';

    static $SuccessfulAlertMessageCreation = 'Discount successfully created, but not activated.';
    static $SuccessfulAlertMessageActivation = 'Discount successfully activated.';

    static $discountData = [
        'validExclusiveDiscount' => [
            'type' => 'Cart rule',
            'name' => 'Exclusive Valid Discount',
            'description' => 'test test test',
            'excl' => '1',
            'calcType' => 'Calculator fixed',
            'amount' => '18,36',
            'applyTo' => 'attribute.gps = \'TRUE\'',
        ],
        'validNonExclusiveDiscount123' => [
            'type' => 'Cart rule',
            'name' => '123Non-Exclusive Valid Discount',
            'description' => 'test test test',
            'excl' => '0',
            'calcType' => 'Calculator fixed',
            'amount' => '18,36',
            'applyTo' => 'attribute.gps = \'TRUE\'',
        ]
    ];
}