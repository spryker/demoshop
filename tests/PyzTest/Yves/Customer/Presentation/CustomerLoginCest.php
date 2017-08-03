<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Yves;

use PyzTest\Yves\Customer\CustomerPresentationTester;
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
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanOpenLoginPage(CustomerPresentationTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->see(CustomerLoginPage::TITLE_LOGIN, 'h4');
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanOpenForgotPasswordPage(CustomerPresentationTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $i->click(CustomerLoginPage::FORGOT_PASSWORD_LINK);
        $i->seeCurrentUrlEquals(CustomerPasswordForgottenPage::URL);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerPresentationTester $i
     *
     * @return void
     */
    public function testICanLoginWithValidData(CustomerPresentationTester $i)
    {
        $i->amOnPage(CustomerLoginPage::URL);
        $customerTransfer = $i->haveRegisteredCustomer();
        $i->submitLoginForm($customerTransfer->getEmail(), $customerTransfer->getPassword());
        $i->seeCurrentUrlEquals(CustomerOverviewPage::URL);
    }

}
