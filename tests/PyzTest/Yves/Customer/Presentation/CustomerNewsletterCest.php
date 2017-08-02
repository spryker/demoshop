<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Yves;

use Codeception\Util\Stub;
use PyzTest\Yves\Customer\CustomerPresentationTester;
use PyzTest\Yves\Customer\PageObject\CustomerNewsletterPage;
use Spryker\Zed\Newsletter\Dependency\Facade\NewsletterToMailInterface;
use Spryker\Zed\Newsletter\NewsletterDependencyProvider;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Yves
 * @group CustomerNewsletterCest
 * Add your own group annotations below this line
 */
class CustomerNewsletterCest
{

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanSubscribeNewsletter(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerNewsletterPage::URL);

        $i->setDependency(NewsletterDependencyProvider::FACADE_MAIL, Stub::makeEmpty(NewsletterToMailInterface::class));

        $i->click(['name' => CustomerNewsletterPage::FORM_FIELD_SELECTOR_NEWSLETTER_SUBSCRIPTION]);
        $i->click(CustomerNewsletterPage::BUTTON_SUBMIT);
        $i->waitForText(CustomerNewsletterPage::SUCCESS_MESSAGE_SUBSCRIBED);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanUnSubscribeNewsletter(CustomerPresentationTester $i)
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
