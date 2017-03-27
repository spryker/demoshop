<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves;

use Acceptance\Customer\Yves\PageObject\CustomerAddressesPage;
use Acceptance\Customer\Yves\PageObject\CustomerNewsletterPage;
use Acceptance\Customer\Yves\PageObject\CustomerOrdersPage;
use Acceptance\Customer\Yves\PageObject\CustomerOverviewPage;
use Acceptance\Customer\Yves\PageObject\CustomerProfilePage;
use Acceptance\Customer\Yves\Tester\CustomerOverviewTester;

/**
 * @group Acceptance
 * @group Customer
 * @group Yves
 * @group CustomerOverviewCest
 */
class CustomerOverviewCest
{

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerOverviewTester $i
     *
     * @return void
     */
    public function testICanOpenOverviewPage(CustomerOverviewTester $i)
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
     * @param \Acceptance\Customer\Yves\Tester\CustomerOverviewTester $i
     *
     * @return void
     */
    public function testCustomerWithoutAddressShouldSeeAddAddressInfoText(CustomerOverviewTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);

        $i->see(CustomerOverviewPage::INFO_TEXT_ADD_SHIPPING_ADDRESS);
        $i->see(CustomerOverviewPage::INFO_TEXT_ADD_BILLING_ADDRESS);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerOverviewTester $i
     *
     * @return void
     */
    public function testCustomerWithAddressShouldNotSeeAddressInfoText(CustomerOverviewTester $i)
    {
        $i->haveRegisteredCustomer(CustomerOverviewPage::NEW_CUSTOMER_EMAIL);
        $i->addAddressToCustomer(CustomerOverviewPage::NEW_CUSTOMER_EMAIL, CustomerAddressesPage::ADDRESS_A);

        $i->amLoggedInCustomer();

        $i->amOnPage(CustomerOverviewPage::URL);

        $i->dontSee(CustomerOverviewPage::INFO_TEXT_ADD_SHIPPING_ADDRESS);
        $i->dontSee(CustomerOverviewPage::INFO_TEXT_ADD_BILLING_ADDRESS);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerOverviewTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToProfilePage(CustomerOverviewTester $i)
    {

        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_PROFILE_PAGE);
        $i->amOnPage(CustomerProfilePage::URL);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerOverviewTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToAddressesPage(CustomerOverviewTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_ADDRESSES_PAGE);
        $i->amOnPage(CustomerAddressesPage::URL);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerOverviewTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToOrdersPage(CustomerOverviewTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_ORDERS_PAGE);
        $i->amOnPage(CustomerOrdersPage::URL);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerOverviewTester $i
     *
     * @return void
     */
    public function testICanGoFromOverviewToNewsletterPage(CustomerOverviewTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerOverviewPage::URL);
        $i->click(CustomerOverviewPage::LINK_TO_NEWSLETTER_PAGE);
        $i->amOnPage(CustomerNewsletterPage::URL);
    }

}
