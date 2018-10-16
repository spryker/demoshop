<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerProfilePage extends Customer
{
    public const URL = '/customer/profile';

    public const FORM_FIELD_SELECTOR_SALUTATION = 'profileForm[salutation]';
    public const FORM_FIELD_SELECTOR_FIRST_NAME = 'profileForm[first_name]';
    public const FORM_FIELD_SELECTOR_LAST_NAME = 'profileForm[last_name]';
    public const FORM_FIELD_SELECTOR_EMAIL = 'profileForm[email]';

    public const FORM_FIELD_SELECTOR_PASSWORD = 'profileForm[password][pass]';
    public const FORM_FIELD_SELECTOR_PASSWORD_CONFIRM = 'profileForm[password][confirm]';

    public const BUTTON_PROFILE_FORM_SUBMIT_SELECTOR = ['name' => 'profileForm'];
    public const BUTTON_PROFILE_FORM_SUBMIT_TEXT = 'Submit';

    public const SUCCESS_MESSAGE = 'Profile was successfully saved';
    public const ERROR_MESSAGE_EMAIL = 'Email already used';

    public const FORM_FIELD_CHANGE_PASSWORD_SELECTOR_PASSWORD = 'passwordForm[password]';
    public const FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD = 'passwordForm[new_password][password]';

    public const FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD_CONFIRM = 'passwordForm[new_password][confirm]';
    public const BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_SELECTOR = ['name' => 'passwordForm'];

    public const BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_TEXT = 'Submit';

    public const SUCCESS_MESSAGE_CHANGE_PASSWORD = 'Password change successful';
    public const ERROR_MESSAGE_CHANGE_PASSWORD = 'Passwords don\'t match';
}
