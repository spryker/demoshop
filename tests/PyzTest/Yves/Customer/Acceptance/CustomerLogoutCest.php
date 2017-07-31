<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Yves;

use PyzTest\Yves\Customer\CustomerAcceptanceTester;
use PyzTest\Yves\Customer\PageObject\CustomerLoginPage;
use PyzTest\Yves\Customer\PageObject\CustomerLogoutPage;
use PyzTest\Yves\Customer\PageObject\CustomerOverviewPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Yves
 * @group CustomerLogoutCest
 * Add your own group annotations below this line
 */
class CustomerLogoutCest
{

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanLogoutWhenLoggedIn(CustomerAcceptanceTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->haveRegisteredCustomer(CustomerLoginPage::NEW_CUSTOMER_EMAIL);
        $i->submitLoginForm();
        $i->seeCurrentUrlEquals(CustomerOverviewPage::URL);

        $i->amOnPage(CustomerLogoutPage::URL);

        $i->seeCurrentUrlEquals('/');
    }

}
