<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerAddressPage extends Customer
{
    const URL = '/customer/address/new';

    const FORM_FIELD_SELECTOR_SALUTATION = 'addressForm[salutation]';
    const FORM_FIELD_SELECTOR_FIRST_NAME = 'addressForm[first_name]';
    const FORM_FIELD_SELECTOR_LAST_NAME = 'addressForm[last_name]';
    const FORM_FIELD_SELECTOR_COMPANY = 'addressForm[company]';
    const FORM_FIELD_SELECTOR_PHONE = 'addressForm[phone]';
    const FORM_FIELD_SELECTOR_STREET = 'addressForm[address1]';
    const FORM_FIELD_SELECTOR_NUMBER = 'addressForm[address2]';
    const FORM_FIELD_SELECTOR_ADDITION_TO_ADDRESS = 'addressForm[address3]';
    const FORM_FIELD_SELECTOR_ZIP_CODE = 'addressForm[zip_code]';
    const FORM_FIELD_SELECTOR_CITY = 'addressForm[city]';
    const FORM_FIELD_SELECTOR_COUNTRY = 'addressForm[iso2_code]';
    const FORM_FIELD_SELECTOR_DEFAULT_SHIPPING = 'addressForm[is_default_shipping]';
    const FORM_FIELD_SELECTOR_DEFAULT_BILLING = 'addressForm[is_default_billing]';

    const BUTTON_BACK = 'Back';
    const BUTTON_SUBMIT = 'Submit';

    const SUCCESS_MESSAGE = 'Address was successfully added';
}
