<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerPasswordForgottenPage extends Customer
{
    public const URL = '/password/forgotten';

    public const TITLE_FORGOT_PASSWORD = 'Recover my password';

    public const BUTTON_BACK = 'Back';
    public const BUTTON_SUBMIT = 'Submit';

    public const EMAIL_FIELD_SELECTOR = 'forgottenPassword[email]';
}
