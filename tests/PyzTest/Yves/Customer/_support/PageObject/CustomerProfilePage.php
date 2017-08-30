<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerProfilePage extends Customer
{

    const URL = '/customer/profile';

    const FORM_FIELD_SELECTOR_SALUTATION = 'profileForm[salutation]';
    const FORM_FIELD_SELECTOR_FIRST_NAME = 'profileForm[first_name]';
    const FORM_FIELD_SELECTOR_LAST_NAME = 'profileForm[last_name]';
    const FORM_FIELD_SELECTOR_EMAIL = 'profileForm[email]';

    const FORM_FIELD_SELECTOR_PASSWORD = 'profileForm[password][pass]';
    const FORM_FIELD_SELECTOR_PASSWORD_CONFIRM = 'profileForm[password][confirm]';

    const BUTTON_PROFILE_FORM_SUBMIT_SELECTOR = ['name' => 'profileForm'];
    const BUTTON_PROFILE_FORM_SUBMIT_TEXT = 'Submit';

    const SUCCESS_MESSAGE = 'Profile was successfully saved';
    const ERROR_MESSAGE_EMAIL = 'Email already used';

    const FORM_FIELD_CHANGE_PASSWORD_SELECTOR_PASSWORD = 'passwordForm[password]';
    const FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD = 'passwordForm[new_password][password]';

    const FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD_CONFIRM = 'passwordForm[new_password][confirm]';
    const BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_SELECTOR = ['name' => 'passwordForm'];

    const BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_TEXT = 'Submit';

    const SUCCESS_MESSAGE_CHANGE_PASSWORD = 'Password change successful';
    const ERROR_MESSAGE_CHANGE_PASSWORD = 'Passwords don\'t match';

}
