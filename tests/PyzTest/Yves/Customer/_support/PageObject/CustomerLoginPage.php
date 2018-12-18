<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerLoginPage extends Customer
{
    public const URL = '/register';

    public const FORGOT_PASSWORD_LINK = '//a[@data-id="customer-forgot-password-link"]';

    public const TITLE_LOGIN = 'Access your account';
    public const TITLE_FORGOT_PASSWORD = 'Recover my password';

    public const FORM_FIELD_SELECTOR_EMAIL = 'loginForm[email]';
    public const FORM_FIELD_SELECTOR_PASSWORD = 'loginForm[password]';

    public const FORM_NAME_LOGIN_FORM = 'loginForm';

    public const LOGOUT_LINK = ['id' => 'logout-link'];
}
