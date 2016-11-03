<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves\PageObject;

class CustomerPasswordForgottenPage extends Customer
{

    const URL = '/password/forgotten';

    const TITLE_FORGOT_PASSWORD = 'Recover my password';

    const BUTTON_BACK = 'Back';
    const BUTTON_SUBMIT = 'Submit';

    const EMAIL_FIELD_SELECTOR = 'forgottenPassword[email]';

}
