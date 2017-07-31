<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Yves;

use PyzTest\Yves\Customer\CustomerAcceptanceTester;
use PyzTest\Yves\Customer\PageObject\CustomerLoginPage;
use PyzTest\Yves\Customer\PageObject\CustomerOverviewPage;
use PyzTest\Yves\Customer\PageObject\CustomerPasswordForgottenPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Yves
 * @group CustomerLoginCest
 * Add your own group annotations below this line
 */
class CustomerLoginCest
{

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanOpenLoginPage(CustomerAcceptanceTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->see(CustomerLoginPage::TITLE_LOGIN, 'h4');
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanOpenForgotPasswordPage(CustomerAcceptanceTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->click(CustomerLoginPage::FORGOT_PASSWORD_LINK);
        $i->seeCurrentUrlEquals(CustomerPasswordForgottenPage::URL);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanLoginWithValidData(CustomerAcceptanceTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->haveRegisteredCustomer(CustomerLoginPage::NEW_CUSTOMER_EMAIL);
        $i->submitLoginForm();
        $i->seeCurrentUrlEquals(CustomerOverviewPage::URL);
    }

}
