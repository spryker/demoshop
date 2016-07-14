<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Login\Zed\PageObject;

class LoginPage
{

    const URL = '/auth/login/';

    const ADMIN_USERNAME = 'admin@spryker.com';
    const ADMIN_PASSWORD = 'change123';

    const SELECTOR_USERNAME_FIELD = '#auth_username';
    const SELECTOR_PASSWORD_FIELD = '#auth_password';
    const SELECTOR_SUBMIT_BUTTON = 'Login';

    const AUTHENTICATION_FAILED = 'Authentication failed!';

    const ERROR_MESSAGE_EMPTY_FIELD = 'This value should not be blank.';

}
