<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\PageObject;

class CustomerNewsletterPage extends Customer
{

    const URL = '/customer/newsletter';

    const FORM_FIELD_SELECTOR_NEWSLETTER_SUBSCRIPTION = 'newsletterSubscriptionForm[subscribe]';

    const BUTTON_SUBMIT = 'Submit';

    const SUCCESS_MESSAGE_SUBSCRIBED = 'You successfully subscribed to the newsletter';
    const SUCCESS_MESSAGE_UN_SUBSCRIBED = 'You successfully unsubscribed from the newsletter';
    const ERROR_MESSAGE = 'You are already subscribed to the newsletter';

}
