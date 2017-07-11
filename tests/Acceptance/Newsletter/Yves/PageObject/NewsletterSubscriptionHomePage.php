<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Newsletter\Yves\PageObject;

class NewsletterSubscriptionHomePage
{

    const NEW_EMAIL = 'foo@bar.com';
    const EXISTING_EMAIL = 'bar@foo.com';

    const FORM_SELECTOR = ['id' => 'newsletterSubscriptionForm_subscribe'];

    const ERROR_MESSAGE = 'You are already subscribed to the newsletter';
    const SUCCESS_MESSAGE = 'You successfully subscribed to the newsletter';

    const FORM_SUBMIT = 'Subscribe';

}
