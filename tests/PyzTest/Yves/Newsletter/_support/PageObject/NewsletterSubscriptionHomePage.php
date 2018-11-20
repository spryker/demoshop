<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Newsletter\PageObject;

class NewsletterSubscriptionHomePage
{
    public const NEW_EMAIL = 'foo@bar.com';
    public const EXISTING_EMAIL = 'bar@foo.com';

    public const FORM_SELECTOR = ['id' => 'newsletterSubscriptionForm_subscribe'];

    public const ERROR_MESSAGE = 'You are already subscribed to the newsletter';
    public const SUCCESS_MESSAGE = 'You successfully subscribed to the newsletter';

    public const FORM_SUBMIT = 'Subscribe';
}
