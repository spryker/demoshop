<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer\Yves;

use PyzTest\Yves\Customer\CustomerAcceptanceTester;
use PyzTest\Yves\Customer\PageObject\CustomerProfilePage;

/**
 * Auto-generated group annotations
 * @group PyzTest
 * @group Yves
 * @group Customer
 * @group Yves
 * @group CustomerProfileCest
 * Add your own group annotations below this line
 */
class CustomerProfileCest
{

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanUpdateProfileData(CustomerAcceptanceTester $i)
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
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanUpdateEmail(CustomerAcceptanceTester $i)
    {
        $i->amLoggedInCustomer();
        $i->amOnPage(CustomerProfilePage::URL);

        $i->fillField(CustomerProfilePage::FORM_FIELD_SELECTOR_EMAIL, CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $i->click(CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_TEXT, CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_SELECTOR);

        $i->waitForText(CustomerProfilePage::SUCCESS_MESSAGE);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanNotUpdateEmailToAnAlreadyUsedOne(CustomerAcceptanceTester $i)
    {
        $i->amLoggedInCustomer();
        $i->haveRegisteredCustomer(CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $i->amOnPage(CustomerProfilePage::URL);

        $i->fillField(CustomerProfilePage::FORM_FIELD_SELECTOR_EMAIL, CustomerProfilePage::REGISTERED_CUSTOMER_EMAIL);
        $i->click(CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_TEXT, CustomerProfilePage::BUTTON_PROFILE_FORM_SUBMIT_SELECTOR);

        $i->waitForText(CustomerProfilePage::ERROR_MESSAGE_EMAIL);
    }

    /**
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanChangePassword(CustomerAcceptanceTester $i)
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
     * @param \PyzTest\Yves\Customer\CustomerAcceptanceTester $i
     *
     * @return void
     */
    public function testICanNotChangePasswordWhenNewPasswordsNotMatch(CustomerAcceptanceTester $i)
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
