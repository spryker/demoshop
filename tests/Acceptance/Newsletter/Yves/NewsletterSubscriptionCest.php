<?php

/**
 * Copyright © 2017-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Acceptance\Newsletter\Yves;

use Acceptance\Customer\Yves\PageObject\Customer;
use Acceptance\Customer\Yves\PageObject\CustomerNewsletterPage;
use Acceptance\Customer\Yves\PageObject\CustomerOverviewPage;
use Acceptance\Homepage\Yves\PageObject\Homepage;
use Acceptance\Newsletter\Yves\PageObject\NewsletterSubscriptionHomePage;
use Acceptance\Newsletter\Yves\Tester\NewsletterSubscriptionTester;

/**
 * @group Acceptance
 * @group Newsletter
 * @group Yves
 * @group NewsletterSubscriptionCest
 */
class NewsletterSubscriptionCest
{

    /**
     * @param \Acceptance\Newsletter\Yves\Tester\NewsletterSubscriptionTester $i
     *
     * @return void
     */
    public function iCanSubscribeWithAnUnsubscribedEmail(NewsletterSubscriptionTester $i)
    {
        $i->wantTo('Subscribe to the newsletter with an unsubscribed new email.');
        $i->expect('Success message is displayed.');

        $i->amOnPage(Homepage::URL);

        $i->fillField(NewsletterSubscriptionHomePage::FORM_SELECTOR, NewsletterSubscriptionHomePage::NEW_EMAIL);
        $i->click(NewsletterSubscriptionHomePage::FORM_SUBMIT);

        $i->see(NewsletterSubscriptionHomePage::SUCCESS_MESSAGE);
    }

    /**
     * @param \Acceptance\Newsletter\Yves\Tester\NewsletterSubscriptionTester $i
     *
     * @return void
     */
    public function iCanNotSubscribeWithAnAlreadySubscribedEmail(NewsletterSubscriptionTester $i)
    {
        $i->wantTo('Subscribe to the newsletter with an already subscribed email.');
        $i->expect('Error message is displayed.');

        $i->amOnPage(Homepage::URL);

        $i->haveAnAlreadySubscribedEmail(NewsletterSubscriptionHomePage::EXISTING_EMAIL);

        $i->fillField(NewsletterSubscriptionHomePage::FORM_SELECTOR, NewsletterSubscriptionHomePage::EXISTING_EMAIL);
        $i->click(NewsletterSubscriptionHomePage::FORM_SUBMIT);

        $i->see(NewsletterSubscriptionHomePage::ERROR_MESSAGE);
    }

    /**
     * @param \Acceptance\Newsletter\Yves\Tester\NewsletterSubscriptionTester $i
     *
     * @return void
     */
    public function subscribedEmailIsLinkedWithCustomerAfterRegistration(NewsletterSubscriptionTester $i)
    {
        $i->wantTo('Subscribe to the newsletter with an unsubscribed email and later on register with that address.');
        $i->expect('Subscriber email should be linked with registered customer.');

        $i->amOnPage(Homepage::URL);

        $i->fillField(NewsletterSubscriptionHomePage::FORM_SELECTOR, Customer::NEW_CUSTOMER_EMAIL);
        $i->click(NewsletterSubscriptionHomePage::FORM_SUBMIT);

        $i->amLoggedInCustomer(Customer::NEW_CUSTOMER_EMAIL);

        $i->amOnPage(CustomerOverviewPage::URL);
        $i->see(CustomerOverviewPage::NEWSLETTER_SUBSCRIBED);
    }

    /**
     * @param \Acceptance\Newsletter\Yves\Tester\NewsletterSubscriptionTester $i
     *
     * @return void
     */
    public function subscribedEmailCanBeUnsubscribedByCustomerAfterRegistration(NewsletterSubscriptionTester $i)
    {
        $i->wantTo('Subscribe to the newsletter with an unsubscribed email should be able to unsubscribe after registration.');
        $i->expect('Subscribed email should be unsubscribed after customer unsubscribe.');

        $i->amOnPage(Homepage::URL);

        $i->fillField(NewsletterSubscriptionHomePage::FORM_SELECTOR, Customer::NEW_CUSTOMER_EMAIL);
        $i->click(NewsletterSubscriptionHomePage::FORM_SUBMIT);

        $i->amLoggedInCustomer(Customer::NEW_CUSTOMER_EMAIL);

        $i->amOnPage(CustomerOverviewPage::URL);
        $i->see(CustomerOverviewPage::NEWSLETTER_SUBSCRIBED);

        $i->amOnPage(CustomerNewsletterPage::URL);
        $i->amOnPage(CustomerNewsletterPage::URL);
        $i->click(['name' => CustomerNewsletterPage::FORM_FIELD_SELECTOR_NEWSLETTER_SUBSCRIPTION]);
        $i->click(CustomerNewsletterPage::BUTTON_SUBMIT);
        $i->waitForText(CustomerNewsletterPage::SUCCESS_MESSAGE_UN_SUBSCRIBED);

        $i->dontSeeCheckboxIsChecked(['name' => CustomerNewsletterPage::FORM_FIELD_SELECTOR_NEWSLETTER_SUBSCRIPTION]);
    }

}
