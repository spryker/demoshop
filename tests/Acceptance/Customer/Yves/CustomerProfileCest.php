<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves;

use Acceptance\Customer\Yves\PageObject\CustomerProfilePage;
use Acceptance\Customer\Yves\Tester\CustomerProfileTester;

/**
 * @group Acceptance
 * @group Customer
 * @group Yves
 * @group CustomerProfileCest
 */
class CustomerProfileCest
{

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerProfileTester $i
     *
     * @return void
     */
    public function testICanUpdateProfileData(CustomerProfileTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerProfilePage::URL);

        $customerTransfer = CustomerProfilePage::getCustomerData(CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);

        $i->selectOption(CustomerProfilePage::FORM_FIELD_SELECTOR_SALUTATION, $customerTransfer->getSalutation());
        $i->fillField(CustomerProfilePage::FORM_FIELD_SELECTOR_FIRST_NAME, $customerTransfer->getFirstName());
        $i->fillField(CustomerProfilePage::FORM_FIELD_SELECTOR_LAST_NAME, $customerTransfer->getLastName());
        $i->click('Submit', ['name' => 'profileForm']);

        $i->waitForText(CustomerProfilePage::SUCCESS_MESSAGE);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerProfileTester $i
     *
     * @return void
     */
    public function testICanUpdateEmail(CustomerProfileTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerProfilePage::URL);

        $i->fillField(CustomerProfilePage::FORM_FIELD_SELECTOR_EMAIL, CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $i->click(CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_TEXT, CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_SELECTOR);

        $i->waitForText(CustomerProfilePage::SUCCESS_MESSAGE);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerProfileTester $i
     *
     * @return void
     */
    public function testICanNotUpdateEmailToAnAlreadyUsedOne(CustomerProfileTester $i)
    {
        $i->amLoggedInCustomer();
        $i->haveRegisteredCustomer(CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $i->amOnPage(CustomerProfilePage::URL);

        $i->fillField(CustomerProfilePage::FORM_FIELD_SELECTOR_EMAIL, CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $i->click(CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_TEXT, CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_SELECTOR);

        $i->waitForText(CustomerProfilePage::ERROR_MESSAGE_EMAIL);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerProfileTester $i
     *
     * @return void
     */
    public function testICanChangePassword(CustomerProfileTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerProfilePage::URL);

        $customerTransfer = CustomerProfilePage::getCustomerData(CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $oldPassword = $customerTransfer->getPassword();
        $newPassword = strrev($oldPassword);

        $i->fillField(CustomerProfilePage::FORM_FIELD_CHANGE_PASSWORD_SELECTOR_PASSWORD, $oldPassword);
        $i->fillField(CustomerProfilePage::FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD, $newPassword);
        $i->fillField(CustomerProfilePage::FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD_CONFIRM, $newPassword);
        $i->click(
            CustomerProfilePage::BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_TEXT,
            CustomerProfilePage::BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_SELECTOR
        );

        $i->waitForText(CustomerProfilePage::SUCCESS_MESSAGE_CHANGE_PASSWORD);
    }

    /**
     * @param \Acceptance\Customer\Yves\Tester\CustomerProfileTester $i
     *
     * @return void
     */
    public function testICanNotChangePasswordWhenNewPasswordsNotMatch(CustomerProfileTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerProfilePage::URL);

        $customerTransfer = CustomerProfilePage::getCustomerData(CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $oldPassword = $customerTransfer->getPassword();
        $newPassword = strrev($oldPassword);

        $i->fillField(CustomerProfilePage::FORM_FIELD_CHANGE_PASSWORD_SELECTOR_PASSWORD, $oldPassword);
        $i->fillField(CustomerProfilePage::FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD, $newPassword);
        $i->fillField(CustomerProfilePage::FORM_FIELD_CHANGE_PASSWORD_SELECTOR_NEW_PASSWORD_CONFIRM, 'not matching password');
        $i->click(
            CustomerProfilePage::BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_TEXT,
            CustomerProfilePage::BUTTON_PROFILE_FORM_CHANGE_PASSWORD_SUBMIT_SELECTOR
        );

        $i->waitForText(CustomerProfilePage::ERROR_MESSAGE_CHANGE_PASSWORD);
    }

}
