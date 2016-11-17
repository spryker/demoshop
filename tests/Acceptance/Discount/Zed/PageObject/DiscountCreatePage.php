<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Discount\Zed\PageObject;

class DiscountCreatePage
{

    const URL = '/discount/index/create';

    const MESSAGE_SUCCESSFUL_ALERT_CREATION = 'Discount successfully created, but not activated.';
    const MESSAGE_SUCCESSFUL_ALERT_ACTIVATION = 'Discount successfully activated.';

    const DISCOUNT_VALID_EXCLUSIVE = 'validExclusiveDiscount';
    const DISCOUNT_VALID_NOT_EXCLUSIVE = 'validNotExclusiveDiscount';

    /**
     * @var array
     */
    public static $discountData = [
        self::DISCOUNT_VALID_EXCLUSIVE => [
            'type' => 'Cart rule',
            'name' => 'Exclusive Valid Discount',
            'description' => 'test test test',
            'excl' => '1',
            'calcType' => 'Calculator fixed',
            'amount' => '18,36',
            'applyTo' => 'attribute.width = \'15\'',
        ],
        self::DISCOUNT_VALID_NOT_EXCLUSIVE => [
            'type' => 'Cart rule',
            'name' => 'Not Exclusive Valid Discount',
            'description' => 'test test test',
            'excl' => '0',
            'calcType' => 'Calculator fixed',
            'amount' => '18,36',
            'applyTo' => 'attribute.width = \'15\'',
        ]
    ];

}
