<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Newsletter\PageObject;

class NewsletterSubscriptionHomePage
{
    const NEW_EMAIL = 'foo@bar.com';
    const EXISTING_EMAIL = 'bar@foo.com';

    const FORM_SELECTOR = ['id' => 'newsletterSubscriptionForm_subscribe'];

    const ERROR_MESSAGE = 'You are already subscribed to the newsletter';
    const SUCCESS_MESSAGE = 'You successfully subscribed to the newsletter';

    const FORM_SUBMIT = 'Subscribe';
}
