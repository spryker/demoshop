<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerAddressPage extends Customer
{
    public const URL = '/customer/address/new';

    public const FORM_FIELD_SELECTOR_SALUTATION = 'addressForm[salutation]';
    public const FORM_FIELD_SELECTOR_FIRST_NAME = 'addressForm[first_name]';
    public const FORM_FIELD_SELECTOR_LAST_NAME = 'addressForm[last_name]';
    public const FORM_FIELD_SELECTOR_COMPANY = 'addressForm[company]';
    public const FORM_FIELD_SELECTOR_PHONE = 'addressForm[phone]';
    public const FORM_FIELD_SELECTOR_STREET = 'addressForm[address1]';
    public const FORM_FIELD_SELECTOR_NUMBER = 'addressForm[address2]';
    public const FORM_FIELD_SELECTOR_ADDITION_TO_ADDRESS = 'addressForm[address3]';
    public const FORM_FIELD_SELECTOR_ZIP_CODE = 'addressForm[zip_code]';
    public const FORM_FIELD_SELECTOR_CITY = 'addressForm[city]';
    public const FORM_FIELD_SELECTOR_COUNTRY = 'addressForm[iso2_code]';
    public const FORM_FIELD_SELECTOR_DEFAULT_SHIPPING = 'addressForm[is_default_shipping]';
    public const FORM_FIELD_SELECTOR_DEFAULT_BILLING = 'addressForm[is_default_billing]';

    public const BUTTON_BACK = 'Back';
    public const BUTTON_SUBMIT = 'Submit';

    public const SUCCESS_MESSAGE = 'Address was successfully added';
}
