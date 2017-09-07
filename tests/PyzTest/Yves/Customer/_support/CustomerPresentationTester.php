<?php

/**
 * This file is part of the Spryker Demoshop.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

namespace PyzTest\Yves\Customer;

use Codeception\Actor;
use Codeception\Scenario;
use PyzTest\Yves\Customer\PageObject\CustomerLoginPage;
use PyzTest\Yves\Customer\PageObject\CustomerRegistrationPage;

/**
 * Inherited Methods
 * @method void wantToTest($text)
 * @method void wantTo($text)
 * @method void execute($callable)
 * @method void expectTo($prediction)
 * @method void expect($prediction)
 * @method void amGoingTo($argumentation)
 * @method void am($role)
 * @method void lookForwardTo($achieveValue)
 * @method void comment($description)
 * @method \Codeception\Lib\Friend haveFriend($name, $actorClass = NULL)
 *
 * @SuppressWarnings(PHPMD)
 */
class CustomerPresentationTester extends Actor
{

    use _generated\CustomerPresentationTesterActions;

    /**
     * @param \Codeception\Scenario $scenario
     */
    public function __construct(Scenario $scenario)
    {
        parent::__construct($scenario);

        $this->amYves();
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return void
     */
    public function submitLoginForm($email, $password)
    {
        $i = $this;
        $i->submitForm(['name' => 'loginForm'], [
            CustomerLoginPage::FORM_FIELD_SELECTOR_EMAIL => $email,
            CustomerLoginPage::FORM_FIELD_SELECTOR_PASSWORD => $password,
        ]);
    }

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
