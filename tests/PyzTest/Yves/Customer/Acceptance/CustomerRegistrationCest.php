<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Yves;

use PyzTest\Yves\Customer\CustomerAcceptanceTester;
use PyzTest\Yves\Customer\PageObject\CustomerOverviewPage;
use PyzTest\Yves\Customer\PageObject\CustomerRegistrationPage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Yves
 * @group CustomerRegistrationCest
 * Add your own group annotations below this line
 */
class CustomerRegistrationCest
{

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanOpenRegistrationPage(CustomerAcceptanceTester $i)
    {
        $i->amOnPage(CustomerRegistrationPage::URL);
        $i->see(CustomerRegistrationPage::TITLE_CREATE_ACCOUNT, 'h4');
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanRegisterWithValidData(CustomerAcceptanceTester $i)
    {
        $i->amOnPage(CustomerRegistrationPage::URL);
        $i->fillOutRegistrationForm();
        $i->click(CustomerRegistrationPage::BUTTON_REGISTER);
        $i->seeCurrentUrlEquals(CustomerOverviewPage::URL);
        $i->see(CustomerRegistrationPage::SUCCESS_MESSAGE);
    }

}
