<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves;

use Acceptance\Customer\Yves\PageObject\CustomerLoginPage;
use Acceptance\Customer\Yves\PageObject\CustomerLogoutPage;
use Acceptance\Customer\Yves\PageObject\CustomerOverviewPage;
use Acceptance\Customer\Yves\Tester\CustomerLoginTester;

/**
 * @group Acceptance
 * @group Customer
 * @group Yves
 * @group CustomerLogoutCest
 */
class CustomerLogoutCest
{

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerLoginTester $i
     *
     * @return void
     */
    public function testICanLogoutWhenLoggedIn(CustomerLoginTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->haveRegisteredCustomer(CustomerLoginPage::NEW_CUSTOMER_EMAIL);
        $i->submitLoginForm();
        $i->seeCurrentUrlEquals(CustomerOverviewPage::URL);

        $i->amOnPage(CustomerLogoutPage::URL);

        $i->seeCurrentUrlEquals('/');
    }

}
