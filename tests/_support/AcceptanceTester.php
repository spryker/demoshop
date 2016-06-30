<?php

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
class AcceptanceTester extends \Codeception\Actor
{
    use _generated\AcceptanceTesterActions;


    /**
     * Define custom actions here
     */

    /**
     * Login
     * @param string $username
     * @param string $password
     *
     * @return void
     */
    public function executeLogin($username = 'admin@spryker.com', $password = 'change123')
    {
        $this->amOnPage('/auth/login');
        $this->fillField('auth[username]', $username);
        $this->fillField('auth[password]', $password);
        $this->click('Login');
    }

    /**
     * Logout
     *
     * @return void
     */
    public function executeLogout()
    {
        $this->wantTo('LogOut from Zed');
        $this->click('Log out');
    }

    /**
     * Creation of discount
     * @param array $discount
     * 
     * @return void
     */
    public function createDiscount($discount)
    {
        $this->amOnPage('/discount/index/list');
        
        $this->waitForElementVisible(['class' => 'btn-create']);
        $this->click(['class' => 'btn-create']);
        $this->selectOption('#discount_discountGeneral_discount_type', $discount['type']);
        $this->fillField('#discount_discountGeneral_display_name', $discount['name']);
        $this->fillField('#discount_discountGeneral_description', $discount['desc']);
        $this->click('#discount_discountGeneral_is_exclusive_'.$discount['excl']);
        $this->fillField('#discount_discountGeneral_valid_from', $discount['valid_from']);
        $this->fillField('#discount_discountGeneral_valid_to', $discount['valid_to']);

        $this->click('Discount calculation');
        $this->selectOption('#discount_discountCalculator_calculator_plugin', $discount['calc_type']);
        $this->fillField('#discount_discountCalculator_amount', $discount['amount']);
        $this->click('#btn-calculation-get');
        $this->fillField('#discount_discountCalculator_collector_query_string', $discount['apply_to']);

        $this->click('Conditions');
        $this->click('#btn-condition-get');
        $this->fillField('#discount_discountCondition_decision_rule_query_string', $discount['apply_when']);
        $this->click('#create-discount-button');
    }

    /**
     * Checkout in Yves as a guest
     * @param string $customerMail
     * 
     * @return void
     */
    public function checkoutAsGuestYves($customerMail)
    {
        $this->click(['#guest']);
        $this->fillField('#guestForm_customer_first_name', 'Test FirstName');
        $this->fillField('#guestForm_customer_last_name', 'Test LastName');
        $this->fillField('#guestForm_customer_email', $customerMail);
        $this->click('#guestForm_customer_accept_terms');
        $this->click(['css' => 'div.frame:nth-child(11) > input:nth-child(1)']);

        $this->fillField('#guestForm_customer_first_name', 'Test FirstName');
        $this->fillField('#addressesForm_shippingAddress_first_name', 'Test FirstName');
        $this->fillField('#addressesForm_shippingAddress_last_name', 'Test LastName');
        $this->fillField('#addressesForm_shippingAddress_company', 'TestCompany');
        $this->fillField('#addressesForm_shippingAddress_address1', 'Address1');
        $this->fillField('#addressesForm_shippingAddress_address2', '35');
        $this->fillField('#addressesForm_shippingAddress_address3', 'test');
        $this->fillField('#addressesForm_shippingAddress_zip_code', '12345');
        $this->fillField('#addressesForm_shippingAddress_city', 'Berlin');
        $this->fillField('#addressesForm_shippingAddress_phone', '123456789');
        $this->click(['css' => 'div.frame:nth-child(11) > input:nth-child(1)']);

        $this->click('#shipmentForm_shipmentSelection_0');
        $this->click('#shipmentForm_dummy_shipment_idShipmentMethod_0');
        $this->click('#shipmentForm_checkout\.step\.payment');

        $this->fillField('#paymentForm_dummyPaymentCreditCard_card_number', '12345');
        $this->fillField('#paymentForm_dummyPaymentCreditCard_name_on_card', 'Test Name');
        $this->selectOption('#paymentForm_dummyPaymentCreditCard_card_expires_month', '12');
        $this->selectOption('#paymentForm_dummyPaymentCreditCard_card_expires_year', '2020');
        $this->fillField('#paymentForm_dummyPaymentCreditCard_card_security_code', '123');
        $this->click('#paymentForm_checkout\.step\.summary');
    }
}
