<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerRegistrationPage extends Customer
{
    const URL = '/register';

    const TITLE_CREATE_ACCOUNT = 'Create account';

    const BUTTON_REGISTER = 'Register';

    const FORM_FIELD_SELECTOR_SALUTATION = 'registerForm[salutation]';
    const FORM_FIELD_SELECTOR_FIRST_NAME = 'registerForm[first_name]';
    const FORM_FIELD_SELECTOR_LAST_NAME = 'registerForm[last_name]';
    const FORM_FIELD_SELECTOR_EMAIL = 'registerForm[email]';
    const FORM_FIELD_SELECTOR_PASSWORD = 'registerForm[password][pass]';
    const FORM_FIELD_SELECTOR_PASSWORD_CONFIRM = 'registerForm[password][confirm]';
    const FORM_FIELD_SELECTOR_ACCEPT_TERMS = '#registerForm_accept_terms';

    const SUCCESS_MESSAGE = 'Registration Successful';
}
