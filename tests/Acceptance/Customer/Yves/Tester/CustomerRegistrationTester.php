<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace Acceptance\Customer\Yves\Tester;

use Acceptance\Customer\Yves\PageObject\CustomerRegistrationPage;

class CustomerRegistrationTester extends CustomerTester
{

    /**
     * @return void
     */
    public function fillOutRegistrationForm()
    {
        $i = $this;
        $customerTransfer = CustomerRegistrationPage::getCustomerData(CustomerRegistrationPage::NEW_CUSTOMER_EMAIL);

        $i->selectOption(CustomerRegistrationPage::FORM_FIELD_SELECTOR_SALUTATION, $customerTransfer->getSalutation());
        $i->fillField(CustomerRegistrationPage::FORM_FIELD_SELECTOR_FIRST_NAME, $customerTransfer->getFirstName());
        $i->fillField(CustomerRegistrationPage::FORM_FIELD_SELECTOR_LAST_NAME, $customerTransfer->getLastName());
        $i->fillField(CustomerRegistrationPage::FORM_FIELD_SELECTOR_EMAIL, $customerTransfer->getEmail());
        $i->fillField(CustomerRegistrationPage::FORM_FIELD_SELECTOR_PASSWORD, $customerTransfer->getPassword());
        $i->fillField(CustomerRegistrationPage::FORM_FIELD_SELECTOR_PASSWORD_CONFIRM, $customerTransfer->getPassword());
        $i->checkOption(CustomerRegistrationPage::FORM_FIELD_SELECTOR_ACCEPT_TERMS);
    }

}
