<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves;

use Acceptance\Customer\Yves\PageObject\CustomerNewsletterPage;
use Acceptance\Customer\Yves\Tester\CustomerLoginTester;
use Codeception\Util\Stub;
use Spryker\Zed\Newsletter\Dependency\Facade\NewsletterToMailInterface;
use Spryker\Zed\Newsletter\NewsletterDependencyProvider;

/**
 * @group Acceptance
 * @group Customer
 * @group Yves
 * @group CustomerNewsletterCest
 */
class CustomerNewsletterCest
{

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerLoginTester $i
     *
     * @return void
     */
    public function testICanSubscribeNewsletter(CustomerLoginTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerNewsletterPage::URL);

        $i->setDependency(NewsletterDependencyProvider::FACADE_MAIL, Stub::makeEmpty(NewsletterToMailInterface::class));

        $i->click(['name' => CustomerNewsletterPage::FORM_FIELD_SELECTOR_NEWSLETTER_SUBSCRIPTION]);
        $i->click(CustomerNewsletterPage::BUTTON_SUBMIT);
        $i->waitForText(CustomerNewsletterPage::SUCCESS_MESSAGE_SUBSCRIBED);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerLoginTester $i
     *
     * @return void
     */
    public function testICanUnSubscribeNewsletter(CustomerLoginTester $i)
    {
        $i->amLoggedInCustomer();

        $i->setDependency(NewsletterDependencyProvider::FACADE_MAIL, Stub::makeEmpty(NewsletterToMailInterface::class));

        $i->addNewsletterSubscription(CustomerNewsletterPage::NEW_CUSTOMER_EMAIL);
        $i->amOnPage(CustomerNewsletterPage::URL);
        $i->click(['name' => CustomerNewsletterPage::FORM_FIELD_SELECTOR_NEWSLETTER_SUBSCRIPTION]);
        $i->click(CustomerNewsletterPage::BUTTON_SUBMIT);
        $i->waitForText(CustomerNewsletterPage::SUCCESS_MESSAGE_UN_SUBSCRIBED);
    }

}
