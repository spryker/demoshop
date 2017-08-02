<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Yves;

use PyzTest\Yves\Customer\CustomerPresentationTester;
use PyzTest\Yves\Customer\PageObject\CustomerAddressesPage;
use PyzTest\Yves\Customer\PageObject\CustomerNewsletterPage;
use PyzTest\Yves\Customer\PageObject\CustomerOrdersPage;
use PyzTest\Yves\Customer\PageObject\CustomerOverviewPage;
use PyzTest\Yves\Customer\PageObject\CustomerProfilePage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Yves
 * @group CustomerOverviewCest
 * Add your own group annotations below this line
 */
class CustomerOverviewCest
{

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanOpenOverviewPage(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);

        $i->see(CustomerOverviewPage::BOX_HEADLINE_ORDERS, 'h5');
        $i->see(CustomerOverviewPage::BOX_HEADLINE_PROFILE, 'h5');
        $i->see(CustomerOverviewPage::BOX_HEADLINE_NEWSLETTER, 'h5');
        $i->see(CustomerOverviewPage::BOX_HEADLINE_SHIPPING_ADDRESS, 'h5');
        $i->see(CustomerOverviewPage::BOX_HEADLINE_BILLING_ADDRESS, 'h5');
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testCustomerWithoutAddressShouldSeeAddAddressInfoText(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);

        $i->see(CustomerOverviewPage::INFO_TEXT_ADD_SHIPPING_ADDRESS);
        $i->see(CustomerOverviewPage::INFO_TEXT_ADD_BILLING_ADDRESS);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testCustomerWithAddressShouldNotSeeAddressInfoText(CustomerPresentationTester $i)
    {
        $i->haveRegisteredCustomer(CustomerOverviewPage::NEW_CUSTOMER_EMAIL);
        $i->addAddressToCustomer(CustomerOverviewPage::NEW_CUSTOMER_EMAIL, CustomerAddressesPage::ADDRESS_A);

        $i->amLoggedInCustomer();

        $i->amOnPage(CustomerOverviewPage::URL);

        $i->dontSee(CustomerOverviewPage::INFO_TEXT_ADD_SHIPPING_ADDRESS);
        $i->dontSee(CustomerOverviewPage::INFO_TEXT_ADD_BILLING_ADDRESS);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToProfilePage(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_PROFILE_PAGE);
        $i->amOnPage(CustomerProfilePage::URL);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToAddressesPage(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_ADDRESSES_PAGE);
        $i->amOnPage(CustomerAddressesPage::URL);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToOrdersPage(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_ORDERS_PAGE);
        $i->amOnPage(CustomerOrdersPage::URL);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToNewsletterPage(CustomerPresentationTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_NEWSLETTER_PAGE);
        $i->amOnPage(CustomerNewsletterPage::URL);
    }

}
