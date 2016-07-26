<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Taxes\Zed\PageObject;

class TaxRateCreatePage
{

    const URL = '/tax/rate/create';

    const HEADER = 'Create new tax rate';
    const SELECTOR_HEADER = 'h2';

    const MESSAGE_SUCCESSFUL_ALERT_CREATION = 'Tax rate successfully created.';
    const ERROR_MESSAGE_NAME_SHOULD_NOT_BE_BLANK = 'This value should not be blank.';
    const ERROR_MESSAGE_COUNTRY_SHOULD_NOT_BE_BLANK = 'Select country.';
    const ERROR_MESSAGE_PERCENTAGE_SHOULD_BE_VALID_NUMBER = 'This value should be a valid number.';

    const SELECTOR_NAME = '#tax_rate_name';
    const SELECTOR_COUNTRY = '#tax_rate_fkCountry';
    const SELECTOR_PERCENTAGE = '#tax_rate_rate';

    const SELECTOR_SAVE = "input.btn.btn-primary";
    const  SELECTOR_LIST_OF_TASK_RATES_BUTTON = 'List of task rates';

    const TAX_RATE_VALID = 'validTaxRate';
    const TAX_RATE_INVALID = 'invalidTaxRate';
    const TAX_RATE_VALID_NOT_CREATED = 'validTaxRateNotCreated';

    /**
     * @var array
     */
    public static $taxRateData = [
        self::TAX_RATE_VALID => [
            'name' => 'Ukraine Standard',
            'country' => 'Ukraine',
            'percentage' => '5',
        ],
        self::TAX_RATE_INVALID => [
            'name' => '',
            'country' => 'No country',
            'percentage' => 'test',
        ],
        self::TAX_RATE_VALID_NOT_CREATED => [
            'name' => 'Ukraine Standard Not Created',
            'country' => 'Ukraine',
            'percentage' => '5',
        ]
    ];
}
