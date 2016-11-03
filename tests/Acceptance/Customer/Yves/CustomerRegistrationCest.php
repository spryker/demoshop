<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves;

use Acceptance\Customer\Yves\PageObject\CustomerOverviewPage;
use Acceptance\Customer\Yves\PageObject\CustomerRegistrationPage;
use Acceptance\Customer\Yves\Tester\CustomerRegistrationTester;

/**
 * @group Acceptance
 * @group Customer
 * @group Yves
 * @group CustomerRegistrationCest
 */
class CustomerRegistrationCest
{

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerRegistrationTester $i
     *
     * @return void
     */
    public function testICanOpenRegistrationPage(CustomerRegistrationTester $i)
    {
        $i->amOnPage(CustomerRegistrationPage::URL);
        $i->see(CustomerRegistrationPage::TITLE_CREATE_ACCOUNT, 'h4');
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerRegistrationTester $i
     *
     * @return void
     */
    public function testICanRegisterWithValidData(CustomerRegistrationTester $i)
    {
        $i->amOnPage(CustomerRegistrationPage::URL);
        $i->fillOutRegistrationForm();
        $i->click(CustomerRegistrationPage::BUTTON_REGISTER);
        $i->seeCurrentUrlEquals(CustomerOverviewPage::URL);
        $i->see(CustomerRegistrationPage::SUCCESS_MESSAGE);
    }

}
